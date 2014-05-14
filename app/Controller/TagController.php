<?php

App::uses('AppController', 'Controller');

class TagController extends AppController {

	public $name = 'Tag';


 	
 	public function index() {
			
	}
	
	public function view($id = null) {
		die();
		$data = $this->Tag->findById($id);
		debug($data);
		$this->set("tag", $data);
	}
	
}
?>