
<div class="bloc">
	<div class="title">
		<?php if(empty($this->request->data)){ echo 'Ajouter un article'; } else{ echo "Modifier l'inscription ressource de l'association";} ?>
	</div>
	<div class="content">
    	<br />
   		<?php echo '<h2>'.$this->request->data['Association']['name'].'</h2>'; ?>
        <?php echo '<p>'.$this->request->data['Association']['content'].'</p>'; ?>
        
		<?php echo $this->Form->create('Association'); ?>
		<?php echo $this->Form->hidden('Association.id'); ?>
		
		<?php //echo $this->Form->input('Association.content',array('id'=>'redactor','label'=>'Description')); ?>
        <?php echo $this->Form->input('Association.asso_groups_id', array('label'=>'Catégorie :','options' => $list)); ?>
        <label for="iphonecheck" class="label">En ligne</label>
		<?php echo $this->Form->input('Association.ressource',array('label'=>'','type'=>'checkbox','class'=>'iphone','id'=>'iphonecheck')); ?>	
		
	
		
		<?php echo $this->Form->end('Envoyer'); ?> 
	</div>
</div>


		