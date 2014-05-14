
<div class="bloc">
	<div class="title">
		<?php if(empty($this->request->data)){ echo 'Ajouter un article'; } else{ echo 'Modifier un article';} ?>
	</div>
	<div class="content">
   
		<?php echo $this->Form->create('Salon'); ?>
		<?php echo $this->Form->hidden('Salon.id'); ?>
		<?php echo $this->Form->input('Salon.title',array('label'=>'Titre')); ?>
		<?php echo $this->Form->input('Salon.content',array('id'=>'redactor','label'=>'Description')); ?>
		<?php echo $this->Form->input('Salon.adress',array('label'=>'Adresse :')); ?>
        <?php echo $this->Form->input('Salon.cp',array('label'=>'Code postal :')); ?>
        <?php echo $this->Form->input('Salon.city',array('label'=>'Ville :')); ?>
        <?php echo $this->Form->input('Salon.phone',array('label'=>'Téléphone :')); ?>
        <?php echo $this->Form->input('Salon.mail',array('label'=>'Adresse mail :')); ?>
        <?php echo $this->Form->input('Salon.web',array('label'=>'Site web :')); ?>
        <?php echo $this->Form->input('Salon.salon_groups_id', array('label'=>'Catégorie :','options' => $list)); ?>
		
	
		
		<?php echo $this->Form->end('Envoyer'); ?> 
	</div>
</div>


		