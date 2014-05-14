<?php
class CheckoutController extends AppController {
	
	public $uses = array('User','Order');
	public $components = array('Img','RequestHandler');
	
	
		
	
	public function index(){

		$connect = AuthComponent::user();
		if($connect){
			
			$price = array(
					'A'=>array('month'=>12,'reduice'=>20,'base'=>9.90,'price'=>7.90,'total'=>94.80),
					'B'=>array('month'=>6,'reduice'=>15,'base'=>9.90,'price'=>8.40,'total'=>50.40),
					'C'=>array('month'=>3,'reduice'=>10,'base'=>9.90,'price'=>8.90,'total'=>26.70),
					'D'=>array('month'=>1,'reduice'=>0,'base'=>9.90,'price'=>9.90,'total'=>9.90)
				);
			if($this->request->is('post') || $this->request->is('put')){
				$data = $this->request->data;
				if(array_key_exists($data['choice'],$price)){
					$paiement = explode('-',$data['payment']);
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

	

}

?>
