
<div class="bloc">
	<div class="title">
		<?php if(empty($this->request->data)){ echo 'Ajouter un article'; } else{ echo 'Modifier un article';} ?>
	</div>
	<div class="content">
   
		<?php echo $this->Form->create('Link'); ?>
		<?php echo $this->Form->hidden('Link.id'); ?>
		<?php echo $this->Form->input('Link.title',array('label'=>'Titre')); ?>
		<?php echo $this->Form->input('Link.content',array('id'=>'redactor','label'=>'Description')); ?>
		<?php echo $this->Form->input('Link.url',array('label'=>'Lien web :')); ?>
        <?php echo $this->Form->input('Link.link_groups_id', array('label'=>'Catégorie :','options' => $list)); ?>
		
	
		
		<?php echo $this->Form->end('Envoyer'); ?> 
	</div>
</div>


		