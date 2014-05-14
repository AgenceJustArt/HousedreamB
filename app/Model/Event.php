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
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
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

class Event extends AppModel {
	
	//public $useTable="posts";
	
	//public $hasOne = 'Media';

    /*
    public $hasAndBelongsToMany = array(
        'Category' =>
            array(
                'className' => 'Category',
                'joinTable' => 'post_category_relations',
                'foreignKey' => 'posts_id',
                'associationForeignKey' => 'categorys_id',
                'unique' => true
            ),'Tag' =>
            array(
                'className' => 'PostTag',
                'joinTable' => 'post_tag_relations',
                'foreignKey' => 'posts_id',
                'associationForeignKey' => 'tags_id',
                'unique' => true
            )
    
	);
    */

    public function updateDate(){
        $success = $this->updateAll(array('Event.username'=>"'WUWU52'"),array('Event.id'=>1));
        return $success;
    }
	

}
