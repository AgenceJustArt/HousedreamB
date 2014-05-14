
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Basic Page Needs
  ================================================== -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	
	<meta name="description" content="Solitude, mal être, dépression, handicap, séparation ou perte d'un proche ; trouver quelqu'un à qui en parler pour aller mieux sur Sympathy World : discussion en ligne, tchat 100% confidentiel !">
	<meta name="author" content="Association Pays D'Argonne">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php echo $this->Html->meta('icon'); ?>

	<!-- CSS
  ================================================== -->
 	<?php 
 		$url = $this->request->params; 
 		$url = $this->Html->url(array(
 			'controller'=>$url['controller'],
 			'action'=>$url['action'],
 			$url['id']
 		),true);
 	?>
 	<script>
 		var url = '<?php echo $url;?>';
 	</script>
	
 	<?php echo $this->Html->css('tchat'); ?>	

    
	
	
	
    
	<!-- JavaScript & Library ================================================== -->
    <!--
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
	-->
	<?php echo $this->Html->script('jquery-1.8.3'); ?>
	<?php echo $this->Html->script('jquery-ui-1.10.0.custom.min'); ?>
	
	<?php echo $this->Html->script('tchat'); ?>
	


	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	

	
	
</head>

<body>
	


	
	
				<header id="header">
		
					
					
					<div id="connect">
						<div class="container">
							<div class="sixteen columns">
								<div id="logo"></div>
								
									
			
							</div>
						</div>
					</div>

					
			
	
	
	<section id="section">
		<div class="container">
			<?php echo $this->Session->flash(); ?>
			
			
			<?php echo $this->fetch('content'); ?>
		</div>
	</section>
			 
	
</body>


</html>



