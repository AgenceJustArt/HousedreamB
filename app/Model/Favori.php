<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.location.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */

class Favori extends AppModel {
	
	public $actsAs = array('Containable');
    public $name = 'Favori';
	public $useTable ='favoris';
	
    /*
	public $belongsTo = array(
        'Role' => array(
            'className' => 'Role',
            'foreignKey' => 'user_roles_id'
        )
    );
    */
	
	public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'favoris_id',
            'fields'=>array('User.id','User.pseudo','User.media','User.last_action','User.sexe','User.likeme_rate','User.situation'),
            'conditions'=>array('User.active'=>1),
            'dependent' => false
        )
    );
	
	
}