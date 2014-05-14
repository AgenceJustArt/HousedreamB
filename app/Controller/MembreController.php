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
class MembreController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Membre';

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
	public $uses = array('User','TchatRoom','TchatMessage','Favori');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */

	public $components = array('Img','RequestHandler');

	
	public function search($paginate,$get){

		/*
		$conditions = array('categorys_id','online');
		foreach($conditions as $k=>$v){
			if(isset($_GET[$v])){ $rules['conditions']['Product.'.$v] = $_GET[$v];}
		}
		*/
					
		$like = array('pseudo','situation');
		foreach($like as $k=>$v){
			if(isset($_GET[$v])){ $paginate['conditions'][$v.' LIKE'] = '%'.$_GET[$v].'%';}
		}
		
		if(isset($_GET['sexe'])){
			if($_GET['sexe']=='M' || $_GET['sexe']=='F'){
				$sex = array('M'=>'homme','F'=>'femme');
				$paginate['conditions']['sexe'] = $sex[$_GET['sexe']];
			}
			
		}

		if(isset($_GET['born'])){
			if(!empty($_GET['born'])){
				$born = explode('-',$_GET['born']);
				$today = explode('-',date('Y-m-d'));
				
				$bornData[] = $today[0]-$born[1].'-'.$today[1].'-'.$today[2];
				$bornData[] = $today[0]-$born[0].'-'.$today[1].'-'.$today[2];
				
			
				$paginate['conditions']['OR']['born BETWEEN ? AND ?'] = $bornData;
				$paginate['conditions']['OR']['born'] = '0000-00-00';
			}
			
		}
					
		if(isset($_GET['connected'])){
			if($_GET['connected']==1){
				$time = time()-60;
				$paginate['conditions']['last_action >'] = $time;
			}
		}
		
		if(isset($_GET['category'])){
			if($_GET['category']!=0){
				$_GET['category'] = '-'.$_GET['category'].'-';
				$paginate['conditions']['category_tag LIKE']= '%'.$_GET['category'].'%';
			}
		}
		
		
		return $paginate;
	}
	
		
	
	
	public function index(){
		
		$user = AuthComponent::user();
			
		if(isset($user['id'])){		
			$paginate = array(
				'conditions'=>array('NOT'=>array('User.id'=>$user['id'])),
				'order'=>array('User.last_action'=>'DESC'),
				'fields'=>array('User.id','User.pseudo','User.last_action','User.sexe','User.media','User.situation','User.likeme_rate','User.category_tag'),
				'limit'=>20,
				'recursive'=>-1
			);
			if(isset($_GET['action'])){
				if($_GET['action']=='search'){
					$paginate = $this->search($paginate,$_GET);

				}
			}		  	
			$this->paginate = $paginate;
			$membre = $this->paginate('User');
			$set = array('data'=>$membre);
			$this->set($set);
		}else{
			$this->redirect('/');
		}
	}

	public function favorite(){
		$user = AuthComponent::user();
		if($user){	
			$paginate = array(
				'limit'=>20,
				'recursive'=>1,
				'conditions'=>array('users_id'=>$user['id'])
			);
			$this->paginate = $paginate;
			$favorite = $this->paginate('Favori');
			$set = array('data'=>$favorite);
			$this->set($set);
		}else{
			$this->redirect('/');
		}
	}


	public function add($id){
		
		
		$user = AuthComponent::user();

		$d['erreur'] = 'ok';
		$d['clean'] = '';
		
		if($user['id']!=$id){
			
		
			if(isset($user['Dialog'])){
				foreach($user['Dialog'] as $k=>$v){
					if($v['users_id']==$id){
						$d['erreur'] = 'exist';
						echo json_encode($d);
						die();
					}
				}
			}else{
				$d['clean'] = 'ok';
			}
		
			
			// Récupération des informations du correspondant //// $correspondant ////
			$correspondant_id = $id;
			$correspondant = $this->User->find('first',array(
				'conditions'=>array('id'=>$correspondant_id),
				'fields'=>array('pseudo','media','sexe'),
				'recursive'=>-1
			));
	
			// Récupération de l'image de profil du correspondant //// $media ////
			$sexe = $correspondant['User']['sexe'];
			$media = explode('.',$correspondant['User']['media']);
			$media = $media[0].'_s.'.$media[1];
			
			$correspondant = $correspondant['User']['pseudo'];
	
				// Récupération du tchat entre les deux membres.
				if($user['id']>$correspondant_id){
					$fichier = 'tchat'.$user['id'].'-'.$correspondant_id.'.json';
				}else{
					$fichier = 'tchat'.$correspondant_id.'-'.$user['id'].'.json';
				}
				$date = explode('-',date('Y-m'));
				$year = $date['0'];
				$month = $date['1'];
				$fichier = 'files/tchat'.DS.$year.DS.$month.DS.$fichier;

				// Si le dialogue existe on récupére les messages
				if(file_exists($fichier)){
					$dialog = json_decode(file_get_contents($fichier),true);
				}else{
					// Si le dialogue n'existe pas
					//On ouvre le fichier. Si il n'existe pas il sera créé automatiquement 
					$fichier_a_ouvrir = fopen ($fichier, "a+"); 
					$dialog = array('Msg'=>array(),'Send'=>array($user['id']=>time(),$correspondant_id=>time()));
					$save = json_encode($dialog);
					file_put_contents($fichier, $save);
					fclose ($fichier_a_ouvrir);
				}

				$ask = 'files/tchat/ask'.DS.$correspondant_id.'.json';
				// Création de la demande
				if(file_exists($ask)){
					$dataAsk = json_decode(file_get_contents($ask),true);
					$dataAsk[$user['id']] = array($user['id'],$user['media'],$user['pseudo']);
					$dataAsk = json_encode($dataAsk);
					file_put_contents($ask, $dataAsk);
				}else{
					//On ouvre le fichier. Si il n'existe pas il sera créé automatiquement 
					fopen ($ask, "a+"); 
					$dataAsk = array();
					$dataAsk[$user['id']] = array('id'=>$user['id'],'media'=>$user['media'],'pseudo'=>$user['pseudo'],'sexe'=>$user['sexe']);
					$dataAsk = json_encode($dataAsk); 
					file_put_contents($ask, $dataAsk);
				}
			

			// Enregistrement du dialog en SESSION //// $new ////
			
			$new = array('users_id'=>$correspondant_id,'dialog_current'=>$fichier,'last_message'=>time(),'pseudo'=>ucfirst($correspondant));
			$adherent = array('pseudo'=>ucfirst($correspondant),'media'=>$media,'sexe'=>$sexe);
			$user['Dialog'][$correspondant_id] = $new;
			$user['Adherent'][$correspondant_id] = $adherent;
			$adherent = $user['Adherent'];
			$this->Session->write('Auth.User',$user);
			
	
			//$this->Session->write('Auth.User.Dialog',$user['Dialog']);
			//$this->Session->write('Auth.User.Adherent',$user['Adherent']);
			$time = time();
			$day = date('Y-m-d');
			
			$msg = '<div class="window" id="dialog-'.$id.'"><div class="content"><table>';
			if(isset($dialog) && is_array($dialog)){
				foreach($dialog['Msg'] as $k=>$v){
					//$id = $v['users_id'];
					
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
					'<td class="thumbs"><img src="/'.IMAGES_URL.$adherent[$v['users_id']]['media'].'" width="32"></td>'.
					'<td><div class="head"><b>'.$adherent[$v['users_id']]['pseudo'].'</b><em>'.$created.'</em></div>'.
					'<p>'.$v['msg'].'</p>'.
					'</td>'.
					'</tr>';
				}
			}
			$stremoicone='<div class="emoicone-block">';
			$emoicone = array(
				array('class'=>'smile','title'=>":)"),
				array('class'=>'clin','title'=>";)"),
				array('class'=>'xsmile','title'=>">:("),
				array('class'=>'glasses','title'=>"B|"),
				array('class'=>'lang','title'=>":P"),
				array('class'=>'badsmile','title'=>":/"),
				array('class'=>'tired','title'=>"-_-"),
				array('class'=>'mygod','title'=>":o"),
				array('class'=>'cry','title'=>":\'("),
				array('class'=>'oops','title'=>"o.O"),
				array('class'=>'sad','title'=>":(")
			);
			foreach($emoicone as $k=>$v){
				$stremoicone.='<span class="emoicone '.$v['class'].'" title="'.$v['title'].'"></span>';
			}
			$stremoicone.='</div>';

			$abus = '<div id="abusMsg"><div class="action"><div class="button">Signaler un abus</div><div class="ask">Voulez-vous vraiment signaler ce membre ?<br><span id="'.$id.'" class="alert">Oui</span> | <span class="cancel">Non</span></div></div></div>';
			
			$msg.= '</table></div><div id="text-send"><div class="input textarea"><textarea name="data['.$id.']" id="'.$id.'"></textarea></div>'.$abus.$stremoicone.'<a href="#" id="'.$id.'" class="send">Envoyer</a></div></div>';
		
			
			$d['dialog'] = $msg;
			$d['dialogMenu'] = '<li><a id="tabs-'.$id.'" href="#dialog-'.$id.'"><img src="/'.IMAGES_URL.$adherent[$correspondant_id]['media'].'" width="32"> <h2 class="'.$sexe.'">'.$adherent[$correspondant_id]['pseudo'].'</h2></a></li>';
			
		}else{
			$d['erreur'] = 'like';
		}

		echo json_encode($d);
		die();
	}



	public function connected(){

		
		$time = time()-300;
		$time = date('Y-m-d H:i:s',$time);
				
		$this->paginate = array(
			'conditions'=>array('actif_adherent'=>1,'sessionActive_adherent'=>true,'lastAction_adherent >'=>$time),
			'order'=>array('lastAction_adherent'=>'desc'),
			'limit'=>30
		);
		$data = $this->paginate('Adherent');
		
		$this->set('data',$data);
	}

	


	private function changeRoom($id){
		
		$id = explode('-',$id);
		$id = $id[1];
		$user = AuthComponent::user();
		$this->loadModel('RoomMessage');
		$dialog = $this->RoomMessage->find('all',array(
			'conditions'=>array('categorys_id'=>$id),
			'limit'=>15,
			'order'=>array('id'=>'DESC')
		));
		$dialog = array_reverse($dialog);
		
		//$msg = '<div class="window-active" id="room-'.$id.'"><div class="content"><table>';
		
		//if($dialog){
			//$lastId = end($dialog);
			//$lastId = $lastId['RoomMessage']['id'];
				$msg = $dialog;	
				/*
				foreach($dialog as $k=>$v){
					$media = explode('.',$v['RoomMessage']['thumbs']);
					$media = $media[0].'_s.'.$media[1];
					$msg.= '<tr>'.
					'<td class="thumbs"><img src="'.IMAGES_URL.$media.'" width="40"></td>'.
					'<td><div class="head"><b>'.$v['RoomMessage']['name'].'</b><em>'.$v['RoomMessage']['created'].'</em></div>'.
					'<p>'.$v['RoomMessage']['content'].'</p>'.
					'</td>'.
					'</tr>';
				}*/
			
		//}else{
		//	$lastId = 0;
		//}
		//$msg.= '</table></div><div id="text-send"><div class="input textarea"><textarea name="data['.$id.']" id="'.$id.'"></textarea></div><a href="#" id="'.$id.'" class="send">Envoyer</a></div></div>';
		
		$room['msg'] = $msg;
		$room['id'] = $id;
		
		
		return $room;
	}
	

}


?>
