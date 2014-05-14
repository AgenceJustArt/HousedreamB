<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class TestimonieController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Testimonie';

/**
 * Default helper
 *
 * @var array
 */
	public $helpers = array('Html', 'Session');

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Testimonie','User');
	
	public $components = array('Img');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
 	

	public function read($id){

		$user = $this->User->find('first',array(
			'conditions'=>array('User.id'=>$id),
			'fields'=>array('pseudo','situation','waiting','media','created'),
			'contain'=>array(
				'Category'
			)
		));
		$set['user'] = $user['User'];
		$set['category'] = $user['Category'];
		
		$data = $this->Testimonie->find('first',array(
			'conditions'=>array('users_id'=>$id),
			'recursive'=>-1
		));
		$set['data'] = $data;

		$this->set($set);
	}
	

	public function abus($id){

		$user = AuthComponent::user();
		$userid = $user['id'];
		if($userid){

					$save = array('sender_id'=>$userid,'abus_id'=>$id);
					$this->loadModel('TestimonieAbu');
					$exist = $this->TestimonieAbu->find('first',array(
						'conditions'=>$save,
						'recursive'=>-1
					));
					if(!$exist){
						$success = $this->TestimonieAbu->save($save);
						
						if($success){
							
							// Envoie de la notification par mail
							App::uses('CakeEmail','Network/Email');
							$mail = new CakeEmail();
							$mail->from('support@sympathy-world.fr')
							->to('support@sympathy-world.fr')
							->subject('Abus témoignage')
							->emailFormat('html')->template('abusTestimonies')
							->viewVars(array())
							->send();

						
						}
						
						$this->Session->setFlash('L\'abus a bien été déclaré','notif');
					}else{
						$this->Session->setFlash('Cet abus a déjà été déclaré par vos soins','notif');
					}
				
				$this->redirect(array('controller'=>'testimonie','action'=>'read',$id));
			
		}else{
			$this->redirect('/');
		}
	}

	public function ask($id){

		$user = AuthComponent::user();
		$userid = $user['id'];

		if($userid){

					$save = array('users_id'=>$userid,'asks_id'=>$id);
					$this->loadModel('TestimonieAsk');
					$exist = $this->TestimonieAsk->find('first',array(
						'conditions'=>$save,
						'recursive'=>-1
					));
					if(!$exist){
						//$success = $this->TestimonieAsk->save($save);
						$success = true;
						if($success){
							$this->loadModel('User');
							$ask = $this->User->find('first',array(
								'recursive'=>-1,
								'conditions'=>array('User.id'=>$id),
								'fields'=>array('mail','pseudo')
							));
						
							$email = $ask['User']['mail'];
							$pseudo = $ask['User']['pseudo'];
							//$ask = $this->
							
							// Envoie de la notification par mail
							App::uses('CakeEmail','Network/Email');
							$mail = new CakeEmail();
							$mail->from('support@sympathy-world.fr')
							->to($email)
							->subject('Demande de témoignage')
							->emailFormat('html')->template('askTestimonies')
							->viewVars(array('pseudo'=>$pseudo,'userpseudo'=>$user['pseudo']))
							->send();

						
						}
						
						$this->Session->setFlash('La demande de témoignage a bien été envoyé','notif');
					}else{
						$this->Session->setFlash('Vous avez déjà effectué une demande de témoignage à ce membre','notif');
					}
				
				$this->redirect(array('controller'=>'testimonie','action'=>'read',$id));
			
		}else{
			$this->redirect('/');
		}
	}

	
	
	
}
?>