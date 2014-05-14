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
class PostController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Post';

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
	public $uses = array('Post', 'Tag', 'Media');
	
	public $components = array('Img');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
 	

	public function index() {
	
		
	}
	
	public function view($id = null) {
		$post = $this->Post->findById($id);
		$this->set('post', $post);
	}
	
	public function admin_index() {
		$this->paginate = array(		
			'limit' =>'10');
			
    	$post = $this->paginate('Post');
		
		
		$set = array('Post'=>$post);
		
		$this->set($set);
	}
	
	public function admin_view($id = null) {
		$post = $this->Post->findById($id);
		$this->set('Post', $post);
	}
	
	public function admin_delete($id = null) {
		$check = $this->Post->find('first',array(
    		'conditions'=>array('Post.id'=>$id)
    	));
    	if($check){
    		
    		$this->Post->delete($id);
    		$this->Post->PostCategoryRelation->deleteAll(array('posts_id'=>$id));
    		$this->Post->PostTagRelation->deleteAll(array('posts_id'=>$id));
    		
    		$this->Session->setFlash('L\'élément a bien été supprimé.','notif');
    	}else{
    		$this->Session->setFlash('Cet élément n\'existe pas.','notif');
    	}
    	$this->redirect(array('controller' => 'post', 'action' => 'index'));
	}
	
	public function admin_new() {

		// Si on n'est bien en présence d'une requete POST, on enregistre la requete
		if($this->request->is('put') || $this->request->is('post')){

			// Gestion des valeurs a enregistrer
			$d = $this->request->data;
			
			
			if(!empty($d['Post']['title']) || !empty($d['Post']['content'])){
			
			$slug = Inflector::slug($d['Post']['title'],'-');
			$d['Post']['slug'] = strtolower($slug);
	
			
			//Enregistrement des valeurs
			$success = $this->Post->save($d);
			
			// Si les valeurs ont bien été enregistrer, on met à jour les stats de l'utilisateur
			if($success){
				$idPost = $this->Post->id;

				// Gestion des enregistrement média
				if(!empty($d['Post']['media']['name'])){
					// Enregistrement du média
					$this->media($d['Post']['media'],"media",$idPost);
				}
				// Sauvegarde des catégories
				
				if(isset($d['Post']['category'])){

foreach ($d['Post']['category'] as $k=>$v) {
						if(is_numeric($v) && $this->Category->exists($v)){
							$dataCategory[] = array('posts_id'=>$idPost,'categorys_id'=>$v);
						}
					}
					$this->Post->Category->saveMany($dataCategory);
				}
				
				
				// Sauvegarde des tags
				
				if(isset($d['Post']['tags'])) {

					$listTag = explode(',',strtolower(str_replace(' ', '',$d['Post']['tags'])));
					
					$tags = array();
					foreach($listTag as $k=>$v) {
						$exist = $this->Tag->find('first', array('conditions' => 'Tag.slug = "'.$v.'"'));
						if($exist){
							$tags[] = array('posts_id'=>$idPost,'tags_id'=>$exist['Tag']['id']);
						}
						else {
							$tag = array('title'=>$v,'slug'=>$v);
							$this->Tag->create();
							$this->Tag->save($tag);
							$idTag = $this->Tag->id;
							$tags[] = array('posts_id'=>$idPost,'tags_id'=>$idTag);
						}
					}
					
					$this->Post->PostTagRelation->saveAll($tags);
					
				}
								
				$msg = "Votre annonce a bien été publié";
				$this->Session->setFlash($msg,"notif");
				$this->redirect(array('controller' => 'Post', 'action' => 'index'));
				
				}
				
				else {
					$this->Session->setFlash("Une erreur c'est produite, votre annonce n'a pas pu être enregistrer","notif");
				}
				
			}
			// Sinon on indique qu'il y a eu une erreur.
			else{
				
				$this->Session->setFlash("Merci de remplir tous les champs","notif");
				//$this->redirect($this->referer());
			}
			
		}
		// Sinon
		else{


				// Création du menu catégorie
				$listCategory = $this->Category->find('list');
				//debug($postCategory['id']);
			$this->set('categories', $listCategory);
		}
	}
	
	public function admin_update($id = null) {
		if($this->request->is('put') || $this->request->is('post')){

			if(!$id){
				$this->redirect($this->referer());
			}

			// Gestion des valeurs a enregistrer
			$d = $this->request->data;
			
			
			if(!empty($d['Post']['title']) || !empty($d['Post']['content'])){
			
			$slug = Inflector::slug($d['Post']['title'],'-');
			$d['Post']['id'] = strtolower($id);
			$d['Post']['slug'] = strtolower($slug);
			
			
			// Enregistrement des valeurs
			$success = $this->Post->save($d);
			
			// Si les valeurs ont bien été enregistrer, on met à jour les stats de l'utilisateur
			if($success){
				$idPost = $this->Post->id;
				
				// Sauvegarde du média 
				if(!empty($d['Post']['media']['name'])){
					
					$photoExist = $this->Post->findById($idPost);
					if($photoExist['Media']['url']){
						//destruction de l'image
						App::uses('File', 'Utility');
						$file = new File(IMAGES.$photoExist['Media']['url']);
						$file->delete();
						$this->Post->Media->deleteAll(array('post_id ="'.$idPost.'"'));
					}					
					
					// Enregistrement du média
					$this->media($d['Post']['media'],"media",$idPost);
				}
				
				
				
				// Sauvegarde des catégories
				
				if(isset($d['Post']['category'])){

foreach ($d['Post']['category'] as $k=>$v) {
						if(is_numeric($v) && $this->Category->exists($v)){
							$dataCategory[] = array('posts_id'=>$idPost,'categorys_id'=>$v);
						}
					}
					$this->Post->Category->saveMany($dataCategory);
				}
				
				
				// Sauvegarde des tags
				
				if(isset($d['Post']['tags'])) {

					$listTag = explode(',',strtolower(str_replace(' ', '',$d['Post']['tags'])));
					
					$tags = array();
					foreach($listTag as $k=>$v) {
						$exist = $this->Tag->find('first', array('conditions' => 'Tag.slug = "'.$v.'"'));
						
						if($exist){
							$inTable = $this->Post->PostTagRelation->find('first', array('conditions' => 'posts_id ="'.$idPost.'"'));
							if(!isset($inTable)) {
								$tags[] = array('posts_id'=>$idPost,'tags_id'=>$exist['Tag']['id']);
							}
							
						}
						else {
							$tag = array('title'=>$v,'slug'=>$v);
							$this->Tag->create();
							$this->Tag->save($tag);
							$idTag = $this->Tag->id;
							$tags[] = array('posts_id'=>$idPost,'tags_id'=>$idTag);
						}
					}
					
					$this->Post->PostTagRelation->saveAll($tags);
					
				}
				
				$msg = "Votre annonce a bien été mise à jour";
				$this->Session->setFlash($msg,"notif");
				
				}
				
				else {
					$this->Session->setFlash("Merci de remplir tous les champs","notif");
				}
				
			}
			// Sinon on indique qu'il y a eu une erreur.
			else{
				$this->Session->setFlash("Une erreur c'est produite, votre annonce n'a pas pu être enregistrer","notif");
			}
			$this->redirect($this->referer());
		}
		// Sinon
		else{

			$data = $this->Post->find('first',array(
				'conditions'=>array('Post.id'=>$id)
			));
			
			$listCategory = $this->Category->find('list');
				//debug($postCategory['id']);
			$this->set('categories', $listCategory);
			
			$this->request->data = $data;
			
		}
	}
	
	

	
	
	private function media($media,$model,$id){
		
		
		
		// Direction du dossier et création
		$dossier = $model;
		if(!file_exists(IMAGES.$dossier)){
			mkdir(IMAGES.$dossier,0777);
		}
		// Gestion du nom du fichier
		// Sépération des terme au point.
		$f = explode('.',$media['name']);
		// extention => Récupération du dernier terme du tableau $f
		$ext = '.'.end($f);
		// nom => Génération du nom de l 'image
		$filename = Inflector::slug(strtolower($f[0].$id),'');
		// URL a enregistrer

		if($media['error']=='0' && !empty($media['tmp_name'])){
			$success = move_uploaded_file($media['tmp_name'],IMAGES.$dossier.DS.$filename.$ext);
			if(!$success){
				$this->Session->setFlash('Erreur lors du téléchargement de l\'image','notif',array('type'=>'error'));
				$this->redirect($this->referer());
			}			
			foreach(Configure::read('Media.formats') as $kk=>$vv){
				$prefix = substr($kk,0,1);
				$size = explode('x',$vv);
				$success = $this->Img->crop(IMAGES.$dossier.DS.$filename.$ext,IMAGES.$dossier.DS.$filename.'_'.$prefix.'.jpg',$size[0],$size[1]);
				if(!$success){
					$this->Session->setFlash('Erreur lors du redimentionnement de votre image','notif',array('type'=>'error'));
					$this->redirect($this->referer());
				}
			}

			$this->loadModel('PostMedia');
			$this->PostMedia->save(array('post_id'=>$id,'url'=>$dossier.DS.$filename.'.jpg','title'=>$filename));
		}	
	}
	
}
?>