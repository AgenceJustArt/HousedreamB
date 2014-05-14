
<div class="bloc">
	<div class="title">
		<?php if(empty($this->request->data)){ echo 'Ajouter une benevolat'; } else{ echo 'Modifier l\'benevolat';} ?>
	</div>
	<div class="content">
		<?php echo $this->Form->create('Benevolat'); ?>
		<?php echo $this->Form->hidden('Benevolat.id'); ?>
      
		<?php echo $this->Form->input('Benevolat.title',array('class'=>'inline')); ?>
		<?php echo $this->Form->input('Benevolat.content',array('id'=>'redactor')); ?> 
        <?php 
			echo $this->Form->input('Benevolat.benevolat_groups_id', array('label'=>'Catégorie :','options' => $list)); 
			
		?>
		<label for="iphonecheck" class="label">En ligne</label>
		<?php echo $this->Form->input('Benevolat.online',array('label'=>'','type'=>'checkbox','class'=>'iphone','id'=>'iphonecheck')); ?>	
		
	<?php echo $this->Form->end('Envoyer'); ?> 	
	</div>
</div>


    	
	

		