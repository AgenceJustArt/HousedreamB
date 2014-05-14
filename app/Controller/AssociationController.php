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
class AssociationController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Association';

/**
 * Default helper
 *
 * @var array
 */
	public $helpers = array('Html', 'Session','Calendar');

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('User','Theme','Association');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
 	

	public function index($id) {



		
		$theme = $this->Theme->find('all');
		$this->set('theme',$theme);
		
		// Lecture simple de L'événement
		$association= $this->Association->find('first',array(
			'contain' => array(
					'Theme'=>array(
						'fields'=>array('name')
					),	
					'AssoMedia'=>array(
						'fields'=>array()
					)
			),
				
			'conditions' => array('Association.id'=>$id,'Association.online'=>1)
		));
		
	
		$this->set(array('d'=>$association));
		
		
	}

	public function message() {
		
		$this->loadModel('MsgBox');
		$data = $this->request->data['Mail'];
		$success = $this->MsgBox->save($data);
		if($success){
			$this->Notif->save(array('users_id'=>$data['users_id'],'type'=>'email'));
		}
		$this->redirect($this->referer());
		
		
	}

	public function askrelation($id) {
		$user = AuthComponent::User();
		if($user['id']!=$id){
			$this->loadModel('AskRelation');
			$this->loadModel('Relation');
			$exist = $this->Relation->find('first',array('conditions'=>array('users_id'=>$user['id'],'relations_id'=>$id)));
			if($exist){
				$this->Session->setFlash("Vous êtes déjà en relation avec cette association.","notif");

			}
			else{
				$data = array('users_id'=>$id,'sender_name'=>$user['pseudo'],'sender_id'=>$user['id']);
				$success = $this->AskRelation->save($data);
				if($success){
					$this->Notif->save(array('users_id'=>$id,'type'=>'social'));
				}
				$this->Session->setFlash("Votre demande de mise en relation a bien été envoyé.","notif");
			}
		}
		else{
			$this->Session->setFlash("Vous ne pouvez pas vous envoyer de mise en relation.","notif");
		}
		
		$this->redirect($this->referer());
		
		
	}

	
	
	public function sommaire() {
		
		$theme = $this->Theme->find('all');
		$this->set('theme',$theme);
		
		$this->paginate = array(
			'fields'=>array('id','themes_id','online','name','content','slug','created','modified'),
			'contain' => array(
					'Theme'=>array(
						'fields'=>array('name')
					),
					'AssoMedia'=>array()
			),
			'conditions'=>array(
				"NOT" => array('Association.rna' => null),
				'Association.online'=>1				
			),
			'limit' =>'10'
    	);
		
		$association = $this->paginate('Association');
 		$this->set('association',$association);
	}
	
	public function theme($id) {
		
		$theme = $this->Theme->find('all');
		$this->set('theme',$theme);
		
		foreach($theme as $k=>$v){
			$v = current($v);
			if($v['id'] == $id){
				$this->set('nameTheme',$v['name']);
			}
		}
		
		$this->paginate = array(
			'fields'=>array('id','themes_id','online','name','content','slug','created','modified'),
			'contain' => array(
					'Theme'=>array(
						'fields'=>array('name')
					),
					'AssoMedia'=>array()
			),
			'conditions'=>array(
				'themes_id'=>$id,
				"NOT" => array('Association.rna' => null),
				'Association.online'=>1				
			),
			'limit' =>'10'
    	);
		
		$association = $this->paginate('Association');
 		$this->set('association',$association);
	}
	
	public function zone($location) {
		
		$theme = $this->Theme->find('all');
		$this->set('theme',$theme);
		
		$this->set('location',$location);
		
		
		$this->paginate = array(
			'fields'=>array('id','themes_id','online','name','content','slug','created','modified'),
			'contain' => array(
					'Theme'=>array(
						'fields'=>array('name')
					),
					'AssoMedia'=>array()
			),
			'conditions'=>array(
				'Association.zone'=>$location,
				"NOT" => array('Association.rna' => null),
				'Association.online'=>1				
			),
			'limit' =>'10'
    	);
		
		$association = $this->paginate('Association');
 		$this->set('association',$association);
	}
	
	
	/**
	* ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN *
	* ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN *
	**/
    //////////////////////////////////////////////////////////////////////////////////////////////-> *INDEX*
    function admin_index() {
        $this->paginate = array('Event' => array(
			'contain' => array(
				'User'=>array('fields'=>array('pseudo'))
			),
            'limit' => 10,
			'conditions' => array('online >= 0'),
			'order' => 'Event.id DESC',
			'fields'=>array('Event.id','Event.title','Event.online')
        ));
        $d['data'] = $this->Paginate('Event');
		$this->set($d);
		
    }
	//////////////////////////////////////////////////////////////////////////////////////////////-> *EDIT*
	function admin_edit($id = null) {
		
		$cat = $this->EventCategory->find('all');
		$this->set('category',$cat);
		
		
		if($this->request->is('put') || $this->request->is('post')){
			
			$d = $this->request->data;
			
				$upload = $d['EventMedia']['url'];
				// Direction du dossier et création
				$dir = IMAGES.'event';
				// Gestion du nom du fichier
				// Sépération des terme au point.
				$f = explode('.',$upload['name']);
				// extention => Récupération du dernier terme du tableau $f
				$ext = '.'.end($f);
				// nom => Génération du nom de l 'image
				$filename = Inflector::slug(implode('.',array_slice($f,0,-1)),'-');
				$d['EventMedia']['url'] = 'event/'.$filename.$ext;
			
			$slug = Inflector::slug($d['Event']['title'],'-');
			$d['Event']['slug'] = strtolower($slug);
			
		
			if(!empty($upload['tmp_name'])){
				$valeur = array(
					'Event' => $d['Event'],
					'EventMedia' =>$d['EventMedia']
				);
			}
			else{
				$valeur = array(
					'Event' => $d['Event']
				);
			}
			
			$success = $this->Event->saveAssociated($valeur, array('deep' => true));
			
			if($success){
				if(!empty($upload['tmp_name'])){
				move_uploaded_file($this->request->data['EventMedia']['url']['tmp_name'], $dir.DS.$filename.$ext);
				}
				if($this->request->is('post')){
					$this->Session->setFlash("Ajout d'un article.","notif");
				}
				else{
					$this->Session->setFlash("Modification d'un article.","notif");
				}
			}
			else{
				$this->Session->setFlash("Format non valide","notif",array('type'=>'error'));
			}
			$this->redirect(array('action'=>'index'));		
		}
		elseif($id){
			$this->Event->id = $id;
			$this->request->data = $this->Event->read();
			
		}
		else{	
			//$this->request->data = $this->Post->getDraft('page');
		}
    }
	//////////////////////////////////////////////////////////////////////////////////////////////-> *DELETE*
    function admin_delete($id) {
    	$this->Session->setFlash('La page a bien ete supprimer','notif');
    	$this->Event->delete($id);
    	$this->redirect($this->referer());
    }
	
	function ajaxCalendar(){
		echo 'super';
	}
}
