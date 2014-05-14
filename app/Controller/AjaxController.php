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
class AjaxController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Ajax';

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
	public $uses = array('User','TchatMessage','TchatRoom','Adherent','TchatConnected','Message','RoomMessage','Msg');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */

	public function connected(){
		$id = AuthComponent::user('id_adherent');
		$time = time()-15;
		//$d['result'] = '';
		$this->loadModel('User');
		$this->User->updateAll(array('time'=>time()),array('id'=>$id));
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



	public function actionMessage(){


		$user = AuthComponent::user();

		if(isset($user['Dialog'])){
			$dialog = $user['Dialog'];
		}else{
			$dialog = false;
		}
		
		if(isset($user['Room'])){
			$room = $user['Room'];
		}else{
			$room = false;
		}
		$userpseudo = $user['pseudo'];
		$usermedia = $user['media'];
		$userid = $user['id'];
		
		if(isset($userid)){

			if($this->RequestHandler->isAjax()){
				if($this->request->is('post') || $this->request->is('put')){
					$data = $this->request->data;

					if($data['action']=='addMessage'){

						$correspondant_id = $data['dialog'];

						// Récupération du tchat entre les deux membres.
						if($userid>$correspondant_id){
							$fichier = 'tchat'.$userid.'-'.$correspondant_id.'.json';
						}else{
							$fichier = 'tchat'.$correspondant_id.'-'.$userid.'.json';
						}
						$date = explode('-',date('Y-m'));
						$year = $date['0'];
						$month = $date['1'];
						$fichier = 'files/tchat'.DS.$year.DS.$month.DS.$fichier;

						$save['users_id'] = $userid;
						$save['created'] = time();
						$save['day'] = date('Y-m-d',time());
						$save['hour'] = date('H:i');
						$save['msg'] = $data['message'];

						if(!empty($save['msg'])){

							$search = array(":)", ";)", ">:(","B|",":P",":/","-_-",":o",":'(","o.O",":(");
							$replace = array("smile","clin","xsmile","glasses","lang","badsmile","tired","mygod","cry","oops","sad");
							foreach ($replace as $k=>$v) {
								$replace[$k] = '<span class="emoicone '.$v.'"></span>';
							}

							$save['msg'] = str_replace($search,$replace,$save['msg']);

							$dialog = json_decode(file_get_contents($fichier),true);
							$dialog['Msg'][] = $save;
							$dialog['Msg'] = array_slice($dialog['Msg'],-10);
							$dialog['Send'][$userid] = time();
							$dialog = json_encode($dialog);

							file_put_contents($fichier, $dialog);

							$user['Dialog'][$correspondant_id]['last_message'] = time();
							$this->Session->write('Auth.User',$user);
						}




						
						
						//$this->TchatMessage->save($data);

						//$this->TchatRoom->updateAll(array('last_message_creator'=>time()),array('id'=>$dialog_id,'creator_id'=>$userid));
						//$this->TchatRoom->updateAll(array('last_message_correspondant'=>time()),array('id'=>$dialog_id,'correspondant_id'=>$userid));

						$d['erreur'] = 'ok';
						echo json_encode($d);
						die();
					}
					elseif($data['action']=='addRoom'){
						$room = $data['room'];
						$room = 'files/room/'.$room.'.json';
						$save['name'] = $userpseudo;
						$save['thumbs'] = $usermedia;
						$save['users_id'] = $userid;
						$save['msg'] = $data['message'];
						$save['created'] = time();
						$save['day'] = date('Y-m-d',time());
						$save['hour'] = date('H:i');
						if(!empty($save['msg'])){

							$dialog = json_decode(file_get_contents($room),true);
							$dialog[] = $save;
							$dialog = array_slice($dialog,-10);
							$dialog = json_encode($dialog);

							file_put_contents($room, $dialog);

							//$user['Dialog'][$correspondant_id]['last_message'] = time();
							//$this->Session->write('Auth.User',$user);
						}
						
					
						$d['erreur'] = 'ok';
						echo json_encode($d);
						die();

					}
					elseif($data['action']=='getMessage'){
						$time = time();
							$day = date('Y-m-d');

						if(isset($data['active'])){
							$active = explode('-',$data['active']);
							$active = end($active);
							
						}else{
							$active = 0;
						}
						

						$d['msg'] = array();
						$alert = array();
						if($dialog){
							$test = array();
							if(isset($data['dialog']) && is_array($data['dialog'])){
								foreach($data['dialog'] as $k=>$v){ 
									$v = explode('-',$v);
									$v = end($v);
								   $test[$v] = true;
								}
							}
							$adherent = AuthComponent::user('Adherent');
							// Parcours des dialogue en cours
							
							foreach ($dialog as $k => $v) {

								$id = $v['users_id'];
								if($test[$id]){

									$update[] = $id;
									// Récupération des messages du dialogue courant

									$getMEssage[$id] = json_decode(file_get_contents($v['dialog_current']),true);
									
									if($id!=$active){
										//$user['Dialog'][$active]['last_message'] = time();
										//$this->Session->write('Auth.User',$user);	
									}
									elseif($user['Read']<$getMEssage[$id]['Send'][$id]){
										$alert[$id] = $id;
									}
									/*
									elseif($user['Read']<filemtime($v['dialog_current'])){
										$alert[$id] = $id;
									}*/

									// Initailisation du message
									$msg[$id] = '';
									// Récupération du message s'il existe
									if($getMEssage[$id]){
										// Récupération des messages du dialogue trouvé
										
										foreach($getMEssage[$id]['Msg'] as $kk=>$vv){ 
										  
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
										   $msg[$id].= '<tr>'.
											'<td class="thumbs"><img src="/'.IMAGES_URL.$adherent[$vv['users_id']]['media'].'" width="32" height="32"></td>'.
											'<td><div class="head"><b>'.$adherent[$vv['users_id']]['pseudo'].'</b><em>'.$created.'</em></div>'.
											'<p>'.$vv['msg'].'</p>'.
											'</td>'.
											'</tr>';
										}
										
									}else{
										$msg[$id] = '';
									}
								}
							}
							$user['Read'] = time();
							$this->Session->write('Auth.User',$user);	
							$d['alert'] = $alert;
							$d['msg'] = $msg;
							//$this->TchatRoom->updateAll(array('activite_creator'=>time()),array('id'=>$update,'creator_id'=>$userid));
							//$this->TchatRoom->updateAll(array('activite_correspondant'=>time()),array('id'=>$update,'correspondant_id'=>$userid));
							//$this->Session->write('Auth.User.Dialog',$dialog);
						}
						
						
						
						// Récupération des messages Salon en cours 

						$d['room'] = array();
						
						if($room && isset($data['room'])){
							$data['room'] =  explode('-',$data['room']);
							$data['room'] =  end($data['room']);
							if($room['id']==$data['room']){
								$this->loadModel('User');
								$this->User->updateAll(array('User.last_room'=>time(),'User.room_id'=>$room['id']),array('User.id'=>$userid));
								$fichier = 'files/room/'.$room['id'].'.json';
								$roomData = json_decode(file_get_contents($fichier),true);
								
							}
							if($room){

								$msg = '';
								foreach($roomData as $k=>$v){
									$media = explode('.',$v['thumbs']);
									$media = $media[0].'_s.'.$media[1];
									if($day==$v['day']){
												$created = $v['hour'];
											}else{
												$created = $time-$v['created'];
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
									'<td class="thumbs"><img src="/'.IMAGES_URL.$media.'" width="40"></td>'.
									'<td><div class="head"><b>'.$v['name'].'</b><em>'.$created.'</em></div>'.
									'<p>'.$v['msg'].'</p>'.
									'</td>'.
									'</tr>';
								}
								
								

								$d['room'] = $msg;
							}
							
						}
						

						$d['erreur'] = 'ok';
						echo json_encode($d);
						die();

					}
					
					

				}
			}
		}
	}

	public function getMemberConnect(){
		$user = AuthComponent::user();
		$userid = $user['id'];
		if(isset($user)){
			$ajax =true;

			if($this->RequestHandler->isAjax() || $ajax){

				//$now = date('Y-m-d H:i:s',time());
				$second = date('s',time()); 
				if($second<30){
					$this->User->updateAll(array('User.last_action'=>time()),array('User.id'=>$userid));
				}
				$time = time()-60;
				//$time = date('Y-m-d H:i:s',$time);
				
				$UserConnect = Cache::read('user.connect','light');
				$UserConnect = false;
				$adherent = $_POST['adherent'];
				$tchat = array();
				if(isset($_POST['tchat'])){
					foreach($_POST['tchat'] as $k=>$v){
						$v = str_replace('tabs-','',$v);
						$tchat[] = $v;
					}
				}	
				
				//$adherent = array(300,373,383);
			
				//$tchat = array(102,555);
			
				$merge = array_merge($adherent, $tchat);
				$merge = array_unique($merge);
				//$merge = array_flip($merge);
		

				if(!$UserConnect){
					$UserConnect = $this->User->find('list',array(
						'conditions'=>array(
							'User.last_action >'=>$time
						),
						'fields'=>array('id'),
						'recursive'=>-1
					));
					Cache::write('user.connect', $UserConnect,'light');
				}

				$connect = array_intersect($merge, $UserConnect);
				$adherent = array_intersect($adherent, $connect);
				$tchat = array_intersect($tchat, $connect);
				//$connect = array_flip($connected);
				

				$d['active'] = array();
				$d['tchat'] = array();
				foreach($adherent as $k=>$v){
					$d['active'][$v] = true;
				}
				foreach($tchat as $k=>$v){
					$d['tchat'][$v] = true;
				}
				

				$d['erreur'] = 'ok';

				
			}else{
				$d['erreur'] = false;
			}
		
		}else{
			$d['erreur'] = false;
		}
		echo json_encode($d);
		die();
	}


	public function updateConnect(){
		$user = AuthComponent::user();
		$userid = $user['id'];

		if(isset($user)){
			
			if($this->RequestHandler->isAjax()){

				$second = date('s',time()); 
				if($second<30){
					$this->User->updateAll(array('User.last_action'=>time()),array('User.id'=>$userid));
				}				
			}else{
				$d['erreur'] = false;
			}
		
		}
		die();
	}

	public function getNewEvent() {
		
		
		$user = AuthComponent::user();
		
		
		if(isset($user)){
			$ajax = true;
			if($this->RequestHandler->isAjax() || $ajax){

				// récupération des tchat non lus.
				/*
				<img src="/'.IMAGES_URL.$adherent[$correspondant_id]['media'].'" width="32">
				
				*/
				$ask = 'files/tchat/ask'.DS.$user['id'].'.json';
				$result = array();
				// Création de la demande
				if(file_exists($ask)){
					$result = json_decode(file_get_contents($ask),true);
					unlink($ask);
				}
				//$result[11] = array('id'=>'11','media'=>'profil/wuwuw51-102.jpg','pseudo'=>'chouchou','sexe'=>'femme');
				//$result[12] = array('id'=>'11','media'=>'profil/wuwuw51-102.jpg','pseudo'=>'ROBERT','sexe'=>'homme');
				foreach($result as $k=>$v){
					$media = str_replace('.','_s.',$v['media']);
					$result[$k] = '<div class="notifNewTchat"><table><tr><td><img src="/'.IMAGES_URL.$media.'" width="40" height="40"></td><td><h2 class="'.$v['sexe'].'">'.$v['pseudo'].'</h2> souhaite discuter avec vous.</td></tr></table></div>';
				}

				$mail = $this->Msg->find('count',array(
						'conditions'  => array('users_id'=>$user['id'],'send'=>1,'user_delete'=>0,'trash'=>0,'read'=>0)
					)
				);

				$count = count($result);

				$d['mail'] = $mail;
				$d['count'] = $count;
				$d['result'] = $result;
				$d['erreur'] = 'ok';
				echo json_encode($d);
				die();
					
			}
		
		}
		
		die();


	}
}
