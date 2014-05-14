
<div class="bloc">
	<div class="title">
		<?php if(empty($this->request->data)){ echo 'Ajouter un article'; } else{ echo 'Modifier un article';} ?>
	</div>
	<div class="content">
   
		<?php echo $this->Form->create('Location'); ?>
		<?php echo $this->Form->hidden('Location.id'); ?>
		<?php echo $this->Form->input('Location.title',array('label'=>'Titre')); ?>
		<?php echo $this->Form->input('Location.content',array('id'=>'redactor','label'=>'Description')); ?>
		<?php echo $this->Form->input('Location.adress',array('label'=>'Adresse :')); ?>
        <?php echo $this->Form->input('Location.cp',array('label'=>'Code postal :')); ?>
        <?php echo $this->Form->input('Location.city',array('label'=>'Ville :')); ?>
        <?php echo $this->Form->input('Location.phone',array('label'=>'Téléphone :')); ?>
        <?php echo $this->Form->input('Location.mail',array('label'=>'Adresse mail :')); ?>
        <?php echo $this->Form->input('Location.url',array('label'=>'Site web :')); ?>
        <?php echo $this->Form->input('Location.location_groups_id', array('label'=>'Catégorie :','options' => $list)); ?>
		
	
		
		<?php echo $this->Form->end('Envoyer'); ?> 
	</div>
</div>


		