
<div class="bloc">
	<div class="title">
		<?php if(empty($this->request->data)){ echo 'Ajouter une annonce'; } else{ echo 'Modifier l\'annonce';} ?>
	</div>
	<div class="content">
		<?php echo $this->Form->create('Annonce'); ?>
		<?php echo $this->Form->hidden('Annonce.id'); ?>
      
		<?php echo $this->Form->input('Annonce.name',array('class'=>'inline')); ?>
		<?php echo $this->Form->input('Annonce.content',array('id'=>'redactor')); ?> 
        <?php 
			echo $this->Form->input('Annonce.annonce_groups_id', array('label'=>'Catégorie :','options' => $list)); 
			
		?>
		<label for="iphonecheck" class="label">En ligne</label>
		<?php echo $this->Form->input('Annonce.online',array('label'=>'','type'=>'checkbox','class'=>'iphone','id'=>'iphonecheck')); ?>	
		
	<?php echo $this->Form->end('Envoyer'); ?> 	
	</div>
</div>


    	
	

		