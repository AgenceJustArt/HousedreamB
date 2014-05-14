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
class ForumController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Forum';

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
	public $uses = array('Forum','ForumSubject','ForumAnswer');
	
	//public $components = array('Img');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
 	

	public function index() {
		$this->paginate = array(		
			'recursive'=>-1,
			'limit' =>'10'
		);
    	$forum = $this->paginate('Forum');
    	$set['forum'] = $forum;
    	$this->set($set);
	}

	public function subject($id){

		//$this->Forum->id = $id;

		
		$this->paginate = array(
			'conditions'=>array(
				'ForumSubject.forums_id'=>$id
			),		
			'contain'=>array(
				'User'=>array(
					'fields'=>array('pseudo','id')
				)
			),
			'limit' =>'10'
		);
    	$subject = $this->paginate('ForumSubject');

    	$forum = $this->Forum->find('first',array(
    		'recursive'=>-1,
    		'conditions'=>array('Forum.id'=>$id)
    	));
    	$forum = $forum['Forum']['title'];
		
    
    	$set['subject'] = $subject;
    	$set['forum'] = $forum;
    	//debug($set);
    	$this->set($set);
	}
	
	public function view($id){
		
		if($this->request->is('post') || $this->request->is('put')){
			$profil = AuthComponent::user();
			$data = $this->request->data;
			$data['Forum']['user_name'] = $profil['pseudo']; 
			$data['Forum']['user_id'] = $profil['id'];
			$success = $this->ForumAnswer->save($data['Forum']);

			// Si le message a bien été posé le créateur et les inscrit doivent être prévenu.
			if($success){
				$this->increaseRate(array('user'=>$profil['id'],'object'=>'commentforum'));
				// Récupération du titre du sujet et du slug
				$subject = $this->ForumSubject->find('first',array(
					'conditions'=>array('id'=>$id),
					'fields'=>array('title','slug'),
					'recursive'=>-1
				));
				$subject = current($subject);
				$slug = $subject['slug'];
				$subject = $subject['title'];
	
				// Récupération de la list des inscrit au sujet dans la varialbe $subscribe
				$this->loadModel('ForumSubscribe');
				$subscribe = $this->ForumSubscribe->find('list',array(
					'conditions'=>array('ForumSubscribe.forum_subjects_id'=>$id),
					'fields'=>array('users_mail')
				));

				// Création du lien pointant vers le sujet
				$link = array('controller'=>'forum','action'=>'view','id'=>$id,'slug'=>$slug);
			
				// Envoie de la notification par mail
				App::uses('CakeEmail','Network/Email');
				$mail = new CakeEmail();
				$mail->from('support@sympathy-world.fr')
				->to($subscribe)
				->subject('Notification forum')
				->emailFormat('html')->template('notifForum')
				->viewVars(array('username'=>$profil['pseudo'],'link'=>$link,'subject'=>$subject))
				->send();

				$this->Session->setFlash("Votre message a bien été enregistré","notif");
			}else{
				$this->Session->setFlash("Votre message n'a pas pu être enregistré","notif");
			}
			$this->redirect($this->referer());
		}else{
			$this->ForumSubject->id = $id;
			$data = $this->ForumSubject->read();
			$forum = $data['ForumSubject']['forums_id'];
			$this->Forum->recursive = -1;
			$this->Forum->id = $forum;
			$forum = $this->Forum->read();
			$forum = $forum['Forum']['title'];
			$set['forum'] = $forum;
			$set['subject'] = $data['ForumSubject'];
			$set['answer'] = $data['ForumAnswer'];
	    	$this->set($set);
	    }
	}

	public function add(){
		$user = AuthComponent::user();
		if($user){
			if($this->request->is('post') || $this->request->is('put')){
				$data = $this->request->data;
				$data['Forum']['users_id'] = $user['id'];
				$data['Forum']['users_name'] = $user['pseudo'];
				$data['Forum']['slug'] = Inflector::slug($data['Forum']['title'],'-');
				$data['Forum']['slug'] = strtolower($data['Forum']['slug']);
				$data['Forum']['view'] = 0;
				$data['Forum']['answer'] = 0;
				$data['Forum']['online'] = 1;

				$success = $this->ForumSubject->save($data['Forum']);
				$id = $this->ForumSubject->id;
				if($success){
					$this->loadModel('ForumSubscribe');
					$subscribe = array('users_id'=>$user['id'],'users_mail'=>$user['mail'],'forum_subjects_id'=>$id);
					$this->ForumSubscribe->save($subscribe);
					$this->increaseRate(array('user'=>$user['id'],'object'=>'createforum'));
					$this->Session->setFlash("Votre sujet a bien été ajouté","notif");
				}else{
					$this->Session->setFlash("Votre sujet n'a pas pu être ajouté","notif");
				}
				$this->redirect(array('controller'=>'forum','action'=>'index'));
			}else{
				$this->Forum->recursive = -1;
				$forum = $this->Forum->find('all',array(
					'fields'=>array('id','title')
				));
				foreach ($forum as $k=>$v){
					$v = current($v);
					$forumList[$v['id']] = $v['title']; 
				}
				$this->loadModel('Category');
				$this->Category->recursive = -1;
				$category = $this->Category->find('all',array(
					'fields'=>array('id','name')
				));
				foreach ($category as $k=>$v){
					$v = current($v);
					$categoryList[$v['id']] = $v['name']; 
				}
				asort($categoryList);
				$set['category'] = $categoryList;
				$set['forum'] = $forumList;
				$this->set($set);
			}
		}
	}

	
	
		
}
?>