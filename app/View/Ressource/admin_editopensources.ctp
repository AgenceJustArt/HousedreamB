
<div class="bloc">
	<div class="title">
		<?php if(empty($this->request->data)){ echo 'Ajouter un article'; } else{ echo 'Modifier un article';} ?>
	</div>
	<div class="content">
   
		<?php echo $this->Form->create('Opensource'); ?>
		<?php echo $this->Form->hidden('Opensource.id'); ?>
		<?php echo $this->Form->input('Opensource.title',array('label'=>'Titre')); ?>
		<?php echo $this->Form->input('Opensource.content',array('id'=>'redactor','label'=>'Description')); ?>
        <?php echo $this->Form->input('Opensource.url',array('label'=>'Lien du site :')); ?>
        <?php echo $this->Form->input('Opensource.opensource_groups_id', array('label'=>'Catégorie :','options' => $list)); ?>
		
	
		
		<?php echo $this->Form->end('Envoyer'); ?> 
	</div>
</div>


		