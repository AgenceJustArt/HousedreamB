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
class TchatController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Tchat';

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
	public $uses = array('User','TchatMessage','TchatRoom','Adherent','TchatConnected');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */

	public function connected(){
		$id = AuthComponent::user('id');
		
		
		//$d['result'] = '';
		$this->loadModel('User');
		$this->User->updateAll(array('last_action'=>'CURRENT_TIMESTAMP'),array('id'=>$id));
		/*
		$connected = $this->TchatConnected->find('all',array('conditions'=>array('time >'=>$time)));
		foreach($connected as $k=>$v){
			$v = current($v);
			$d['result'] .= '<p><b class="green">'.$v['users_id'].'</p>';
		}
		$d['erreur'] = 'ok';
		echo json_encode($d);
		*/
		$d['erreur'] = 'ok';
						echo json_encode($d);
						die();

	}
 
	public function index($id=null) {
		
		
		$user = AuthComponent::user();
		
		$userpseudo = $user['pseudo'];
		$userid = $user['id'];
		
		if(isset($user)){

			if($this->RequestHandler->isAjax()){
				if($this->request->is('post') || $this->request->is('put')){
					$data = $this->request->data;

					if($data['action']=='addMessage'){
						$dialog_id = $data['dialog'];

						$data['user_id'] = $userid;
						$data['content'] = $data['message'];
						$data['dialog_id'] = $dialog_id;
						
						$this->TchatMessage->save($data);
						$d['erreur'] = 'ok';
						echo json_encode($d);
						die();
					}
					elseif($data['action']=='getMessage'){
						// Récupération des pseudo adhérent
						$client = $this->Adherent->find('all',array(
							'conditions'=>array('id_adherent'=>array($userid,$id)),
							'fields'=>array('pseudo_adherent','id_adherent')
						));
						
						foreach ($client as $k => $v) {
							$adherent[$v['Adherent']['id_adherent']] = $v['Adherent']['pseudo_adherent'];
						}

						$lastid = floor($data['lastid']);
						$getMEssage = $this->TchatMessage->find('all',array(
							'recursive'=>-1,
							'conditions'=>array('id_tchat_message >'=>$lastid),
							'order'=>array('date_tchat_message ASC')	
						));
						$d['result'] = '';
						$d['lastid'] = $lastid;
						foreach($getMEssage as $k=>$v){
							$v = current($v);
							$time = $v['date_tchat_message'];
							$d['result'] .= '<p><b class="green">'.$adherent[$v['id_adherent']].' :</b> '.htmlentities(utf8_decode($v['text_tchat_message'])).'<br><span>Le '.$time.'</span></p>';
							$d['lastid'] = $v['id_tchat_message'];
						}
						$d['erreur'] = 'ok';
						echo json_encode($d);
						die();

					}
					
					

				}
			}
			
			else{

				// Récupération des pseudo adhérent
				$client = $this->Adherent->find('all',array(
					'conditions'=>array('id_adherent'=>array($userid,$id)),
					'fields'=>array('pseudo_adherent','id_adherent')
				));
				
				foreach ($client as $k => $v) {
					$adherent[$v['Adherent']['id_adherent']] = $v['Adherent']['pseudo_adherent'];
				}
				
				// Récupération du tchat entre les deux le membre connecté et le membre demandée		
				$tchat = $this->TchatRoom->find('first',array(
					'conditions'=>array('OR'=>array(array('id_creator'=>$userid,'id_correspondant'=>$id),array('id_creator'=>$id,'id_correspondant'=>$userid)))
				));

			
				// Récupération des messages du tchat
				$tchat = $tchat['TchatRoom']['id_tchat_discussion'];

				$message = $this->TchatMessage->find('all',array(
					'recursive'=>-1,
					'conditions'=>array('id_tchat_discussion'=>$tchat)
				));
				

				
				$lastid = $this->TchatMessage->find('first',array(
					'limit'=>1,
					'order'=>array('id_tchat_message DESC'),
					'fields'=>array('id_tchat_message')
				));
				$lastid = $lastid['TchatMessage']['id_tchat_message'];




				$this->set(array('lastid'=>$lastid,'message'=>$message,'user'=>$adherent,'adherent'=>$userpseudo));
				
			}
		
		}
		else{
			$this->Session->setFlash('Vous n’avez pas accès aux salons de tchat','notif');
			$this->redirect('/');
		}


	}
}
