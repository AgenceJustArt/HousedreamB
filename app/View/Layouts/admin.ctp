<!doctype html>

<head>

    <meta charset="utf-8">
    <meta name="robots" content="noindex">
    <title> <?php echo $title_for_layout; ?></title>
    <script>
        var website = '<?php echo $this->Html->url('/',true); ?>';
    </script>
    
    
    <?php echo $this->Html->css('admin/reset'); ?>
    <?php echo $this->Html->css('admin/style'); ?>
    <?php echo $this->Html->css('admin/skeleton'); ?>
    <?php echo $this->Html->css('admin/redactor'); ?>
     <?php echo $this->Html->css('admin/superfish'); ?>
    <?php //echo $this->Html->css('admin/jquery-ui-1.10.0.custom'); ?>
    
    <style> 

	
    </style>
    
    <?php echo $this->Html->script('admin/jquery-1.8.3'); ?>
    <?php echo $this->Html->script('admin/jquery-ui-1.10.0.custom.min'); ?>
     <?php echo $this->Html->script('admin/hoverIntent'); ?>
    <?php echo $this->Html->script('admin/superfish'); ?>
    <?php echo $this->Html->script('admin/redactor'); ?>
   	<?php echo $this->Html->script('admin/custom'); ?>
    
    
  

</head>

<body>
    <div id="tooltips">
    </div>

	<header id="header">
        <div class="container">
            <div class="columns sixteen">
                <div id="account-menu">
                    <?php echo $this->Html->link('Gestion', array('controller' => 'user', 'action' => 'register')); ?>
                    <?php echo $this->Html->link('Messagerie', array('controller' => 'msgbox', 'action' => 'index')); ?>
                    Bienvenue, <b class="color"><?php echo AuthComponent::user('pseudo'); ?></b> | <?php echo $this->Html->link('déconnexion',array('controller'=>'account','action'=>'logout','admin'=>false)); ?>
                </div>
            </div>
        </div>
    </header>


    <section>
        <div class="container">
            <div class="columns sixteen">
                <?php echo $this->Session->flash(); ?>
            </div>
        </div>
    </section>

	
 <br /><br /><br />
  
    
   


  
  
  	<div class="main">
 		<div class="container">
            <div class="four columns">
                <div id="menu">
                    <?php if($this->params['controller']=='msgbox'){ ?>
                        <h3>Boîte de réception</h3>
                        <div>
                                <ul>
                                    
                                    <li><?php echo $this->Html->link('Messages reçues',array('controller'=>'msgbox','action'=>'index'),array()); ?></li>
                                    <li><?php echo $this->Html->link('Corbeille',array('controller'=>'msgbox','action'=>'trash'),array()); ?></li>
                                    
                                    
                                </ul>
                        </div>
                        <h3>Boîtes d'envoi</h3>
                        <div>
                                <ul>
                                    
                                    <li><?php echo $this->Html->link('Messages envoyés',array('controller'=>'msgbox','action'=>'send'),array()); ?></li>
                                    <li><?php echo $this->Html->link('Brouillon',array('controller'=>'msgbox','action'=>'draft'),array()); ?></li>
                                </ul>
                        </div>
                        
                    <?php }else{ ?> 
                        <h3>Les news</h3>   
                        <div>
                                <ul>
                                    
                                    <li><?php echo $this->Html->link('Gérer les news',array('controller'=>'post','action'=>'index'),array()); ?></li>
                                    <li><?php echo $this->Html->link('Ajouter une news',array('controller'=>'post','action'=>'new'),array()); ?></li>
                                    
                                </ul>
                        </div>
                        <h3>Articles</h3>
                        <div>
                                <ul>
                                    
                                    <li><?php echo $this->Html->link('Gérer les articles',array('controller'=>'manage','action'=>'all','article'),array()); ?></li>
                                    <li><?php echo $this->Html->link('Ajouter un article',array('controller'=>'manage','action'=>'new','article'),array()); ?></li>
                                    <li><?php echo $this->Html->link('Article en attente',array('controller'=>'manage','action'=>'wait','article'),array()); ?></li>
                                </ul>
                        </div>
                        <!--
                        <h3>Annuaire</h3>
                        <div>
                                <ul>
                                    
                                    <li><?php echo $this->Html->link('Gérer les annonces',array('controller'=>'product','action'=>'index'),array()); ?></li>
                                    <li><?php echo $this->Html->link('Ajouter une annonce',array('controller'=>'category','action'=>'index'),array()); ?></li>
                                </ul>
                        </div>
                        <h3>Événements</h3>
                        <div>
                                <ul>
                                    
                                    <li><?php echo $this->Html->link('Gérer les annonces',array('controller'=>'manage','action'=>'all','event'),array()); ?></li>
                                    <li><?php echo $this->Html->link('Ajouter une annonce',array('controller'=>'category','action'=>'index'),array()); ?></li>
                                </ul>
                        </div>-->
                        <h3>Membres</h3>
                        <div>
                                <ul>
                                    <li><?php echo $this->Html->link('Gérer les membres',array('controller'=>'user','action'=>'index'),array()); ?></li>
                                    <li><?php echo $this->Html->link('Demande d\'inscriptions',array('controller'=>'user','action'=>'register'),array()); ?></li>
                                </ul>
                        </div>
                       
                    <?php } ?>
                        
                    </div>
            </div>
        	<div class="twelve columns">
	           <?php echo $content_for_layout; ?>
            </div>
  
       	</div>
 
  

  </div><!--MAIN ENDS-->
<?php //echo $this->element('sql_dump'); ?>

</body>
</html>
