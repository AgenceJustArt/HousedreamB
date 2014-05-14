<?php

App::uses('AppController', 'Controller');

class CategoryController extends AppController {

	public $name = 'Category';


 	
 	public function index() {
			
	}
	
	public function view($id = null) {
		$data = $this->Category->findById($id);
		$this->set("category", $data);
	}
	
}
	
?>