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
class AccountController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Account';

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
	public $uses = array('User', 'Role');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */

	public $components = array('Img','RequestHandler');


	public function particulier_dashboard(){
		$idUser = AuthComponent::user('id');
		
			// Récupération des messages non lu et des derniers messages
	        $this->loadModel('Msg');
	        $set['MsgCount'] = $this->Msg->find('count',array(
	        	'conditions'=>array('Msg.read'=>0,'Msg.users_id'=>$idUser),
	        	'recursive'=>-1
	        ));
	        $set['MsgLast'] = $this->Msg->find('all',array(
	        	'conditions'=>array('Msg.users_id'=>$idUser),
	        	'fields'=>array('sender_name','sender_id','subject','id'),
	        	'recursive'=>-1,
	        	'limit'=>4
	        ));
	        

	        // Récupération des Maisons de rêve
	        $this->loadModel('House');
	        $set['HouseCount'] = $this->House->find('count',array(
	        	'conditions'=>array('House.users_id'=>$idUser),
	        	'recursive'=>-1
	        ));

	        

	        $this->set($set);
	}

	public function particulier_network(){
		
	}

	public function particulier_answer(){
		
	}

	public function particulier_edit(){
		debug($user);
		//$this->loadModel();
	}

	public function particulier_settings(){
		
	}

	public function particulier_house(){
		$this->loadModel('RoomCategory');
		$data = $this->RoomCategory->find('all',array('recursive'=>1));
		$set['data'] = $data;

		$this->loadModel('House');
		$this->loadModel('HouseItemTerm');
		$this->loadModel('RoomItem');
		$house = $this->House->find('first',array(
			'contain'=>array(
				'RoomItem'=>array(
					'RoomItemAttribute'=>array(
						'RoomItemAttributeDetail'=>array(
							'order'=>array('RoomItemAttributeDetail.order'=>'DESC')
						)
					)
				)
			)
		));
		$set['house'] = $house;
		
		
		
	
		$this->set($set);
	}

	public function particulier_houselist(){
		
	}

















	public function pro_dashboard(){
		$idUser = AuthComponent::user('id');
		
			// Récupération des messages non lu et des derniers messages
	        $this->loadModel('Msg');
	        $set['MsgCount'] = $this->Msg->find('count',array(
	        	'conditions'=>array('Msg.read'=>0,'Msg.users_id'=>$idUser),
	        	'recursive'=>-1
	        ));
	        $set['MsgLast'] = $this->Msg->find('all',array(
	        	'conditions'=>array('Msg.users_id'=>$idUser),
	        	'fields'=>array('sender_name','sender_id','subject','id'),
	        	'recursive'=>-1,
	        	'limit'=>4
	        ));
	        

	        // Récupération des Maisons de rêve
	        $this->loadModel('House');
	        $set['HouseCount'] = $this->House->find('count',array(
	        	'conditions'=>array('House.users_id'=>$idUser),
	        	'recursive'=>-1
	        ));

	        

	        $this->set($set);
	}

	public function pro_network(){
		
	}

	public function pro_answer(){
		
	}

	public function pro_edit(){
		$user = AuthComponent::user();
		$this->loadModel('User');
		$this->User->id = $user['id'];
		$data = $this->User->read();
		$this->request->data = $data;
		
	}

	public function pro_settings(){
		
	}

	public function pro_house(){
		$this->loadModel('RoomCategory');
		$data = $this->RoomCategory->find('all',array('recursive'=>1));
		$set['data'] = $data;

		$this->loadModel('House');
		$this->loadModel('HouseItemTerm');
		$this->loadModel('RoomItem');
		$house = $this->House->find('first',array(
			'contain'=>array(
				'RoomItem'=>array(
					'RoomItemAttribute'=>array(
						'RoomItemAttributeDetail'=>array(
							'order'=>array('RoomItemAttributeDetail.order'=>'DESC')
						)
					)
				)
			)
		));
		$set['house'] = $house;
		
		
		
	
		$this->set($set);
	}





























	public function sharepost($id){
		$slug = $id;
		$id = explode('-',$id);
		$id = end($id);
		$user = AuthComponent::user();
		$usermail = $user['mail'];
		$userid = $user['id'];
		if($userid){
			if($this->request->is('post') || $this->request->is('put')){
				$data = $this->request->data;
				$email = $data['Share']['mail'];
				$Syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#'; 
				if(isset($email) && preg_match($Syntaxe,$email)){
					$save = array('users_id'=>$userid,'posts_id'=>$id,'mail'=>$email);
					$this->loadModel('PostShare');
					$exist = $this->PostShare->find('first',array(
						'conditions'=>$save,
						'recursive'=>-1
					));
					if(!$exist){
						$success = $this->PostShare->save($save);
						
						if($success){
							$this->loadModel('Post');
							$post = $this->Post->find('first',array(
								'conditions'=>array('Post.id'=>$id)
							));
							// Envoie de la notification par mail
							App::uses('CakeEmail','Network/Email');
							$mail = new CakeEmail();
							$mail->from('support@sympathy-world.fr')
							->to($email)
							->subject('Partage d\'article')
							->emailFormat('html')->template('sharePost')
							->viewVars(array('usermail'=>$usermail,'post'=>$post))
							->send();

						
						}
						
						$this->Session->setFlash('L\'article a bien été envoyé à votre contact : '.$email,'notif');
					}else{
						$this->Session->setFlash('Vous avez déjà envoyé cet article à ce contact','notif');
					}
				}
				$this->redirect(array('controller'=>'mag','action'=>'article',$slug));
			}else{
				$this->redirect('/');
			}
		}else{
			$this->redirect('/');
		}

	}

	public function badge(){

		$user = AuthComponent::user();
		$userid = $user['id'];
		if($userid){
			// Récupération des badges
			$this->loadModel('Badge');
			$data = $this->Badge->find('all',array(
				'conditions'=>array('active'=>1),
				'order'=>array('lvl','deblok','object')
			));
			foreach($data as $k=>$v){
				$v = current($v);
				$badge[$v['lvl']][$v['object']][] = $v;
			}
			$this->loadModel('UserBadge');
			$userbadge = $this->UserBadge->find('all',array(
				'conditions'=>array('users_id'=>$userid)
			));
			$valid = array();
			foreach ($userbadge as $k => $v){
				$v = current($v);
				$valid[$v['badges_id']] = true; 
			}
			
			$quota = $this->User->find('first',array(
				'conditions'=>array('id'=>$userid),
				'recursive'=>-1,
				'fields'=>array('comment_rate','favoripost_rate','likegive_rate','likeme_rate','sendpost_rate','befavori_rate','commentforum_rate','createforum_rate','favori_rate','subscribeforum_rate','buy_rate','pass_rate','proevent_rate','rdvaccept_rate','rdvgive_rate')
			));
			

			
			//debug($badge);
			$set['valid'] = $valid;
			$set['badge'] = $badge;
			$set['quota'] = $quota['User'];
		
			$this->set($set);
		}else{
			$this->redirect('/');
		}
	}

	public function testimonie(){

		$user = AuthComponent::user();
		$userid = $user['id'];

		if($userid){
			$this->loadModel('Testimonie');
			if($this->request->is('post') || $this->request->is('put')){
				$data = $this->request->data;
				
				$data['Testimonie']['users_id'] = $userid;
				$this->Testimonie->save($data);
				$this->redirect(array('controller'=>'account','action'=>'testimonie'));
			}else{
				$data = $this->Testimonie->find('first',array(
					'conditions'=>array(
						'users_id'=>$userid
					)
				));
				$this->request->data = $data;
			}
		}else{
			$this->redirect('/');
		}

		
		
	}

	public function avatar(){
		$this->loadModel('Avatar');
		$data = $this->Avatar->find('all');
		$avatar = array();
		foreach ($data as $k=>$v) {
			$avatar[] = $v['Avatar']['media'];
		}
		$this->set('avatar',$avatar);

	}

	public function deletefavorite($id){
		$connect = AuthComponent::user();
 		$user = $connect['id'];
 		if($user!=$id && $user && is_numeric($id)){
 			$favori = array('users_id'=>$user,'favoris_id'=>$id);
 			if($favori){
 				$this->loadModel('Favori');
	 			$delete = $this->Favori->deleteAll($favori,false,false);
	 			if($delete){
	 				$this->Session->setFlash('Ce membre a bien retiré à vos favoris','notif');
	 			}else{
	 				$this->Session->setFlash('Ce membre n\'a pas pu être retiré de vos favoris','notif');
	 			}
	 		}
	 		$this->redirect(array('controller'=>'membre','action'=>'index'));

 		}
	}

 	public function addfavorite($id){
 		$connect = AuthComponent::user();
 		$user = $connect['id'];

 		if($user!=$id && $user && is_numeric($id)){
 			$save = array('users_id'=>$user,'favoris_id'=>$id);
 			
 			$favori = $this->User->find('first',array(
 				'fields'=>array('pseudo','mail'),
 				'conditions'=>array('id'=>$id),
 				'recursive'=>-1
 			));
 			$this->loadModel('Favori');
 			$find = $this->Favori->find('first',array(
 				'conditions'=>$save,
 				'recursive'=>-1,
 				'fields'=>array('id')
 			));
 			if($favori && !$find){
 				$pseudo = $favori['User']['pseudo'];
 				$email = $favori['User']['mail'];
	 			$success = $this->Favori->save($save);
	 			if($success){
	 				$this->increaseRate(array('user'=>$user,'object'=>'favori'));
	 				$this->increaseRate(array('user'=>$id,'object'=>'befavori'));
	 				$this->Session->setFlash('Ce membre a bien été ajouté à vos favoris','notif');
	 				// Création du lien pointant vers le sujet
					//$link = array('controller'=>'forum','action'=>'view','id'=>$id,'slug'=>$slug);
					// Envoie de la notification par mail
					App::uses('CakeEmail','Network/Email');
					$mail = new CakeEmail();
					$mail->from('support@sympathy-world.fr')
					->to($email)
					->subject('Ajout aux favoris')
					->emailFormat('html')->template('notifFavori')
					->viewVars(array('username'=>$connect['pseudo'],'pseudo'=>$pseudo))
					->send();
	 			}
	 		}else{
	 			if($find){
	 				$this->Session->setFlash('Ce membre est déjà dans vos favori','notif');
	 			}else{
	 				$this->Session->setFlash('Ce membre n\'existe pas','notif');
	 			}
	 		}
	 		$this->redirect(array('controller'=>'membre','action'=>'index'));
		
 		}else{
 			$this->redirect('/');
 		}
 	}

 	public function addblacklist($id){

 	}

 	public function getpass(){

 	}

 	public function addlikepost($id){
 		$connect = AuthComponent::user();
 		$user = $connect['id'];
 		if($user && is_numeric($id)){
 			$this->loadModel('PostFavori');
			$save =  array('users_id'=>$user,'posts_id'=>$id);
			$exist = $this->PostFavori->find('first',array(
				'conditions'=>$save,
				'recursive'=>-1
			));
			if(!$exist){
				$success = $this->PostFavori->save($save);
				if($success){
					$this->inscreaseRate(array('user'=>$user,'object'=>'favoripost'));
					$this->Session->setFlash('Cet article a bien été ajouté dans vos favori','notif');
				}else{
					$this->Session->setFlash('Cet article n\'a pas pu être ajouté dans vos favori','notif');
				}
			}else{
				$this->Session->setFlash('Cet article est déjà dans vos favori','notif');
			}	
 		}
 		$this->redirect($this->referer());
 		
 	}

 	public function deletelikepost(){

 	}

 	public function addlike($id=null){
 		$connect = AuthComponent::user();
 		$user = $connect['id'];
 		$etat = true;
 		$msg = '';
 		if($user!=$id){
	 		if($this->RequestHandler->isAjax()){
	 			$this->loadModel('Like');
	 			$sender = array();
	 			$recever = array();
	 			$exist = $this->Like->find('first',array(
	 				'conditions'=>array('users_id'=>$user,'receives_id'=>$id)
	 			));
	 			
	 			if(!$exist){
		 			$this->User->recursive = -1;
		 			$users = $this->User->find('all',array(
		 				'conditions'=>array('id'=>array($user,$id))
		 			));
		 			foreach($users as $k=>$v){
		 				$v = current($v);
		 				// Récupération du donneur
		 				if($v['id']==$user){
		 					$sender = array('id'=>$v['id'],'likegive_rate'=>$v['likegive_rate'],'likeme_rate'=>$v['likeme_rate']);
		 					if($v['likegive_rate']>=100){ $etat = false; $msg = 'Vous n\'avez plus de point de sympathy'; }
		 				}
		 				// Récupération du receveur
		 				if($v['id']==$id){
		 					$recever = array('id'=>$v['id'],'likegive_rate'=>$v['likegive_rate'],'likeme_rate'=>$v['likeme_rate']);
		 					if($v['likeme_rate']>=100){ $etat = false; $msg = 'Le membre ne peux plus recevoir de point de sympathy'; }
		 				}
		 			}
		 		}else{
		 			$etat = false; $msg = 'Vous avez déjà accordé un point de sympathy à ce membre';
		 		}
	 			
	 		}
	 		elseif($this->request->is('post') || $this->request->is('put')){

	 			// Récupération des données formulaires
	 			$post = $this->request->data['Like'];

	 			// Voir si le Like existe aps
	 			$this->loadModel('Like');
	 			$exist = $this->Like->find('first',array(
	 				'conditions'=>array('users_id'=>$post['sender'],'receives_id'=>$post['recever'])
	 			));
	 			
	 			// Si le Like n'existe pas on effectue l'action
	 			if(!$exist){
	 				$answer = $this->Like->find('first',array(
		 				'conditions'=>array('users_id'=>$post['recever'],'receives_id'=>$post['sender'])
		 			));
		 			if($answer){
		 				$answer = true;
		 			}else{
		 				$answer = false;
		 			}
	 				$userReceive = current($this->User->find('first',array(
	 					'conditions'=>array('id'=>$post['recever']),
	 					'fields'=>array('mail','pseudo','likeme_rate'),
	 					'recursive'=>-1
	 				)));
	 				$email = $userReceive['mail'];
	 				$pseudo = $userReceive['pseudo'];
	 				$rate = $userReceive['likeme_rate'];
	 				
	 				$success = $this->Like->save(array('users_id'=>$post['sender'],'receives_id'=>$post['recever']));
	 				// Si le point a bien été attribué. Remise des points badge concernant l'action
	 				if($success){
	 					$this->inscreaseRate(array('user'=>$post['sender'],'object'=>'likegive'));
	 					$this->inscreaseRate(array('user'=>$post['recever'],'object'=>'likeme'));
	 				}
	 				// Création du lien pointant vers le sujet
					//$link = array('controller'=>'forum','action'=>'view','id'=>$id,'slug'=>$slug);
					// Envoie de la notification par mail
					App::uses('CakeEmail','Network/Email');
					$mail = new CakeEmail();
					$mail->from('support@sympathy-world.fr')
					->to($email)
					->subject('On vous a accordé un point de Sympathy')
					->emailFormat('html')->template('notifPoint')
					->viewVars(array('username'=>$connect['pseudo'],'pseudo'=>$pseudo,'rate'=>$rate+1,''))
					->send();

					$this->Session->setFlash('Votre point de sympathy a bien été accordé','notif');
	 			}else{
	 				$this->Session->setFlash('Votre point de sympathy n\'a pas été accordé','notif');
	 			}

				$this->redirect(array('controller'=>'membre','action'=>'index'));
				die();

	 		}
	 		
	 		$set = array('sender'=>$sender,'recever'=>$recever,'etat'=>$etat,'msg'=>$msg);
	 		
	 	}else{
	 		$set = array('etat'=>false,'msg'=>'Vous ne pouvez pas vous accorder de point de sympathy');
	 	}	
	 	$this->set($set);
 	}


 	public function captcha($valeur=null){
		
		$valeur = base64_decode($valeur);
		$keyDay = date('d-m:-y');
		$keyDay = str_replace('-','y',$keyDay);
		$keyDay = explode(':',$keyDay);
		$valeur = str_replace($keyDay[0],'',$valeur);
		$valeur = str_replace($keyDay[1],'',$valeur);
		

		$im = @imagecreatefromjpeg('http://sympathy-world.fr/img/captcha/'.$valeur.'.jpg');
		
		header('Content-Type: image/jpeg');
		
		imagejpeg($im);
		die();
	}
 
 	public function sendmessage(){
		
		$captchaDecode = array(
			'4R1d'=>'1',
			'7Ye3'=>'2',
			'm2B6'=>'3',
			'O5w7'=>'4',
			'5e2U'=>'5',
			'1U7s'=>'6',
			'E71d'=>'7',
			'p4Q8'=>'8',
			'H3e7'=>'9'
		);
		
		$d = $this->request->data; 
		
		$lotA = $d['Mail']['lotA'];
		$lotB = $d['Mail']['lotB'];
		
		$lotA = base64_decode($lotA);
		$keyDay = date('d-m:-y');
		$keyDay = str_replace('-','y',$keyDay);
		$keyDay = explode(':',$keyDay);
		$lotA = str_replace($keyDay[0],'',$lotA);
		$lotA = str_replace($keyDay[1],'',$lotA);
		
		$lotB = base64_decode($lotB);
		$keyDay = date('d-m:-y');
		$keyDay = str_replace('-','y',$keyDay);
		$keyDay = explode(':',$keyDay);
		$lotB = str_replace($keyDay[0],'',$lotB);
		$lotB = str_replace($keyDay[1],'',$lotB);
		
		$lotA = $captchaDecode[$lotA];
		$lotB = $captchaDecode[$lotB];
		
		
		
		
		
		$result = $d['Mail']['result'];
		
		$name = $d['Mail']['name'];
		$mailuser = $d['Mail']['mail'];
		$message = $d['Mail']['message'];
		
		if($result==$lotA+$lotB){
		App::uses('CakeEmail','Network/Email');
					$mail = new CakeEmail();
					$mail->from($mailuser)
					->to('romain@just-art.fr')->subject('Formulaire de contact')
					->emailFormat('html')->template('sendmessage')
					->viewVars(array('username'=>$name,'message'=>$message))
					->send();

					$this->Session->setFlash('Votre message a bien été envoyé','notif');
					$this->redirect('/');
		}
		else{
					$this->Session->setFlash('Votre message n\'a pas été envoyé','notif');
					$this->redirect('/');
		}
		
		
	}

 
	public function addnews() {


		App::import('vendor','mailjet');
		// Create a new Object
		$mj = new Mailjet();
		# Parameters
		$params = array(
		    'method' => 'POST',
		    'contact' => 'print@just-art.fr',
		    'id' => '179943'
		);
		# Call
		$response = $mj->listsAddContact($params);
		# Result
		$contact_id = $response->contact_id;

		
 
		$mail = $_GET['mail'];

		$Syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#'; 
		if(isset($mail) && preg_match($Syntaxe,$mail)){
			
				App::import('vendor','mailjet');
				// Create a new Object
				$mj = new Mailjet();
				# Parameters
				$params = array(
				    'method' => 'POST',
				    'contact' => $mail,
				    'id' => '179943'
				);
				# Call
				$response = $mj->listsAddContact($params);
				# Result
				$contact_id = $response->contact_id;
			
				$this->Session->setFlash('Vous êtes bien inscrit à notre newsletter','notif');
				$this->redirect('/');
			
			
			
		}
		else{
			$this->Session->setFlash('L\'adresse e-mail renseignée n\'est pas correct','notif');
			$this->redirect('/');
		}
	}

	public function more($id) {
		//debug($this->request);
		$user = AuthComponent::user();
		if($user){
			$profil = $this->User->find('first',array(
				'conditions'=>array('User.id'=>$id),
				'fields'=>array('id','pseudo','sexe','situation','waiting','media','last_action','mail','notif_profil')
			));

			$email = $profil['User']['mail'];
			$notif = $profil['User']['notif_profil'];
			
		   	foreach($profil['Category'] as $k=>$v){
		   		$category[] = array('id'=>$v['id'],'name'=>$v['name']);
		   	}
		   	$profil['Category'] = $category;

		   	// Envoie de la notification si elle est activé
		   	if($notif==1){
			   	App::uses('CakeEmail','Network/Email');
				$mail = new CakeEmail();
				$mail->from('support@sympathy-world.fr')
				->to($email)
				->subject($user['pseudo'].' a consulté votre profil')
				->emailFormat('html')->template('notifViewProfil')
				->viewVars(array('username'=>$profil['User']['mail'],'pseudo'=>$user['pseudo']))
				->send();
			}
			

		   	$this->set(array('user'=>$profil));
		}else{
			die();
		}
	   	
	
	}

	public function comment($id){
		$user = AuthComponent::user();
		if($user){
			$data = $this->request->data;
			$this->loadModel('PostComment');
			$save = array('posts_id'=>$id,'users_id'=>$user['id'],'content'=>$data['message'],'name'=>$user['pseudo'],'thumbs'=>$user['media']);
			$success = $this->PostComment->save($save);
			$msg = '';
			if($success){
				$this->inscreaseRate(array('user'=>$user['id'],'object'=>'comment'));
				$msg.= '<tr><td class="media"><img width="50" src="/finalsym/img/'.str_replace('.','_s.',$user['media']).'"></td>';
				$msg.= '<td>'.$data['message'].'</td></tr>';
			}
			$d['msg'] = $msg;
			echo json_encode($d);
		}
		die();
	}
	
	public function deletenews() {

 
		$mail = $_GET['mail'];
		$Syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#'; 
		if(isset($mail) && preg_match($Syntaxe,$mail)){
			
			$this->loadModel('Newsletter');
			
			$isUnique = $this->Newsletter->find('count',array(
				'conditions'=>array('mail'=>$mail)
			));
			
			if($isUnique == 1){
				$success = $this->Newsletter->deleteAll(array('mail' => $mail), false);
				if($success){
					$this->Session->setFlash('Vous n’êtes plus inscrit à notre newsletter','notif');
					$this->redirect('/');
				}
				else{
					$this->Session->setFlash('Une erreur s\’est produite, veuillez réessayer ultérieurement','notif');
					$this->redirect('/');
				}
			}
			else{
				$this->Session->setFlash('Vous n\'êtes pas inscrit à notre newsletter','notif');
				$this->redirect('/');
			}
			
			
			
		}
		else{
			$this->Session->setFlash('L\'adresse e-mail renseignée n\'est pas correct','notif');
			$this->redirect('/');
		}
		
		
		
	}
	
	public function random(){
		$characters = "0-1-2-3-4-5-6-7-8-9-a-b-c-d-e-f-g-h-i-j-k-l-m-n-o-p-q-r-s-t-u-v-w-x-y-z-A-B-C-D-E-F-G-H-I-J-K-L-M-N-O-P-Q-R-S-T-U-V-W-X-Y-Z";
		$characters = explode('-',$characters);
		$randstring = '';
		for ($i = 0; $i < 10; $i++){
			
			$d = count($characters)-1;
			$d = rand(0,$d);
			$randstring = $randstring.$characters[$d];
		}
		return $randstring;
	}

	public function edit(){
		$user = AuthComponent::user();
		if($user){
			$id = $user['id'];

			if($this->request->is('post') || $this->request->is('put')){

				$d = $this->request->data;

				
				if(isset($d['User']['user_roles_id'])){
					die();
				}
				$d['User']['born'] = $d['User']['born-year'].'-'.$d['User']['born-month'].'-'.$d['User']['born-day'];
				// Récupération des Catégorie
				foreach ($d['Category'] as $k => $v) {
					if($v==1){ $category[] = $k; }
				}
				// Vérification du nombre de catégorie séléctionné
				if(count($category)<0 && count($category)>3){
					$this->Session->setFlash('Vous n\'avez pas respécté le nombre de catégorie','notif');
					$this->redirect($this->referer());
				}
				// Vérification du mot de passe
				if($d['User']['passwordA'] != $d['User']['passwordB']){
					$this->Session->setFlash('Vos mots de passe ne correspondent pas','notif');
					$this->redirect($this->referer());
				}
				// Vérification du mail
				if($d['User']['mailA'] != $d['User']['mailB']){
					$this->Session->setFlash('Les champs mail ne correspondent pas','notif');
					$this->redirect($this->referer());
				}

				$d['User']['mail'] = $d['User']['mailA'];
				if(!empty($d['User']['passwordA'])){
					$d['User']['password'] = Security::hash($d['User']['passwordA'],null,true);
				}
				$mdp = $d['User']['mailA'];
				$d['User']['id'] = $id;
				$d = $d['User'];
				
				if(!empty($d['picture']['name'])){
					$media = $d['picture'];
					$dossier = 'profil';
					$ext = explode('.',$media['name']);
					$ext = '.'.end($ext);
						
					if($media['error']=='0' && !empty($media['tmp_name'])){
						$filename = $this->random().'-'.$id;
						
						$upload = move_uploaded_file($media['tmp_name'],IMAGES.$dossier.DS.$filename.$ext);
						if(!$upload){
							$this->Session->setFlash('Erreur lors du téléchargement de l\'image','notif',array('type'=>'error'));
							$this->redirect($this->referer());
						}		
						$vignette = array(
							'small' => '100x100',
						);	
						foreach($vignette as $kk=>$vv){
							$prefix = substr($kk,0,1);
							$size = explode('x',$vv);
							$success = $this->Img->crop(IMAGES.$dossier.DS.$filename.$ext,IMAGES.$dossier.DS.$filename.'_'.$prefix.'.jpg',$size[0],$size[1]);
							if(!$success){
								$this->Session->setFlash('Erreur lors du redimentionnement de votre image','notif',array('type'=>'error'));
								$this->redirect($this->referer());
							}
						}

						$d['media'] = $dossier.DS.$filename.'.jpg';
					}	
				}
				
			


				$success = $this->User->save($d);

				$this->Session->write('Auth.User.media',$d['media']);
				$this->Session->write('Auth.User.pseudo',$d['pseudo']);

				if($success){
						
						// Enregistrement des catégorie
						foreach($category as $k=>$v){
							$dataCategory[] = array('users_id'=>$id,'categorys_id'=>$v);
						}
						$this->loadModel('UserCategoryTerm');
						$this->UserCategoryTerm->deleteAll(array('users_id'=>$id));
						$this->UserCategoryTerm->saveMany($dataCategory);
					
						$this->Session->setFlash('Votre profil a bien été mis à jour','notif');
						$this->redirect(array('controller'=>'account','action'=>'edit'));
				}
				else{
					
					$this->Session->setFlash("Votre profil n'a pas été mis à jour",'notif',array('type'=>'error'));
				}
			}else{
				$this->User->id = $id;
				$this->loadModel('Category');
				$this->loadModel('Soutien');
				$category = $this->Category->find('all',array('order'=>array('name ASC')));
				$soutien = $this->Soutien->find('all');

				$data = $this->User->read();

				foreach($data['Category'] as $k=>$v){
					$categoryTerm[$v['id']] = 1; 
				}
				$data['Category'] = $categoryTerm;
				$set = array('category'=>$category,'soutien'=>$soutien);
				$this->set($set);
				$born = explode('-',$data['User']['born']);
				$data['User']['born-day'] = $born[2];
				$data['User']['born-month'] = $born[1];
				$data['User']['born-year'] = $born[0];
				$this->request->data = $data;
			}

		}else{
			$this->redirect('/');
		}
		
		
	}
	
	public function signup() {
		
		if($this->request->is('post')){
			
			$d = $this->request->data;
			
			// Choisir un avatar au hasard
			$this->loadModel('Avatar');
			$data = $this->Avatar->find('all');
			$avatar = array();
			foreach ($data as $k=>$v) {
				$avatar[] = $v['Avatar']['media'];
			}
			$countAvatar = count($avatar)-1;
			$choiceAvatar = rand(0,$countAvatar);
			$avatar = $avatar[$choiceAvatar];

			// Récupération des Catégorie
			foreach ($d['Category'] as $k => $v) {
				if($v==1){ $category[] = $k; }
			}
			$tagCategory = implode('-',$category);
			$tagCategory = '-'.$tagCategory.'-';
			
			// Vérification du nombre de catégorie séléctionné
			if(count($category)<0 && count($category)>3){
				$this->Session->setFlash('Vous n\'avez pas respécté le nombre de catégorie','notif');
				$this->redirect($this->referer());
			}
			// Vérification du mot de passe
			if($d['Post']['passwordA'] != $d['Post']['passwordB']){
				$this->Session->setFlash('Vos mots de passe ne correspondent pas','notif');
				$this->redirect($this->referer());
			}
			// Vérification du mail
			if($d['Post']['mailA'] != $d['Post']['mailB']){
				$this->Session->setFlash('Les champs mail ne correspondent pas','notif');
				$this->redirect($this->referer());
			}

			$d['Post']['mail'] = $d['Post']['mailA'];
			$d['Post']['password'] = Security::hash($d['Post']['passwordA'],null,true);
			$d['Post']['category_tag'] = $tagCategory;
			$d['Post']['media'] = $avatar;
			
			$mdp = $d['Post']['mailA'];
			$d = $d['Post'];

			$success = $this->User->save($d);

			if($success){
					
					/*
					if($d['Newsletter'][''] ==1){
						$this->loadModel('Newsletter');
						$news = array('mail'=>$d['User']['mail']);
						$this->Newsletter->create();
						$this->Newsletter->save($news);
					}
					*/

					$id = $this->User->id;

					// Enregistrement des catégorie
					foreach($category as $k=>$v){
						$dataCategory[] = array('users_id'=>$id,'categorys_id'=>$v);
					}
					$this->loadModel('UserCategoryTerm');
					$this->UserCategoryTerm->saveMany($dataCategory);
					
					$link = array('controller'=>'account','action'=>'activate',$id.'-'.md5($d['password']));
					App::uses('CakeEmail','Network/Email');
					$mail = new CakeEmail();
					$mail->from('support@sympathy-world.fr')
					->to($d['mail'])->subject('Inscription')
					->emailFormat('html')->template('signup')
					->viewVars(array('username'=>$d['mail'],'mdp'=>$mdp,'link'=>$link))
					->send();
					$this->Session->setFlash('Votre demande a bien été prise en compte, une confirmation par mail vous a été envoyé','notif');
					$this->redirect('/');
				
			}
			else{
				
				$this->Session->setFlash("Votre demande n'est pas valide",'notif',array('type'=>'error'));
			}
			
		}else{
			$this->loadModel('Category');
			$category = $this->Category->find('all',array('order'=>array('name ASC')));
			$set = array('category'=>$category);
			$this->set($set);
			
		}
	}
	
	public function forget() {
		
			$email = $this->request->data['User']['mail'];
			
			$syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#'; 
			
			if(isset($email) && preg_match($syntaxe,$email)){
				
				$pwd = $this->User->find('first',array(
					'conditions'=>array('User.mail'=>$email),
					'fields'=>array('password','id','pseudo','active')
				));
				
				
				
				if($pwd){
					
					if($pwd['User']['active']==0){
						$this->Session->setFlash('Ce compte n\'est pas actif.','notif',array('type'=>'error'));
					$this->redirect('/');
					}
				
				$id = $pwd['User']['id'];
				$pseudo = $pwd['User']['pseudo'];
				$pwd = $pwd['User']['password'];
				
				
				$date = date('y').date('m').date('d');
				$link = array('controller'=>'account','action'=>'change',$id.'-'.$date.md5($pwd));
				
					App::uses('CakeEmail','Network/Email');
					$mail = new CakeEmail();
					$mail->from('support@sympathy-word.fr')
					->to($email)->subject('Demande de réinitialisation')
					->emailFormat('html')->template('reset')
					->viewVars(array('username'=>$pseudo,'link'=>$link))
					->send();
					$this->Session->setFlash('Votre demande a bien été prise en compte, une confirmation par mail vous a été envoyé','notif');
					$this->redirect('/');
				}
				else{
					$this->Session->setFlash('L\'adresse e-mail renseignée ne correspond à aucun compte','notif',array('type'=>'error'));
					$this->redirect('/');
				}
				
			}
			else{
				$this->Session->setFlash('L\'adresse e-mail renseignée n\'est pas correct','notif',array('type'=>'error'));
				$this->redirect('/');
			}


	}


	function tchatlist(){
		$user = AuthComponent::user();
		$id = $user['id_adherent'];

		if($id){
			$this->loadModel('TchatRoom');
			$creator = $this->TchatRoom->find('all',array('conditions'=>array('id_creator'=>$id)));
			$correspondant = $this->TchatRoom->find('all',array('conditions'=>array('id_correspondant'=>$id)));

			foreach ($creator as $k => $v) {
				$v = current($v);
				$adh[] = $v['id_correspondant'];
			}
			foreach ($correspondant as $k => $v) {
				$v = current($v);
				$adh[] = $v['id_creator'];
			}

			$this->paginate = array(
				'conditions'=>array('actif_adherent'=>1,'id_adherent'=>$adh),
				'order'=>array('lastAction_adherent'=>'desc'),
				'limit'=>30
			);
			$data = $this->paginate('Adherent');
			$this->set('data',$data);
		}
		
	}

	function information(){
		
		
		$user = AuthComponent::user();
		$id = $user['id'];

		if($id){
			/*
			$this->loadModel('Category');
			$this->loadModel('CategoryTerm');
			if($this->request->is('post') || $this->request->is('put')){
				$data = $this->request->data;
				$data['Adherent']['id_adherent'] = $id;
				$this->Adherent->save($data['Adherent']);
				
				$this->CategoryTerm->deleteAll(array('id_adherent'=>$id));
				foreach($data['Cat'] as $k=>$v){
					if($v==1){
						$cat[] = array('id_adherent'=>$id,'categorie_id'=>$k);
					}
				}
				$this->CategoryTerm->saveMany($cat);

				
				
				$this->redirect($this->referer());
				
			}else{
				$data = $this->Adherent->find('first',array(
					'conditions'=>array('id_adherent'=>$id)
				));

				$category = $this->Category->find('all',array(
					'order'=>array('categorie_id_ordre DESC')
				));
				foreach($category as $k=>$v){
					$v = current($v);
					$cat[$v['categorie_id']] = $v['categorie_nom']; 
				}

				$categoryTerm = $this->CategoryTerm->find('all',array(
					'conditions'=>array('id_adherent'=>$id)
				));
				foreach($categoryTerm as $k=>$v){
					$v = current($v);
					$term[$v['categorie_id']] = $v['categorie_id'];
				}
				
				$this->set(array('cat'=>$cat,'term'=>$term));
				$this->request->data = $data;
			}
			*/
		}
		
	}
	
	
	
	

	

	


   		
	function login(){
		
		
	   if($this->request->is('post')){
	   		
	   		

	   		if($this->Auth->login()){

	   			$this->loadModel('Role');
	   			$role = AuthComponent::user('Role.title');
	   		
	   			
	   			if($role=="particulier" || $role=="pro"){
	   				
	   				$this->redirect(array('controller'=>'account','action'=>'dashboard',$role=>true));
	   			}else{
	   				$this->redirect(array('controller'=>'account','action'=>'logout','prefixes'=>false));
	   			}

	   			
				debug($role);

				die();	   			

				$this->Session->setFlash('Vous êtes connecté','notif');
				
				if($user['Role']['admin']) {
					$this->redirect(array('controller'=>'post','action'=>'index', 'admin'=>'true'));
				}
				else {
					$this->redirect(array('controller'=>'membre','action'=>'index'));
				}
				
			}
			else{
				$mail = $this->request->data['User']['mail'];
				$Syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#'; 
				if(preg_match($Syntaxe,$mail)){
					$this->Session->setFlash('Votre mail et mot de passe ne correspondent pas ou n’existent pas','notif',array('type'=>'error'));
				}else{
					$this->Session->setFlash('Attention votre identifiant doit être mail l\'adresse lié à votre compte','notif',array('type'=>'error'));
				}
				//$this->redirect('/');
			}
	   }
	   else{ 
	   
	   }
   }
	
	public function logout(){
		$this->Auth->logout();
		$this->Session->setFlash('Vous êtes déconnecté','notif');
		$this->redirect('/');
	}
	
	public function activate($token){
		$token = explode('-',$token);
		$user = $this->User->find('first',array(
			'conditions' => array ('User.id'=>$token[0],'MD5(User.password)'=>$token[1],'active'=>0)
		));
		if(!empty($user)){
			$this->User->id = $user['User']['id'];
			$this->User->saveField('active',1);
			//$this->Profile->save(array('users_id'=>$user['User']['id']));
			$this->Session->setFlash("Votre demande a bien été activé","notif");
		}
		else{
			$this->Session->setFlash("Ce lien d'activation n'est pas valide ",'notif',array('type'=>'error'));
		}
		$this->redirect('/');
		
	
	}
	
	public function change($token){
		
	
		$token = explode('-',$token);
		$id = $token[0];
		$valide = substr($token[1],0,6);
		$date = date('y').date('m').date('d');
		$token = substr($token[1],6);
		
	
		
		if($valide === $date){
		
			$user = $this->User->find('first',array(
				'conditions' => array ('User.id'=>$id,'MD5(User.password)'=>$token),
				'fields' => array('User.id','User.mail','User.pseudo')
			));
			
			
			if(empty($user)){
				$this->Session->setFlash("Ce lien d'activation n'est pas valide ",'notif',array('type'=>'error'));
			}
			else{
				
				
				/* Création du nouveau mot de passe */
				$nbr = 8;
				$str = "";
				$chaine = "123456789abcdefghijklmnpqrstuvwxy";
				$nb_chars = strlen($chaine);
			
				for($i=0; $i<$nbr; $i++)
				{
					$str .= $chaine[ rand(0, ($nb_chars-1)) ];
				}
				$mdp = $str;
				
				/* Envoie du mot de passe par mail */
				
				App::uses('CakeEmail','Network/Email');
					$mail = new CakeEmail();
					$mail->from('support@sympathy-world.fr')
					->to($user['User']['mail'])->subject('Demande de réinitialisation')
					->emailFormat('html')->template('newpass')
					->viewVars(array('username'=>$user['User']['pseudo'],'mdp'=>$mdp))
					->send();
					
				/* Enregistrement du nouveau mot de passe */
				
				$newpwd = Security::hash($mdp,null,true);
				$this->User->id = $id;
				$this->User->saveField('password',$newpwd);
				$this->Session->setFlash("Votre nouveau mot de passe vous a été envoyé par mail","notif");
			}
		}
		else{
			$this->Session->setFlash("Ce lien d'activation n'est plus valide ",'notif',array('type'=>'error'));
		}
		$this->redirect('/');
	}


	public function tchatabus($id) {
		//debug($this->request);

		$user = AuthComponent::user();
		$userid = $user['id'];

		if($userid){
			$this->loadModel('TchatAbu');
			// Récupération du tchat entre les deux membres.
			if($userid>$id){
				$fichier = 'tchat'.$userid.'-'.$id.'.json';
			}else{
				$fichier = 'tchat'.$id.'-'.$userid.'.json';
			}
			$date = explode('-',date('Y-m'));
			$year = $date['0'];
			$month = $date['1'];
			$fichier = 'files/tchat'.DS.$year.DS.$month.DS.$fichier;
			$dialog = json_decode(file_get_contents($fichier),true);

			$dataUser = $this->User->find('all',array(
				'conditions'=>array('User.id'=>array($userid,$id)),
				'fields'=>array('media','pseudo','id'),
				'recursive'=>-1
			));
			foreach($dataUser as $k=>$v){
				$v = current($v);
				$listUser[$v['id']] = $v;
			}
			
			$time = time();
							$day = date('Y-m-d');
			$msg = '<table>';
			foreach($dialog['Msg'] as $kk=>$vv){ 
										  
										  if($day==$vv['day']){
												$created = $vv['hour'];
											}else{
												$created = $time-$vv['created'];
												if($created<86400){
													$created = 'Hier';
												}else{
															$created = round($created/86400,0);
															$many = '';
															if($created>1){
																$many = 's';
															}
															$created = 'Il y a '.round($created,0).'jour'.$many;
												} 
											}
										   $msg.= '<tr>'.
											'<td class="thumbs"><img src="/world/'.IMAGES_URL.$listUser[$vv['users_id']]['media'].'" width="32" height="32"></td>'.
											'<td><div class="head"><b>'.$listUser[$vv['users_id']]['pseudo'].'</b><em>'.$created.'</em></div>'.
											'<p>'.$vv['msg'].'</p>'.
											'</td>'.
											'</tr>';
										}
										$msg.='</table>';

										
			
			$save = array('users_id'=>$userid,'abus_id'=>$id,'content'=>$msg);	
			$this->TchatAbu->save($save);
			die();			

					
		}
	   	
	
	}
	

	
	
	
	
	
	
	

	
}
