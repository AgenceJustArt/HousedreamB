
<div class="bloc">
	<div class="title">
		<?php if(empty($this->request->data)){ echo 'Ajouter un article'; } else{ echo 'Modifier un article';} ?>
	</div>
	<div class="content">
   
		<?php echo $this->Form->create('Presse'); ?>
		<?php echo $this->Form->hidden('Presse.id'); ?>
		<?php echo $this->Form->input('Presse.title',array('label'=>'Titre')); ?>
		<?php echo $this->Form->input('Presse.content',array('id'=>'redactor','label'=>'Description')); ?>
		<?php echo $this->Form->input('Presse.adress',array('label'=>'Adresse :')); ?>
        <?php echo $this->Form->input('Presse.cp',array('label'=>'Code postal :')); ?>
        <?php echo $this->Form->input('Presse.city',array('label'=>'Ville :')); ?>
        <?php echo $this->Form->input('Presse.phone',array('label'=>'Téléphone :')); ?>
        <?php echo $this->Form->input('Presse.mail',array('label'=>'Adresse mail :')); ?>
        <?php echo $this->Form->input('Presse.web',array('label'=>'Site web :')); ?>
        <?php echo $this->Form->input('Presse.presse_groups_id', array('label'=>'Catégorie :','options' => $list)); ?>
		
	
		
		<?php echo $this->Form->end('Envoyer'); ?> 
	</div>
</div>


		