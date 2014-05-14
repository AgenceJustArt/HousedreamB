<?php
class CheckoutController extends AppController {
	
	public $uses = array('User','Order');
	public $components = array('Img','RequestHandler');
	
	
	public function pass(){
		$connect = AuthComponent::user();
		if($connect){
			
			$price = array(
					'A'=>array('ref'=>'A','month'=>10,'reduice'=>20,'base'=>9.90,'price'=>7.50,'total'=>75),
					'B'=>array('ref'=>'B','month'=>5,'reduice'=>15,'base'=>9.90,'price'=>8.50,'total'=>42.50),
					'C'=>array('ref'=>'C','month'=>3,'reduice'=>10,'base'=>9.90,'price'=>9.00,'total'=>27.00),
					'D'=>array('ref'=>'D','month'=>1,'reduice'=>0,'base'=>9.90,'price'=>9.90,'total'=>9.90)
				);
			if($this->request->is('post') || $this->request->is('put')){
				$data = $this->request->data;
				
				if(array_key_exists($data['choice'],$price)){
					$payment = explode('-',$data['payment']);
					$type = $payment[0];
					$card = $payment[1];
					$choice = $price[$data['choice']];
					$set = array('type'=>$type,'card'=>$card,'choice'=>$choice,'user'=>$connect);
					$this->set($set);
				}else{
					$this->Session->setFlash('Erreur','notif');
					$this->redirect('/');
					die();
				}
			}else{
				$this->Session->setFlash('Erreur','notif');
				$this->redirect('/');
				die();
			}
		}else{
			$this->Session->setFlash('Erreur','notif');
				$this->redirect('/');
				die();
		}
	}
	
	public function index(){

		$connect = AuthComponent::user();
		if($connect){
			
			$price = array(
					'A'=>array('ref'=>'A','month'=>12,'reduice'=>20,'base'=>9.90,'price'=>7.90,'total'=>94.80),
					'B'=>array('ref'=>'B','month'=>6,'reduice'=>15,'base'=>9.90,'price'=>8.40,'total'=>50.40),
					'C'=>array('ref'=>'C','month'=>3,'reduice'=>10,'base'=>9.90,'price'=>8.90,'total'=>26.70),
					'D'=>array('ref'=>'D','month'=>1,'reduice'=>0,'base'=>9.90,'price'=>9.90,'total'=>9.90)
				);
			if($this->request->is('post') || $this->request->is('put')){
				$data = $this->request->data;
				if(array_key_exists($data['choice'],$price)){
					$payment = explode('-',$data['payment']);
					$type = $payment[0];
					$card = $payment[1];
					$choice = $price[$data['choice']];
					$set = array('type'=>$type,'card'=>$card,'choice'=>$choice,'user'=>$connect);
					$this->set($set);
				}else{
					$this->Session->setFlash('Erreur','notif');
					$this->redirect('/');
					die();
				}
			}else{
				$this->Session->setFlash('Erreur','notif');
				$this->redirect('/');
				die();
			}
		}else{

		}
	}

	public function ipn(){

	}

	

}

?>
