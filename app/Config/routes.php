<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'homes'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 
 
 */
 
 

 
 Router::connect(
    	'/tchat/:id',
        array('controller' => 'tchat', 'action' => 'index'),
        array('pass'=> array('id'), 'id'=>'[0-9]+')
    );

  Router::connect(
    	'/mag/article/:slug-:id',
        array('controller' => 'mag', 'action' => 'article'),
       array('pass'=> array('id','slug'), 'id'=>'[0-9]+', 'slug'=>'[a-z0-9\-]+')
    );

  Router::connect(
      '/theme/index/:slug-:id',
        array('controller' => 'theme', 'action' => 'index'),
       array('pass'=> array('id','slug'), 'id'=>'[0-9]+', 'slug'=>'[a-z0-9\-]+')
    );

    Router::connect(
      '/information/index/:slug-:id',
        array('controller' => 'information', 'action' => 'index'),
       array('pass'=> array('id','slug'), 'id'=>'[0-9]+', 'slug'=>'[a-z0-9\-]+')
    );

    Router::connect(
      '/forum/subject/:slug-:id',
        array('controller' => 'forum', 'action' => 'subject'),
       array('pass'=> array('id','slug'), 'id'=>'[0-9]+', 'slug'=>'[a-z0-9\-]+')
    );
	
      Router::connect(
      '/forum/view/:slug-:id',
        array('controller' => 'forum', 'action' => 'view'),
       array('pass'=> array('id','slug'), 'id'=>'[0-9]+', 'slug'=>'[a-z0-9\-]+')
    );
  

	
	
	

/**
 * Load all plugin routes.  See the CakePlugin documentation on 
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
