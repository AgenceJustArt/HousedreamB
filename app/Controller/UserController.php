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
class UserController extends AppController {

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
	public $uses = array('User','Profile','Association','Part');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
 
 	public function captcha($valeur=null){
		
		$valeur = base64_decode($valeur);
		$keyDay = date('d-m:-y');
		$keyDay = str_replace('-','y',$keyDay);
		$keyDay = explode(':',$keyDay);
		$valeur = str_replace($keyDay[0],'',$valeur);
		$valeur = str_replace($keyDay[1],'',$valeur);
		
		$im = @imagecreatefromjpeg('http://www.sympathy-world.fr/img/captcha/'.$valeur.'.jpg');
		
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
	
	public function signup() {
		
		if($this->request->is('post')){
			
			$d = $this->request->data;
			
			$d['User']['id'] = null;
			
			if(!empty($d['User']['pwd'])){
				$mdp = $d['User']['pwd'];
				$d['User']['pwd'] = Security::hash($d['User']['pwd'],null,true);
			}
			
			$valeur = $d['User'];
			
			if($this->User->save($valeur)){
				
					if($d['Newsletter']['value'] ==1){
						$this->loadModel('Newsletter');
						$news = array('mail'=>$d['User']['mail']);
						$this->Newsletter->create();
						$this->Newsletter->save($news);
					}
					
					$link = array('controller'=>'user','action'=>'activate',$this->User->id.'-'.md5($d['User']['pwd']));
					App::uses('CakeEmail','Network/Email');
					$mail = new CakeEmail();
					$mail->from('support@pays-dargonne.fr')
					->to($d['User']['mail'])->subject('Inscription')
					->emailFormat('html')->template('signup')
					->viewVars(array('username'=>$d['User']['mail'],'mdp'=>$mdp,'link'=>$link))
					->send();
					$this->Session->setFlash('Votre demande a bien été prise en compte, une confirmation par mail vous a été envoyé','notif');
					$this->redirect('/');
				
			}
			else{
				
				$this->Session->setFlash("Votre demande n'est pas valide",'notif',array('type'=>'error'));
			}
			
		}
	}
	
	public function forget() {
		
			$email = $this->request->data['User']['mail'];
			
			$syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#'; 
			
			if(isset($email) && preg_match($syntaxe,$email)){
				
				$pwd = $this->User->find('first',array(
					'conditions'=>array('User.mail'=>$email),
					'fields'=>array('pwd','id','pseudo','active')
				));
				
				
				
				if($pwd){
					
					if($pwd['User']['active']==0){
						$this->Session->setFlash('Ce compte n\'est pas actif.','notif',array('type'=>'error'));
					$this->redirect('/');
					}
				
				$id = $pwd['User']['id'];
				$pwd = $pwd['User']['pwd'];
				
				
				$date = date('y').date('m').date('d');
				$link = array('controller'=>'user','action'=>'change',$id.'-'.$date.md5($pwd));
				
					App::uses('CakeEmail','Network/Email');
					$mail = new CakeEmail();
					$mail->from('support@pays-dargonne.fr')
					->to($email)->subject('Demande de réinitialisation')
					->emailFormat('html')->template('reset')
					->viewVars(array('username'=>$user['User']['pseudo'],'link'=>$link))
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

	function account(){
		
		$id = AuthComponent::user('id');
		
		
		$data = $this->User->find('first',array(
			'contain'=>array(
				'Profile'=>array(),
				'Association'=>array(
					'Theme'=>array(),
					'AssoMedia'=>array()
				)
			),
			'conditions'=>array('User.id'=>$id)
		));
		
		$role = $data['User']['role'];
		
		if($this->Session->read('Auth.User.role')!=$role){
			$this->Session->write('Auth.User.role',$role);
		}
		
		$this->set('data',$data);
	}
	
	function profil(){
		
		$id = AuthComponent::user('id');
		if($id){
			if($this->request->is('post') || $this->request->is('put')){
				
				$data = $this->request->data;
			
				$type = $data['Type']['type'];
				
				if($type =='A'){
					if(!isset($data['User']['pwd'])){
						if($data['User']['pwdA']==$data['User']['pwdB'] && !empty($data['User']['pwdA']) && !empty($data['User']['pwdB'])){
							$data['User']['pwd'] = Security::hash($data['User']['pwdA'],null,true);
							
						}
						elseif(empty($data['User']['pwdA']) && empty($data['User']['pwdB'])){
								
						}
						else{
							$this->Session->setFlash('Identifiants incorrrect','notif',array('type'=>'error'));
						}
					
						$this->User->id = $id;
						$success = $this->User->save($data);
					}
					else{
						$this->redirect($this->referer());
					}
					$this->redirect($this->referer());
					
				}
				
				elseif($type =='B'){
					$profile = $this->Profile->find('first',array('conditions'=>array('users_id'=>$id),'fields'=>array('id')));
					$this->Profile->id = $profile['Profile']['id'];
					debug();
					$success = $this->Profile->save($this->request->data);
				
				}
				
				
				
				$this->redirect($this->referer());
				
			}
			else{
				$this->User->id = $id;
				$this->request->data = $this->User->read();
				
			}
		}
		else{
			$this->redirect('/');
		}
		
		
		
	}
	
	function association(){
		
		$id = AuthComponent::user('id');
		if($id){
			if($this->request->is('put') || $this->request->is('post')){
						
						$d = $this->request->data;
						
							$upload = $d['AssoMedia']['url'];
							// Direction du dossier et création
							$dir = IMAGES.'association';
							// Gestion du nom du fichier
							// Sépération des terme au point.
							$f = explode('.',$upload['name']);
							// extention => Récupération du dernier terme du tableau $f
							$ext = '.'.end($f);
							// nom => Génération du nom de l 'image
							$filename = Inflector::slug(strtolower($d['Association']['name']),'');
							// URL a enregistrer
							$d['AssoMedia']['url'] = 'association/'.$filename.$ext;
						
							$slug = Inflector::slug($d['Association']['name'],'-');
							$d['Association']['slug'] = strtolower($slug);
							$d['Association']['users_id'] = $id;
						
					
						if(!empty($upload['tmp_name'])){
							$valeur = array(
								'Association' => $d['Association'],
								'AssoMedia' =>$d['AssoMedia']
							);
						}
						else{
							$valeur = array(
								'Association' => $d['Association']
							);
						}
						
						$success = $this->Association->saveAssociated($valeur, array('deep' => true));
						
						if($success){
							if(!empty($upload['tmp_name'])){
								move_uploaded_file($upload['tmp_name'] , $dir.DS.$filename.$ext);
							}
				
						}
						else{
							$this->Session->setFlash("Format non valide","notif",array('type'=>'error'));
						}
						$this->redirect($this->referer());		
					}
			else{
				
				$this->request->data = $this->Association->find('first',array(
					'conditions'=>array('users_id'=>$id)
				));
				$this->loadModel('Theme');
						$this->loadModel('Theme');
						$this->loadModel('AssoGroup');
						
						$t = $this->Theme->find('all');
						foreach($t as $k=>$v){
							$v = $v['Theme'];
							$theme[$v['id']] = $v['name'].' '.$v['content']; 
						}
						
						$a = $this->AssoGroup->find('all');
						
						foreach($a as $k=>$v){
							$v = $v['AssoGroup'];
							$assogroup[$v['id']] = $v['name'];
						}
						
						
						
						$render = array(
							'theme'=>$theme,
							'assogroup'=>$assogroup,
						);
						$this->set($render);
				
			}
		}
		else{
			$this->redirect('/');
		}
		
		
		
	}

	public function mailbox() {
		
		$this->loadModel('MsgBox');
		$data = $this->MsgBox->find('all');
		debug($data);
		die();
		
	}
	
	function partenaire(){
		
		$id = AuthComponent::user('id');
		if($id){
			if($this->request->is('put') || $this->request->is('post')){
						
						$d = $this->request->data;
						
						
							$upload = $d['PartMedia']['url'];
							// Direction du dossier et création
							$dir = IMAGES.'partenaire';
							// Gestion du nom du fichier
							// Sépération des terme au point.
							$f = explode('.',$upload['name']);
							// extention => Récupération du dernier terme du tableau $f
							$ext = '.'.end($f);
							// nom => Génération du nom de l 'image
							$filename = Inflector::slug(strtolower($d['Part']['title']),'');
							// URL a enregistrer
							$d['PartMedia']['url'] = 'partenaire/'.$filename.$ext;
							$d['PartMedia']['id'] = $d['Part']['id'];
						
							$slug = Inflector::slug($d['Part']['title'],'-');
							$d['Part']['slug'] = strtolower($slug);
							$d['Part']['users_id'] = $id;
						
					
						if(!empty($upload['tmp_name'])){
							$valeur = array(
								'Part' => $d['Part'],
								'PartMedia' =>$d['PartMedia']
							);
						}
						else{
							$valeur = array(
								'Part' => $d['Part']
							);
						}
						
						$success = $this->Part->saveAssociated($valeur, array('deep' => true));
						
						if($success){
							if(!empty($upload['tmp_name'])){
								move_uploaded_file($upload['tmp_name'] , $dir.DS.$filename.$ext);
							}
				
						}
						else{
							$this->Session->setFlash("Format non valide","notif",array('type'=>'error'));
						}
						$this->redirect($this->referer());		
					}
			else{
				
				$this->request->data = $this->Part->find('first',array(
					'conditions'=>array('users_id'=>$id)
				));
				
				
				$this->loadModel('Theme');
						$this->loadModel('PartGroup');
						
						
						$a = $this->PartGroup->find('all');
						
						foreach($a as $k=>$v){
							$v = $v['PartGroup'];
							$partgroup[$v['id']] = $v['name'];
						}
						
						
						
						$render = array(
							
							'partgroup'=>$partgroup,
						);
						$this->set($render);
				
			}
		}
		else{
			$this->redirect('/');
		}
		
		
		
	}
	
	
	
	function basique(){
		
		$id = AuthComponent::user('id');
		if($id){
			
		
		$register = $this->Session->read('Auth.User.register');
		
					
					/*==============================*/
					/* ENREGISTREMENT DE LA DEMANDE */
					/*==============================*/
					
					if($this->request->is('put') || $this->request->is('post')){
						
						$d = $this->request->data;
						
						$sendMail = AuthComponent::user('mail');
						$sendName = $d['Association']['name'];
						
						
							$upload = $d['AssoMedia']['url'];
							// Direction du dossier et création
							$dir = IMAGES.'association';
							// Gestion du nom du fichier
							// Sépération des terme au point.
							$f = explode('.',$upload['name']);
							// extention => Récupération du dernier terme du tableau $f
							$ext = '.'.end($f);
							// nom => Génération du nom de l 'image
							$filename = Inflector::slug(strtolower($d['Association']['name']),'');
							// URL a enregistrer
							$d['AssoMedia']['url'] = 'association/'.$filename.$ext;
						
							$slug = Inflector::slug($d['Association']['name'],'-');
							$d['Association']['slug'] = strtolower($slug);
							$d['Association']['users_id'] = $id;
						
					
						if(!empty($upload['tmp_name'])){
							$valeur = array(
								'Association' => $d['Association'],
								'AssoMedia' =>$d['AssoMedia']
							);
						}
						else{
							$valeur = array(
								'Association' => $d['Association']
							);
						}
						
						$success = $this->Association->saveAssociated($valeur, array('deep' => true));
						
						if($success){
							if(!empty($upload['tmp_name'])){
								move_uploaded_file($upload['tmp_name'] , $dir.DS.$filename.$ext);
							}
							$this->User->id = $id;
							$this->User->saveField('register',1);
							$this->Session->write('Auth.User.register',1);
							
							/* Envoie de la demande par mail */
				
							App::uses('CakeEmail','Network/Email');
								$mail = new CakeEmail();
								$mail->from('admin@pays-dargonne.fr')
								->to('admin@pays-dargonne.fr')->subject('Demande de compte associatif par '.$sendMail.' - '.$sendName)
								->emailFormat('html')->template('basique')
								->viewVars(array('data'=>$d))
								->send();
						}
						else{
							$this->Session->setFlash("Format non valide","notif",array('type'=>'error'));
						}
						$this->redirect($this->referer());		
					}
					
					/*==============================*/
					/* DEMANDE DEJA EFFECTUE */
					/*==============================*/
					elseif($register=='1'){
						$this->set('register',$register);
					}
					
					/*==============================*/
					/* PAGE VIERGE */
					/*==============================*/
					else{
						
						$this->loadModel('Theme');
						$this->loadModel('AssoGroup');
						
						$t = $this->Theme->find('all');
						foreach($t as $k=>$v){
							$v = $v['Theme'];
							$theme[$v['id']] = $v['name'].' '.$v['content']; 
						}
						
						$a = $this->AssoGroup->find('all');
						
						foreach($a as $k=>$v){
							$v = $v['AssoGroup'];
							$assogroup[$v['id']] = $v['name'];
						}
						
						
						
						$render = array(
							'theme'=>$theme,
							'assogroup'=>$assogroup,
							'register'=>$register
						);
						$this->set($render);
					}
		}
		else{
			$this->redirect('/');
			}
		
		
		
	}
	
	function privilege(){
			
		
	}
	
	function adhesionpartenaire(){
		
		$id = AuthComponent::user('id');
		if($id){
			$data = $this->request->data;
			if(!empty($data)){
				$compte = $data['compte'];
				if(Configure::read("Site.prices.".$compte)){
					$custom = "action=subscribe&uid=".$id.'&compte='.$compte;
					$price = number_format(Configure::read('Site.prices.'.$compte),2);
					$name = 'Compte Association '.ucfirst($compte).'.';
					
					$this->loadModel('Transaction');
					$url = $this->Transaction->requestPaypal($price,$name,$custom);
					
					if($url){
						$this->redirect($url);
					}
				}
			}
		}
		else{
			$this->redirect('/');
		}
			
		
	}
	
	
	
	
	function adhesion(){
		
		
		$id = AuthComponent::user('id');
		if($id){
			$data = $this->request->data;
			if(!empty($data)){
				$compte = $data['compte'];
				if(Configure::read("Site.prices.".$compte)){
					$custom = "action=subscribe&uid=".$id.'&compte='.$compte;
					$price = number_format(Configure::read('Site.prices.'.$compte),2);
					$name = 'Compte Association '.ucfirst($compte).'.';
					
					$this->loadModel('Transaction');
					$url = $this->Transaction->requestPaypal($price,$name,$custom);
					
					if($url){
						$this->redirect($url);
					}
				}
			}
		}
		else{
			$this->redirect('/');
		}
		
		
	}
   		
	function login(){
		
		
	   if($this->request->is('post')){
	   		if($this->Auth->login()){
				$this->Session->setFlash('Vous êtes connecté','notif');
				if(AuthComponent::user('role')=='admin'){
					$this->redirect(array('controller'=>'evenement','action'=>'index','admin'=>true));
				}
				else{
					$this->redirect(array('controller'=>'user','action'=>'account'));
				}
			}
			else{

				$this->Session->setFlash('Votre mail et mot de passe ne correspondent pas ou n’existent pas','notif',array('type'=>'error'));
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
			'conditions' => array ('User.id'=>$token[0],'MD5(User.pwd)'=>$token[1],'active'=>0)
		));
		if(!empty($user)){
			$this->User->id = $user['User']['id'];
			$this->User->saveField('active',1);
			$this->Profile->save(array('users_id'=>$user['User']['id']));
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
				'conditions' => array ('User.id'=>$id,'MD5(User.pwd)'=>$token),
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
					$mail->from('support@pays-dargonne.fr')
					->to($user['User']['mail'])->subject('Demande de réinitialisation')
					->emailFormat('html')->template('newpass')
					->viewVars(array('username'=>$user['User']['pseudo'],'mdp'=>$mdp))
					->send();
					
				/* Enregistrement du nouveau mot de passe */
				
				$newpwd = Security::hash($mdp,null,true);
				$this->User->id = $id;
				$this->User->saveField('pwd',$newpwd);
				$this->Session->setFlash("Votre nouveau mot de passe vous a été envoyé par mail","notif");
			}
		}
		else{
			$this->Session->setFlash("Ce lien d'activation n'est plus valide ",'notif',array('type'=>'error'));
		}
		$this->redirect('/');
	}
	
	function editevent($id = null) {
		
		
		
		$time = time();
		$id = AuthComponent::user('id');
		
		$last = $this->Session->read('Auth.User.timeevent');
		
		
		$beetwen = $time-$last;
		
		if($beetwen>86400){
		
			$this->loadModel('EventCategory');
			
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
				
				$d['Event']['online'] = '0';
				$d['Event']['users_id'] = $id;
				
			
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
				
				$this->loadModel('Event');
				$success = $this->Event->saveAssociated($valeur, array('deep' => true));
				
				
				
				if($success){
					if(!empty($upload['tmp_name'])){
						move_uploaded_file($this->request->data['EventMedia']['url']['tmp_name'], $dir.DS.$filename.$ext);
						
						$count = $count['User']['nbevent']+1;
						
						$this->User->id = $id;
						$this->User->saveField('nbevent',$count);
						$this->User->saveField('timeevent',$time);
						$this->Session->write('Auth.User.timeevent',$time);
						
					
					}
					
				}
				else{
					$this->Session->setFlash("Format non valide","notif",array('type'=>'error'));
				}
				$this->redirect($this->referer());		
			}
		
			else{	
				$this->set('timestamp',true);
			}
		}
		else{
			$restant = ($last+86400)-$time;
			
			$minute = $restant%3600;
			$heure = ($restant-$minute)/3600;
			
			$second = $minute%60;
			$minute = ($minute-$second)/60;
			
			
			$restant = $heure.' Heures '.$minute.' Minutes '.$second.' Secondes';
			
			$this->set(
				array(
					'timestamp'=>false,
					'restant'=>$restant
				)
			);
		}
		
    }
	
	function editannonce($id = null) {
		
		
		
		$time = time();
		$id = AuthComponent::user('id');
		
		$last = $this->Session->read('Auth.User.timeannonce');
		
		$beetwen = $time-$last;
		
		if($beetwen>86400){
		
			$this->loadModel('AnnonceGroup');
			
			$cat = $this->AnnonceGroup->find('all');
			$this->set('category',$cat);
			
		
			
			
			if($this->request->is('put') || $this->request->is('post')){
				
				$d = $this->request->data;
				$count = $this->User->find('first',array(
							'conditions'=>array('User.id'=>$id),
							'fields'=>array('nbannonce','Association.id')
				));
				
				$slug = Inflector::slug($d['Annonce']['name'],'-');
				$d['Annonce']['assos_id'] = $count['Association']['id'];
				$d['Annonce']['slug'] = strtolower($slug);
				$d['Annonce']['online'] = '0';
				$d['Annonce']['read'] = '0';


				
			
				
				
					$valeur = array(
						'Annonce' => $d['Annonce']
					);
				
				
				$this->loadModel('Annonce');
				$success = $this->Annonce->save($valeur);
				
				
				
				if($success){
					
						$count = $count['User']['nbannonce']+1;
						
						$this->User->id = $id;
						$this->User->saveField('nbannonce',$count);
						$this->User->saveField('timeannonce',$time);
						
					
						$this->Session->write('Auth.User.timeannonce',$time);
					
					
					
				}
				else{
					$this->Session->setFlash("Format non valide","notif",array('type'=>'error'));
				}
				$this->redirect($this->referer());		
			}
		
			else{	
				$this->set('timestamp',true);
			}
		}
		else{
			$restant = ($last+86400)-$time;
			
			$minute = $restant%3600;
			$heure = ($restant-$minute)/3600;
			
			$second = $minute%60;
			$minute = ($minute-$second)/60;
			
			
			$restant = $heure.' Heures '.$minute.' Minutes '.$second.' Secondes';
			
			$this->set(
				array(
					'timestamp'=>false,
					'restant'=>$restant
				)
			);
		}
		
    }
	
	function editbenevolat($id = null) {
		
		
		
		$time = time();
		$id = AuthComponent::user('id');
		
		$last = $this->Session->read('Auth.User.timebenevolat');
		
		
		$beetwen = $time-$last;
		
		if($beetwen>86400){
		
			$this->loadModel('BenevolatGroup');
			
			$cat = $this->BenevolatGroup->find('all');
			$this->set('category',$cat);
			

			if($this->request->is('put') || $this->request->is('post')){
				
				$d = $this->request->data;
				$count = $this->User->find('first',array(
							'conditions'=>array('User.id'=>$id),
							'fields'=>array('nbbenevolat','Association.id')
				));
				
				$slug = Inflector::slug($d['Benevolat']['title'],'-');
				$d['Benevolat']['assos_id'] = $count['Association']['id'];
				$d['Benevolat']['slug'] = strtolower($slug);
				
				
					$valeur = array(
						'Benevolat' => $d['Benevolat']
					);
				
				
				$this->loadModel('Benevolat');
				
				$success = $this->Benevolat->save($valeur);
				
				
				
				if($success){
					
						$count = $count['User']['nbbenevolat']+1;
						
						
						$this->User->id = $id;
						$this->User->saveField('nbbenevolat',$count);
						$this->User->saveField('timebenevolat',$time);
						
					
						$this->Session->write('Auth.User.timebenevolat',$time);
					
					
					
				}
				else{
					$this->Session->setFlash("Format non valide","notif",array('type'=>'error'));
				}
				$this->redirect($this->referer());		
			}
		
			else{	
				$this->set('timestamp',true);
			}
		}
		else{
			$restant = ($last+86400)-$time;
			
			$minute = $restant%3600;
			$heure = ($restant-$minute)/3600;
			
			$second = $minute%60;
			$minute = ($minute-$second)/60;
			
			
			$restant = $heure.' Heures '.$minute.' Minutes '.$second.' Secondes';
			
			$this->set(
				array(
					'timestamp'=>false,
					'restant'=>$restant
				)
			);
		}
		
    }
	
	function editpost($id = null) {
		
		
		
		$time = time();
		$id = AuthComponent::user('id');
		
		$last = $this->Session->read('Auth.User.timepost');
		
		
		$beetwen = $time-$last;
		
		if($beetwen>86400){
		
			$this->loadModel('PostCategory');
			
			$cat = $this->PostCategory->find('all');
			$this->set('category',$cat);
			
			
			if($this->request->is('put') || $this->request->is('post')){
				
				$d = $this->request->data;
				
				
				
					$upload = $d['PostMedia']['url'];
					// Direction du dossier et création
					$dir = IMAGES.'article';
					// Gestion du nom du fichier
					// Sépération des terme au point.
					$f = explode('.',$upload['name']);
					// extention => Récupération du dernier terme du tableau $f
					$ext = '.'.end($f);
					// nom => Génération du nom de l 'image
					$filename = Inflector::slug(implode('.',array_slice($f,0,-1)),'-');
					$d['PostMedia']['url'] = 'article/'.$filename.$ext;
				
				$slug = Inflector::slug($d['Post']['title'],'-');
				$d['Post']['slug'] = strtolower($slug);
				
				$d['Post']['online'] = '0';
				$d['Post']['users_id'] = $id;
				
			
				if(!empty($upload['tmp_name'])){
					$valeur = array(
						'Post' => $d['Post'],	
						'PostMedia' =>$d['PostMedia']
					);
				}
				else{
					$valeur = array(
						'Post' => $d['Post']
					);
				}
				
				$this->loadModel('Post');
				$success = $this->Post->saveAssociated($valeur, array('deep' => true));
				
				
				
				if($success){
					if(!empty($upload['tmp_name'])){
						move_uploaded_file($this->request->data['PostMedia']['url']['tmp_name'], $dir.DS.$filename.$ext);
						
						$count = $count['User']['nbpost']+1;
						
						$this->User->id = $id;
						$this->User->saveField('nbpost',$count);
						$this->User->saveField('timepost',$time);
						$this->Session->write('Auth.User.timepost',$time);
						
					
					}
					
				}
				else{
					$this->Session->setFlash("Format non valide","notif",array('type'=>'error'));
				}
				$this->redirect($this->referer());		
			}
		
			else{	
				$this->set('timestamp',true);
			}
		}
		else{
			$restant = ($last+86400)-$time;
			
			$minute = $restant%3600;
			$heure = ($restant-$minute)/3600;
			
			$second = $minute%60;
			$minute = ($minute-$second)/60;
			
			
			$restant = $heure.' Heures '.$minute.' Minutes '.$second.' Secondes';
			
			$this->set(
				array(
					'timestamp'=>false,
					'restant'=>$restant
				)
			);
		}
		
    }
	
		/**
	* ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN *
	* ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN ** ADMIN *
	**/
    //////////////////////////////////////////////////////////////////////////////////////////////-> *INDEX*
    function admin_index() {
		
        $this->paginate = array('User' => array(
			'recursive'=>-1,
            'limit' => 10,
			'conditions' => array('active' => '1'),
        ));
        $d = $this->Paginate('User');
		$this->set('data',$d);
		
		
    }
	
	
	function admin_register() {
		
		
		
        $d = $this->User->find('all',array(
			'contain'=>array(
				'Profile'=>array(),
				'Association'=>array(),
			),
			'conditions'=>array(
				'User.register'=>1, 
				'User.role'=>'membre',
				'Association.online'=>0
			)
		));
		$this->set('data',$d);
		
		
    }
	
	function admin_validregister($id){
		
		if($id){
			$this->User->id = $id;
			$this->User->saveField('role','basique');
			$data = $this->User->find('first',array(
				'fields'=>array('mail'),
				'recursive'=>-1,
				'conditions'=>array('id'=>$id)
			));
			$adressmail = $data['User']['mail'];
			
			$id = $this->Association->find('first',array(
				'recursive'=>-1,
				'conditions'=>array(
					'users_id'=>$id
				)
			));
			$id = $id['Association']['id'];
			
			$this->Association->id = $id;
			$this->Association->saveField('online','1');
			
			/* Envoie du mot de passe par mail */
			
		
				
				App::uses('CakeEmail','Network/Email');
					$mail = new CakeEmail();
					$mail->from('admin@pays-dargonne.fr')
					->to($adressmail)->subject('Confirmation du compte associatif')
					->emailFormat('html')->template('newbasique')
					->viewVars(array('valid'=>1))
					->send();
		}
		else{
			$this->redirect('/');
		}
		$this->redirect($this->referer());
		
	}
	
	function admin_notvalidregister($id){
		
		if($id){
			$this->User->id = $id;
			$this->User->saveField('register','0');
			
			$data = $this->User->find('first',array(
				'fields'=>array('mail'),
				'recursive'=>-1,
				'conditions'=>array('id'=>$id)
			));
			$adressmail = $data['User']['mail'];
			
			$id = $this->Association->find('first',array(
				'recursive'=>-1,
				'conditions'=>array(
					'users_id'=>$id
				)
			));
			$id = $id['Association']['id'];
			
			$this->Association->delete($id);
			
			/* Envoie du mot de passe par mail */
				
				App::uses('CakeEmail','Network/Email');
					$mail = new CakeEmail();
					$mail->from('admin@pays-dargonne.fr')
					->to($adressmail)->subject('Refus du compte associatif')
					->emailFormat('html')->template('newbasique')
					->viewVars(array('valid'=>0))
					->send();
		}
		else{
			$this->redirect('/');
		}
		$this->redirect($this->referer());
		
	}
	
	//////////////////////////////////////////////////////////////////////////////////////////////-> *DELETE*
    function admin_delete($id) {
		
    	$this->Session->setFlash('La page a bien ete supprimer','notif');
    	$this->User->delete($id,true);
    	$this->redirect($this->referer());
    }
	
	
}
