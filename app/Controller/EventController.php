<?php
class EventController extends AppController {
	
	public $uses = array('User','AskCalendar','Calendar');
	public $components = array('Img','RequestHandler');
	
	
	public function index(){
		
		$user = AuthComponent::user();

		if($user){
			$this->loadModel('Event');

			$event = $this->Event->find('all');
			$set['event'] = $event;
			$this->set($set);
			
			//debug($this->Event->updateDate());
	//debug($event);
		}else{
			$this->redirect('/');
		}
	}

	public function acceptrdv($id){
		$user = AuthComponent::user();
		if($user){
			$this->AskCalendar->id = $id;
			$accept = $this->AskCalendar->read();
			$accept = current($accept);
			// Suppresion de la demande car validé
			$this->AskCalendar->delete();
			// Création du rendez-vous dans les calendriers respectif
			$valider = $this->User->find('first',array('conditions'=>array('User.id'=>$accept['users_id']),'fields'=>array('mail','sexe'),'recursive'=>-1));
			$valider = current($valider);
			$valider['content'] = 'Vous avez rendez-vous avec <h2 class="'.$valider['sexe'].'">'.$accept['users_name'].'</h2>';

			$sender = $this->User->find('first',array('conditions'=>array('User.id'=>$accept['sender_id']),'fields'=>array('mail','sexe'),'recursive'=>-1));
			$sender = current($sender);
			$sender['content'] = 'Vous avez rendez-vous avec <h2 class="'.$sender['sexe'].'">'.$accept['sender_name'].'</h2>';

			$save = array(
				array(
					'users_id'=>$accept['users_id'],
					'rdvuser_id'=>$accept['sender_id'],
					'type'=>'RDV',
					'date'=>$accept['date'],
					'content'=>$sender['content']
				),
				array(
					'users_id'=>$accept['sender_id'],
					'rdvuser_id'=>$accept['users_id'],
					'type'=>'RDV',
					'date'=>$accept['date'],
					'content'=>$valider['content']
				)
			);

			$this->Calendar->saveMany($save);

			// Envoye du mail de validation du rendez-vous

			App::uses('CakeEmail','Network/Email');
						$mail = new CakeEmail();
						$mail->from('support@sympathy-world.fr')
						->to($sender['mail'])
						->subject('Rendez-vous accepté')
						->emailFormat('html')->template('notifAcceptRdv')
						->viewVars(array('content'=>$valider['content'],'pseudo'=>$accept['sender_name'],'date'=>$accept['date']))
						->send();


						$mail = new CakeEmail();
						$mail->from('support@sympathy-world.fr')
						->to($valider['mail'])
						->subject('Rendez-vous accepté')
						->emailFormat('html')->template('notifAcceptRdv')
						->viewVars(array('content'=>$sender['content'],'pseudo'=>$accept['users_name'],'date'=>$accept['date']))
						->send();

			$this->Session->setFlash('La demande de rendez-vous a bien été accepté';

			
			
		}else{
			$this->redirect('/');
		}
		$this->redirect(array('controller'=>'membre','action'=>'index'));
	}

	public function refuserdv($id){
		$user = AuthComponent::user();
		if($user){
			$this->AskCalendar->id = $id;
			$ask = $this->AskCalendar->read();
			$ask = current($ask);

			// Suppresion de la demande car validé
			$this->AskCalendar->delete();
			

			// Envoye du mail de validation du rendez-vous

			
					$email = $this->User->find('first',array(
						'conditions'=>array('User.id'=>$ask['sender_id']),
						'fields'=>array('id','mail','pseudo','notif_rdv'),
						'recursive'=>-1
					));
					$pseudo = $email['User']['pseudo'];
					$notif = $email['User']['notif_rdv'];
					$email = $email['User']['mail'];


					if($notif==1){
						App::uses('CakeEmail','Network/Email');
							$mail = new CakeEmail();
							$mail->from('support@sympathy-world.fr')
							->to($email)
							->subject('Refus du rendez-vous')
							->emailFormat('html')->template('notifRefuseRdv')
							->viewVars(array('username'=>$user['pseudo'],'pseudo'=>$pseudo,'date'=>$ask['date']))
							->send();
					}

					$this->Session->setFlash('La demande de rendez-vous a bien été refusé';


						
			
			
		}else{
			$this->redirect('/');
		}
		$this->redirect(array('controller'=>'membre','action'=>'index'));
	}

	public function cancelrdv($id){
		$user = AuthComponent::user();
		if($user){
			$this->AskCalendar->id = $id;
			$ask = $this->AskCalendar->read();
			$ask = current($ask);

			// Suppresion de la demande car validé
			$this->AskCalendar->delete();
			

			// Envoye du mail de validation du rendez-vous

			
					$email = $this->User->find('first',array(
						'conditions'=>array('User.id'=>$ask['users_id']),
						'fields'=>array('id','mail','pseudo','notif_rdv'),
						'recursive'=>-1
					));
					$pseudo = $email['User']['pseudo'];
					$notif = $email['User']['notif_rdv'];
					$email = $email['User']['mail'];
					

					if($notif==1){
						App::uses('CakeEmail','Network/Email');
							$mail = new CakeEmail();
							$mail->from('support@sympathy-world.fr')
							->to($email)
							->subject('Annulation d\'une demande de rendez-vous')
							->emailFormat('html')->template('notifCancelRdv')
							->viewVars(array('username'=>$user['pseudo'],'pseudo'=>$pseudo,'date'=>$ask['date']))
							->send();
					}

					$this->Session->setFlash('La demande de rendez-vous a bien été annulé';


						
			
			
		}else{
			$this->redirect('/');
		}
		$this->redirect(array('controller'=>'membre','action'=>'index'));
	}

	public function askrdv($id){
		
		$user = AuthComponent::user();
		if($this->request->is('ajax')){
			$this->loadModel('User');
			$ask = $this->User->find('first',array(
				'conditions'=>array('id'=>$id),
				'fields'=>array('pseudo','id','sexe'),
				'recursive'=>-1
			));
			$sender = array('pseudo'=> $user['pseudo'],'id'=>$user['id']);
			$ask = current($ask);
			$set['sender'] = $sender;
			$set['user'] = $ask;
			$set['ajax'] = true;

		}elseif($this->request->is('post') || $this->request->is('put')){
			$data = $this->request->data;
			if($id==$data['Ask']['users_id']){
				$date = $data['Ask']['date'].' '.$data['Ask']['hour'].':'.$data['Ask']['min'].':00';
				$save = array(
					'users_name'=>$data['Ask']['users_name'],
					'users_id'=>$data['Ask']['users_id'],
					'sender_name'=>$data['Ask']['sender_name'],
					'sender_id'=>$data['Ask']['sender_id'],
					'type'=>'rdv',
					'answer'=>'0',
					'accept'=>'0',
					'needother'=>'0',
					'sendother'=>'0',
					'date'=>$date,
					'content'=>$data['Ask']['content']
				);
				$this->loadModel('AskCalendar');
				$success = $this->AskCalendar->save($save);
				if($success){
					$this->increaseRate(array(
						'user'=>$user['id'],
						'object'=>'rdvgive'
					));
					$email = $this->User->find('first',array(
						'conditions'=>array('User.id'=>$id),
						'fields'=>array('id','mail','pseudo','notif_rdv'),
						'recursive'=>-1
					));
					$pseudo = $email['User']['pseudo'];
					$notif = $email['User']['notif_rdv'];
					$email = $email['User']['mail'];
					
					if($notif==1){
						App::uses('CakeEmail','Network/Email');
							$mail = new CakeEmail();
							$mail->from('support@sympathy-world.fr')
							->to($email)
							->subject('Demande de rendez-vous')
							->emailFormat('html')->template('notifAskRdv')
							->viewVars(array('username'=>$user['pseudo'],'pseudo'=>$pseudo,'date'=>$date))
							->send();
					}

					$this->Session->setFlash('La demande de rendez-vous a bien été envoyé à '.$data['Ask']['users_name'],'notif');
				}else{
					$this->Session->setFlash('Une erreur s\'est produite lors de la demande, veuillez ressayer ultérieurement.','notif');
				}
			}
			else{
				$this->Session->setFlash('Une erreur s\'est produite lors de la demande, veuillez ressayer ultérieurement.','notif');
			}
			$this->redirect(array('controller'=>'membre','action'=>'index'));
			
			
			$set['ajax'] = false;
		}
		$this->set($set);
	}

	public function changerdv($id){
		
		$user = AuthComponent::user();
		if($this->request->is('ajax')){

			// Récupération de la demande de rendez-vous
			$this->AskCalendar->id = $id;
			$ask = $this->AskCalendar->read();

			$ask = current($ask);


			$sender = array('pseudo'=> $ask['users_name'],'id'=>$ask['users_id']);
			$asker = array('pseudo'=> $ask['sender_name'],'id'=>$ask['sender_id'],'sexe'=>$ask['sender_sexe']);
			
			$set['content'] = 'Réponse : '.$ask['content'];
			$set['sender'] = $sender;
			$set['user'] = $asker;
			$set['ask'] = $ask;
			$set['ajax'] = true;

		}elseif($this->request->is('post') || $this->request->is('put')){
			$data = $this->request->data;
			debug($data);
			die();
			if($user['id'] == $data['Ask']['sender_id']){
				$date = $data['Ask']['date'].' '.$data['Ask']['hour'].':'.$data['Ask']['min'].':00';
				$save = array(
					'users_name'=>$data['Ask']['users_name'],
					'users_id'=>$data['Ask']['users_id'],
					'sender_name'=>$data['Ask']['sender_name'],
					'sender_id'=>$data['Ask']['sender_id'],
					'type'=>'rdv',
					'answer'=>'0',
					'accept'=>'0',
					'needother'=>'0',
					'sendother'=>'0',
					'date'=>$date,
					'content'=>$data['Ask']['content']
				);
				$this->loadModel('AskCalendar');
				$success = $this->AskCalendar->save($save);
				if($success){
					
					// Suppresion de l'ancienne demande
					$this->AskCalendar->id = $id;
					$this->AskCalendar->delete();

					$this->increaseRate(array(
						'user'=>$user['id'],
						'object'=>'rdvgive'
					));
					$email = $this->User->find('first',array(
						'conditions'=>array('User.id'=>$data['Ask']['users_id']),
						'fields'=>array('id','mail','pseudo','notif_rdv'),
						'recursive'=>-1
					));
					$pseudo = $email['User']['pseudo'];
					$notif = $email['User']['notif_rdv'];
					$email = $email['User']['mail'];
					
					if($notif){
					App::uses('CakeEmail','Network/Email');
						$mail = new CakeEmail();
						$mail->from('support@sympathy-world.fr')
						->to($email)
						->subject('Propostion d\'un autre rendez-vous')
						->emailFormat('html')->template('notifChangeRdv')
						->viewVars(array('username'=>$user['pseudo'],'pseudo'=>$pseudo,'date'=>$date))
						->send();
					}

					$this->Session->setFlash('La proposition d\'un autre rendez-vous a bien été envoyé à '.$data['Ask']['users_name'],'notif');
				}else{
					$this->Session->setFlash('Une erreur s\'est produite lors de la demande, veuillez ressayer ultérieurement.','notif');
				}
			}
			else{
				$this->Session->setFlash('Une erreur s\'est produite lors de la demande, veuillez ressayer ultérieurement.','notif');
			}
			$this->redirect(array('controller'=>'membre','action'=>'index'));
			
			
			$set['ajax'] = false;
		}
		$this->set($set);
		
	}


	
	

}


?>
