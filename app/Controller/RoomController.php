<?php
class RoomController extends AppController {
	
	public $uses = array('User','RoomMessage');
	public $components = array('Img','RequestHandler');
	
	
		
	public function super(){

			if($this->RequestHandler->isAjax()){
				if($this->request->is('post') || $this->request->is('put')){

					$data = $this->request->data;
					$user = AuthComponent::user();

					if($data['action']=='addMessage'){
						$dialog_id = $data['dialog'];

						$data['user_id'] = $user['id'];
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
	}
		
	public function connect(){
		$RoomConnect = Cache::read('room.connect','short');
		//$RoomConnect = null;
		//$count = null;
	        if (!$RoomConnect) {
	        	$time  = time()-60;
	        	$this->loadModel('User');	
	        	$data = $this->User->find('all',array(
	        		'conditions'=>array('User.last_room >'=>$time),
	        		'recursive'=>-1,
	        		'fields' => array('User.room_id','User.id','User.pseudo')
	        	));
	        	
	        	$count = array();
	        	$people = array();
	        	foreach ($data as $k => $v) {
	        		$v =  current($v);
	        		if(array_key_exists($v['room_id'], $count)){
	        			$count[$v['room_id']]++; 
	        		}else{
	        			$count[$v['room_id']] = 1;
	        		}
	        		$people[$v['room_id']][] = array('pseudo'=>$v['pseudo'],'id'=>$v['id']);
	        		
	        	}
	        	$RoomConnect = array(
					'count'=>$count,
					'people'=>$people
				);
				
	        	
	            Cache::write('room.connect', $RoomConnect,'short');
	        }
	        $roomId = $this->Session->read('Auth.User.Room.id');
	        
	        $people = '<ul>';
	        if(isset($RoomConnect['people'][$roomId])){
		        foreach($RoomConnect['people'][$roomId] as $k=>$v){
		        	$people.= '<li><a href="#" id="'.$v['id'].'" class="tchat-member-salon">'.$v['pseudo'].'</a></li>';
				}
	        }
	        
	        $people.= '</ul>';
	        
	        
	        $d['erreur'] = 'ok';
	        $d['count'] = $RoomConnect['count'];
	        $d['people'] = $people;
	        
	        echo json_encode($d);
	        die();
	}


	public function change($id){
		
		$id = explode('-',$id);
		$id = $id[1];
		$user = AuthComponent::user();
		$time = time();
			$day = date('Y-m-d');
		$d['erreur'] = 'ok';
		$room = 'files/room/'.$id.'.json';

		// Ouverture d'un salon
				if(file_exists($room)){
					$dataRoom = json_decode(file_get_contents($room),true);
				}else{
					//On ouvre le fichier. Si il n'existe pas il sera créé automatiquement 
					$room = fopen ($room, "a+"); 
					fclose ($room);
				}

		$msg = '<div class="window-active" id="room-'.$id.'"><div class="content"><table>';
		
		if(isset($dataRoom)){
				foreach($dataRoom as $k=>$v){
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
					$media = explode('.',$v['thumbs']);
					$media = $media[0].'_s.'.$media[1];
					$msg.= '<tr>'.
					'<td class="thumbs"><img src="/'.IMAGES_URL.$media.'" width="40"></td>'.
					'<td><div class="head"><b>'.$v['name'].'</b><em>'.$created.'</em></div>'.
					'<p>'.$v['msg'].'</p>'.
					'</td>'.
					'</tr>';
				}
			
		}
		$msg.= '</table></div><div id="text-send"><div class="input textarea"><textarea name="data['.$id.']" id="'.$id.'"></textarea></div><a href="#" id="'.$id.'" class="send">Envoyer</a></div></div>';
		
		$d['room'] = $msg;
		$room = array('id'=>$id);
		$this->Session->write('Auth.User.Room',$room);
		
		
		echo json_encode($d);
		die();
	}



	
	

}

?>
