<?php
class MsgboxController extends AppController {
	
	public $uses = array('User','Msg','MsgFile');
	public $components = array('Img','RequestHandler');
	private $limit = 10;
	
		
		
	public function particulier_index(){
		
		$connect = AuthComponent::user();
		//$connect = true;
		if($connect){
				
			$paginate = array(
				'conditions'  => array('Msg.users_id'=>$connect['id'],'Msg.send'=>1,'Msg.user_delete'=>0,'Msg.trash'=>0,'Msg.msg_archives_id'=>0),
				'order' => array('Msg.created'=>'desc'),
				'fields'=>array('id','sender_id','sender_name','subject','content','created','read'),
				'limit'=>$this->limit
			);
		
						  	
			$this->paginate = $paginate;
			$mailbox = $this->paginate('Msg');
			
			$set = array('mailbox'=>$mailbox);
			//debug($set);
			$this->set($set);

			
		}else{
			$this->redirect('/');
		}
	}

	public function particulier_archive($id){

		$connect = AuthComponent::user();
		if($connect){
			
			$paginate = array(
				'conditions'  => array('Msg.users_id'=>$connect['id'],'Msg.send'=>1,'Msg.user_delete'=>0,'Msg.trash'=>0,'Msg.msg_archives_id'=>$id),
				'order' => array('Msg.created'=>'DESC'),
				'limit'=>$this->limit
			);
				
			$this->paginate = $paginate;
			$mailbox = $this->paginate('Msg');

			$set = array('mailbox'=>$mailbox);
			$this->set($set);

			
		}else{
			$this->redirect('/');
		}
	}

	public function particulier_deletearchive($id){

		$connect = AuthComponent::user();
		if($connect){
			$this->loadModel('MsgArchive');
			$this->MsgArchive->id = $id;
			$this->MsgArchive->delete();
			$this->Session->setFlash('L\'archive a bien été supprimé','notif');
			$this->redirect(array('controller'=>'msgbox','action'=>'index'));

			
		}else{
			$this->redirect('/');
		}
	}


	public function particulier_addarchive(){
		$connect = AuthComponent::user();
		if($connect){
			if($this->RequestHandler->isAjax()){
				$this->set(array('ajax'=>true));
			}elseif($this->request->is('post') || $this->request->is('put')){
				$name = $this->request->data['Archive']['name'];
				$data = array('title'=>$name,'users_id'=>$connect['id']);
				$this->loadModel('MsgArchive');
				$this->MsgArchive->save($data);
				$this->Session->setFlash('L\'archive "'.ucfirst($name).'" a bien été ajouté','notif');
				$this->redirect(array('controller'=>'msgbox','action'=>'index'));
			}else{
				die();
			}
			
		}else{
			$this->redirect('/');
		}
	}

	public function particulier_read($id){
		
				$connect = AuthComponent::user();
		if($connect){
			
			
				
				$mail = $this->Msg->find('first',array(
						'conditions'  => array('OR'=>array('users_id'=>$connect['id'],'sender_id'=>$connect['id']),'id'=>$id,'send'=>1,'user_delete'=>0,'trash'=>0)
					)
				);

				if($mail){
					
					if($mail['Msg']['read']==0){
						$this->Msg->updateAll(array('read'=>1),array('Msg.id'=>$id,'Msg.users_id'=>$connect['id']));
					}

					
					$set = array('mail'=>$mail,'sender'=>$connect);
					//debug($set);
					$this->set($set);
				}else{
					$this->Session->setFlash('Ce message n\'existe pas','notif');
					$this->redirect(array('action'=>'index'));
					die();
				}
				

				

			
		}else{
			$this->redirect('/');
		}
	}

	public function particulier_send($id=null){

		$connect = AuthComponent::user();
		if($connect){
			$ajax = false;
			
			if($this->RequestHandler->isAjax() && $id){
				$ajax = true;
				$this->User->id = $id;
				$this->User->recursive = -1;
				$user = $this->User->read();
				$set = array('user'=>current($user),'sender'=>$connect,'ajax'=>$ajax);
				$this->set($set);

			}elseif($this->request->is('post') || $this->request->is('put')){
				
				$data = $this->request->data;
				$user = $this->User->find('first',array(
					'conditions'=>array('User.id'=>$data['Msg']['users_id']),
					'recursive'=>-1,
					'fields'=>array('mail','pseudo')
				));
				$email = $user['User']['mail'];
				$pseudo = $user['User']['pseudo'];
				$sender = $connect['pseudo'];
				
				$data = current($data);
				$data['send'] = 1;
				$etatFile = false;
				if(!empty($data['files']) && $data['files']['error']==0 && is_array($data['files'])){
					$path = $data['files']['tmp_name'];
					$file = explode('.',$data['files']['name']);
					$size = $data['files']['size'];
					$name = $file[0];
					$ext = $file[1];
					$dossier = 'msg';
					$upload = move_uploaded_file($path,WWW_ROOT.'files/'.$dossier.DS.$name.'.'.$ext);
					$etatFile = true;	
				}
				$success = $this->Msg->save($data);
				if($etatFile){
					$id = $this->Msg->id;
					$this->MsgFile->save(array('msgs_id'=>$id,'url'=>$dossier.DS.$name.'.'.$ext,'ext'=>$ext,'size'=>$size));
				}
				if($success){
					// Envoie de la notification par mail
							App::uses('CakeEmail','Network/Email');
							$mail = new CakeEmail();
							$mail->from('support@sympathy-world.fr')
							->to($email)
							->subject('Vous avez reçu un message')
							->emailFormat('html')->template('notifMsg')
							->viewVars(array('pseudo'=>$pseudo,'sender'=>$sender))
							->send();
				}
				$this->Session->setFlash('Le message a bien été envoyé','notif');
				$this->redirect(array('controller'=>'msgbox','action'=>'index'));
			}
			else{

				$paginate = array(
					'conditions'  => array('sender_id'=>$connect['id'],'send'=>1,'user_delete'=>0,'trash'=>0),
					'order' => array('Msg.created'=>'DESC'),
					'limit'=>$this->limit
				);
		
				$this->paginate = $paginate;
				$mailbox = $this->paginate('Msg');

				$set = array('mailbox'=>$mailbox,'ajax'=>$ajax);
				//debug($set);
				$this->set($set);
			}
				

			
		}else{
			$this->redirect('/');
		}
	}

	public function particulier_delete($id){

		$connect = AuthComponent::user();
		if($connect){
			
			if($id){
				$this->Msg->updateAll(array('user_delete'=>1),array('id'=>$id,'users_id'=>$connect['id']));
				$this->Msg->updateAll(array('sender_delete'=>1),array('id'=>$id,'sender_id'=>$connect['id']));
				$this->Session->setFlash('Message a été supprimé','notif');
				$this->redirect(array('controller'=>'msgbox','action'=>'index'));
			}
			
		}else{
			$this->redirect('/');
		}
	}

	public function particulier_trash($id=null){

		$connect = AuthComponent::user();
		if($connect){
			
			if($id){
				$this->Msg->updateAll(array('trash'=>1),array('id'=>$id,'users_id'=>$connect['id']));
				$this->Session->setFlash('Message a bien été placé dans la corbeille','notif');
				$this->redirect(array('controller'=>'msgbox','action'=>'index'));
			}
			else{
				
				$paginate = array(
					'conditions'  => array('users_id'=>$connect['id'],'send'=>1,'user_delete'=>0,'trash'=>1),
					'order' => array('Msg.created'=>'DESC'),
					'limit'=>$this->limit
				);
			
							  	
				$this->paginate = $paginate;
				$mailbox = $this->paginate('Msg');

				$set = array('mailbox'=>$mailbox);
				$this->set($set);
			}
			
		}else{
			$this->redirect('/');
		}
	}

	public function particulier_draft($id=null){

		$connect = AuthComponent::user();
		if($connect){
			
			if($this->request->is('post') || $this->request->is('put')){
				$data = $this->request->data;
				$data = current($data);
				$data['sender_id'] = $connect['id'];
				$data['sender_name'] = $connect['pseudo'];
				$data['send'] = 0;
				
				$this->Msg->save($data);
				$this->Session->setFlash('Message a bien été envoyé','notif');
				$this->redirect($this->referer());
			}
			else{
				$paginate = array(
					'conditions'  => array('sender_id'=>$connect['id'],'send'=>0,'user_delete'=>0,'trash'=>0),
					'order' => array('Msg.created'=>'DESC'),
					'limit'=>$this->limit
				);
						  	
				$this->paginate = $paginate;
				$mailbox = $this->paginate('Msg');
				
				$set = array('mailbox'=>$mailbox);
				//debug($set);
				$this->set($set);
			}
			
		}else{
			$this->redirect('/');
		}
	}

	public function pro_index(){
		
		$connect = AuthComponent::user();
		$connect = true;
		if($connect){
				
			$paginate = array(
				'conditions'  => array('Msg.users_id'=>$connect['id'],'Msg.send'=>1,'Msg.user_delete'=>0,'Msg.trash'=>0,'Msg.msg_archives_id'=>0),
				'order' => array('Msg.created'=>'desc'),
				'limit'=>$this->limit
			);
		
						  	
			$this->paginate = $paginate;
			$mailbox = $this->paginate('Msg');
			
			$set = array('mailbox'=>$mailbox);
			$this->set($set);

			
		}else{
			$this->redirect('/');
		}
	}

	public function pro_archive($id){

		$connect = AuthComponent::user();
		if($connect){
			
			$paginate = array(
				'conditions'  => array('Msg.users_id'=>$connect['id'],'Msg.send'=>1,'Msg.user_delete'=>0,'Msg.trash'=>0,'Msg.msg_archives_id'=>$id),
				'order' => array('Msg.created'=>'DESC'),
				'limit'=>$this->limit
			);
				
			$this->paginate = $paginate;
			$mailbox = $this->paginate('Msg');

			$set = array('mailbox'=>$mailbox);
			$this->set($set);

			
		}else{
			$this->redirect('/');
		}
	}

	public function pro_deletearchive($id){

		$connect = AuthComponent::user();
		if($connect){
			$this->loadModel('MsgArchive');
			$this->MsgArchive->id = $id;
			$this->MsgArchive->delete();
			$this->Session->setFlash('L\'archive a bien été supprimé','notif');
			$this->redirect(array('controller'=>'msgbox','action'=>'index'));

			
		}else{
			$this->redirect('/');
		}
	}


	public function pro_addarchive(){
		$connect = AuthComponent::user();
		if($connect){
			if($this->RequestHandler->isAjax()){
				$this->set(array('ajax'=>true));
			}elseif($this->request->is('post') || $this->request->is('put')){
				$name = $this->request->data['Archive']['name'];
				$data = array('title'=>$name,'users_id'=>$connect['id']);
				$this->loadModel('MsgArchive');
				$this->MsgArchive->save($data);
				$this->Session->setFlash('L\'archive "'.ucfirst($name).'" a bien été ajouté','notif');
				$this->redirect(array('controller'=>'msgbox','action'=>'index'));
			}else{
				die();
			}
			
		}else{
			$this->redirect('/');
		}
	}

	public function pro_read($id){
		
				$connect = AuthComponent::user();
		if($connect){
			
			
				
				$mail = $this->Msg->find('first',array(
						'conditions'  => array('OR'=>array('users_id'=>$connect['id'],'sender_id'=>$connect['id']),'id'=>$id,'send'=>1,'user_delete'=>0,'trash'=>0)
					)
				);

				if($mail){
					
					if($mail['Msg']['read']==0){
						$this->Msg->updateAll(array('read'=>1),array('Msg.id'=>$id,'Msg.users_id'=>$connect['id']));
					}

					
					$set = array('mail'=>$mail,'sender'=>$connect);
					//debug($set);
					$this->set($set);
				}else{
					$this->Session->setFlash('Ce message n\'existe pas','notif');
					$this->redirect(array('action'=>'index'));
					die();
				}
				

				

			
		}else{
			$this->redirect('/');
		}
	}

	public function pro_send($id=null){

		$connect = AuthComponent::user();
		if($connect){
			$ajax = false;
			
			if($this->RequestHandler->isAjax() && $id){
				$ajax = true;
				$this->User->id = $id;
				$this->User->recursive = -1;
				$user = $this->User->read();
				$set = array('user'=>current($user),'sender'=>$connect,'ajax'=>$ajax);
				$this->set($set);

			}elseif($this->request->is('post') || $this->request->is('put')){
				
				$data = $this->request->data;
				$user = $this->User->find('first',array(
					'conditions'=>array('User.id'=>$data['Msg']['users_id']),
					'recursive'=>-1,
					'fields'=>array('mail','pseudo')
				));
				$email = $user['User']['mail'];
				$pseudo = $user['User']['pseudo'];
				$sender = $connect['pseudo'];
				
				$data = current($data);
				$data['send'] = 1;
				$etatFile = false;
				if(!empty($data['files']) && $data['files']['error']==0 && is_array($data['files'])){
					$path = $data['files']['tmp_name'];
					$file = explode('.',$data['files']['name']);
					$size = $data['files']['size'];
					$name = $file[0];
					$ext = $file[1];
					$dossier = 'msg';
					$upload = move_uploaded_file($path,WWW_ROOT.'files/'.$dossier.DS.$name.'.'.$ext);
					$etatFile = true;	
				}
				$success = $this->Msg->save($data);
				if($etatFile){
					$id = $this->Msg->id;
					$this->MsgFile->save(array('msgs_id'=>$id,'url'=>$dossier.DS.$name.'.'.$ext,'ext'=>$ext,'size'=>$size));
				}
				if($success){
					// Envoie de la notification par mail
							App::uses('CakeEmail','Network/Email');
							$mail = new CakeEmail();
							$mail->from('support@sympathy-world.fr')
							->to($email)
							->subject('Vous avez reçu un message')
							->emailFormat('html')->template('notifMsg')
							->viewVars(array('pseudo'=>$pseudo,'sender'=>$sender))
							->send();
				}
				$this->Session->setFlash('Le message a bien été envoyé','notif');
				$this->redirect(array('controller'=>'msgbox','action'=>'index'));
			}
			else{

				$paginate = array(
					'conditions'  => array('sender_id'=>$connect['id'],'send'=>1,'user_delete'=>0,'trash'=>0),
					'order' => array('Msg.created'=>'DESC'),
					'limit'=>$this->limit
				);
		
				$this->paginate = $paginate;
				$mailbox = $this->paginate('Msg');

				$set = array('mailbox'=>$mailbox,'ajax'=>$ajax);
				//debug($set);
				$this->set($set);
			}
				

			
		}else{
			$this->redirect('/');
		}
	}

	public function pro_delete($id){

		$connect = AuthComponent::user();
		if($connect){
			
			if($id){
				$this->Msg->updateAll(array('user_delete'=>1),array('id'=>$id,'users_id'=>$connect['id']));
				$this->Msg->updateAll(array('sender_delete'=>1),array('id'=>$id,'sender_id'=>$connect['id']));
				$this->Session->setFlash('Message a été supprimé','notif');
				$this->redirect(array('controller'=>'msgbox','action'=>'index'));
			}
			
		}else{
			$this->redirect('/');
		}
	}

	public function pro_trash($id=null){

		$connect = AuthComponent::user();
		if($connect){
			
			if($id){
				$this->Msg->updateAll(array('trash'=>1),array('id'=>$id,'users_id'=>$connect['id']));
				$this->Session->setFlash('Message a bien été placé dans la corbeille','notif');
				$this->redirect(array('controller'=>'msgbox','action'=>'index'));
			}
			else{
				
				$paginate = array(
					'conditions'  => array('users_id'=>$connect['id'],'send'=>1,'user_delete'=>0,'trash'=>1),
					'order' => array('Msg.created'=>'DESC'),
					'limit'=>$this->limit
				);
			
							  	
				$this->paginate = $paginate;
				$mailbox = $this->paginate('Msg');

				$set = array('mailbox'=>$mailbox);
				$this->set($set);
			}
			
		}else{
			$this->redirect('/');
		}
	}

	public function pro_draft($id=null){

		$connect = AuthComponent::user();
		if($connect){
			
			if($this->request->is('post') || $this->request->is('put')){
				$data = $this->request->data;
				$data = current($data);
				$data['sender_id'] = $connect['id'];
				$data['sender_name'] = $connect['pseudo'];
				$data['send'] = 0;
				
				$this->Msg->save($data);
				$this->Session->setFlash('Message a bien été envoyé','notif');
				$this->redirect($this->referer());
			}
			else{
				$paginate = array(
					'conditions'  => array('sender_id'=>$connect['id'],'send'=>0,'user_delete'=>0,'trash'=>0),
					'order' => array('Msg.created'=>'DESC'),
					'limit'=>$this->limit
				);
						  	
				$this->paginate = $paginate;
				$mailbox = $this->paginate('Msg');
				
				$set = array('mailbox'=>$mailbox);
				//debug($set);
				$this->set($set);
			}
			
		}else{
			$this->redirect('/');
		}
	}


	

}

?>
