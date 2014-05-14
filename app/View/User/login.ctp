<div class="sixteen columns">
<?php echo $this->Form->create('User'); ?>
<?php echo $this->Form->create(null, array(
    'url' => array('controller' => 'User', 'action' => 'login')
));?>
	<?php echo $this->Form->input('mail',array('label'=>'Mail :')); ?>
	<?php echo $this->Form->input('pwd',array('label'=>'Mot de pass :')); ?>
<?php echo $this->Form->end("Se connecter"); ?>

</div>    
		