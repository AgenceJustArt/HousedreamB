<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	
	
	public $components = array(
		'RequestHandler',
		'Session'=>array(),
		'Cookie'=>array(),
	    'Auth' => array(
	        'authenticate' => array(
	            'Form' => array(
	                'fields' => array('username' => 'mail','password'=>'password'),
	                'scope'=>array('User.active'=>1)
	            )
	        )
	    )
	);
	
	function beforeFilter(){
		
		
		$this->Auth->loginAction = array('controller'=>'homes','action'=>'index','admin'=>false,'particulier'=>false,'pro'=>false);
		//$this->Auth->authorize = array('Controller');
		$params = $this->request->params;

        
		if(!isset($params['prefix'])){
			$this->Auth->allow();
		}
        if(isset($params['prefix']) && $params['prefix'] == 'admin'){
            $this->layout = 'admin';
        }
        if(isset($params['prefix']) && $params['prefix'] == 'particulier'){
            $this->layout = 'particulier';
        }
        if(isset($params['prefix']) && $params['prefix'] == 'pro'){
            $this->layout = 'pro';
        }
        //$this->Auth->allow();
        

        if($this->RequestHandler->isAjax()){
			$this->layout = null;
			$set['ajax'] = true;
		}else{
			$set['ajax'] = false;
			//$this->layout = 'particulier';
			//$mdp = Security::hash('05967824ab!',null,true);
			//debug($mdp);

	        //$connect = 'Off'; 
	        $user = AuthComponent::user();
	        if($user){ 

	        	$connect = 'On';  
	        	$set['user'] = $user;
	        	$set['prefix'] = $params['prefix'];

	        	



	        

	        }else{ 
	        	$connect = 'Off'; 
	        	
	        	
	        }
	        
	       	$set['connect'] = $connect;
	      
	
	        $this->set($set);
	       
	    }
	
	}

	
	
	
	
	
}
