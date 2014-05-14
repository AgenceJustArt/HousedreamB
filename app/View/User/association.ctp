<?php $data = $this->request->data; ?>
<div class="sixteen columns">
	<?php echo $this->element('menu_profil', array(
		"helptext" => "Oh, this text is very helpful."
	));?>
</div>
<div class="clear"></div>
<div id="profil">

	<div class="one-third column">
		
		<h1>L'association</h1>
		<?php echo $this->Form->create('User',array('enctype' => 'multipart/form-data','url'=>array('controller'=>'user','action'=>'basique'))); ?>
			<?php echo $this->Form->hidden('Association.id'); ?>
			<?php echo $this->Form->input('Association.name',array('label'=>'Nom* :')); ?>
			<?php echo $this->Form->input('Association.content',array('label'=>'Description* :')); ?>
			<?php echo $this->Form->input('Association.themes_id',array('label'=>'Théme* :','type'=>'select','options'=>$theme)); ?>
			<br /><br />
			<h1>Espace ressources</h1>
			<label for="checkressource" class="label checkbox">Association ressource</label>
			<?php echo $this->Form->input('Association.ressource',array('label'=>'','type'=>'checkbox','id'=>'checkressource')); ?>	
			<?php echo $this->Form->input('Association.asso_groups_id',array('label'=>'Ressource à disposition :','type'=>'select','options'=>$assogroup)); ?>
			
			
			
		
	</div>
	
	<div class="one-third column">
		<h1>Informations</h1>
		
			<?php echo $this->Form->input('Association.rna',array('label'=>'RNA* :')); ?>
			<?php echo $this->Form->input('Association.adress',array('label'=>'Adresse* :')); ?>
			<?php echo $this->Form->input('Association.city',array('label'=>'Ville* :')); ?>
			<?php echo $this->Form->input('Association.cp',array('label'=>'Code postal* :')); ?>
			<?php $zone = array(
				'ardennes'=>'Ardennes',
				'marne'=>'Marne',
				'meuse'=>'Meuse'
			); ?>
			<?php echo $this->Form->input('Association.zone',array('label'=>'Département* :','type'=>'select','options'=>$zone)); ?>
			
			
			
			<?php echo $this->Form->input('Association.phone',array('label'=>'Téléphone :')); ?>
			<?php echo $this->Form->input('Association.web',array('label'=>'Site web :')); ?>
			<?php echo $this->Form->input('Association.mail',array('label'=>'E-Mail :')); ?>
		
	</div>
	
	<div class="one-third column">
		<h1>Photo ou illustration</h1>
			<?php echo $this->Form->file('AssoMedia.url'); ?>
			<?php 
				if(isset($data['AssoMedia']['url']) && !empty($data['AssoMedia']['url'])){
					echo $this->Html->image($data['AssoMedia']['url'],array('width'=>'300')); 
				}
			?>
			
	
		<br /><br />
		<?php echo $this->Form->end("Enregistrer"); ?>
	</div>
</div>	