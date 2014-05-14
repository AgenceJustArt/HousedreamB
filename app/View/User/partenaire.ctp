<?php $data = $this->request->data; ?>
<div class="sixteen columns">
	<?php echo $this->element('menu_profil', array(
		"helptext" => "Oh, this text is very helpful."
	));?>
</div>
<div class="clear"></div>
<div id="profil">

	<div class="one-third column">
   
		
		<h1>L'entreprise partenaire</h1>
		<?php echo $this->Form->create('User',array('enctype' => 'multipart/form-data','url'=>array('controller'=>'user','action'=>'partenaire'))); ?>
			<?php echo $this->Form->hidden('Part.id'); ?>
			<?php echo $this->Form->input('Part.title',array('label'=>'Nom* :')); ?>
			<?php echo $this->Form->input('Part.content',array('label'=>'Description* :')); ?>
			<?php echo $this->Form->input('Part.part_groups_id',array('label'=>'Catégorie :','type'=>'select','options'=>$partgroup)); ?>
            <?php echo $this->Form->input('Part.siret',array('label'=>'SIRET* :')); ?>
            <?php echo $this->Form->input('Part.ape',array('label'=>'Code APE* :')); ?>
			
			
			
			
		
	</div>
	
	<div class="one-third column">
		<h1>Informations</h1>
		
		
			<?php echo $this->Form->input('Part.adress',array('label'=>'Adresse* :')); ?>
			<?php echo $this->Form->input('Part.city',array('label'=>'Ville* :')); ?>
			<?php echo $this->Form->input('Part.cp',array('label'=>'Code postal* :')); ?>
			
			
			
			<?php echo $this->Form->input('Part.phone',array('label'=>'Téléphone :')); ?>
			<?php echo $this->Form->input('Part.web',array('label'=>'Site web :')); ?>
			<?php echo $this->Form->input('Part.mail',array('label'=>'E-Mail :')); ?>
		
	</div>
	
	<div class="one-third column">
		<h1>Photo ou illustration</h1>
			<?php echo $this->Form->file('PartMedia.url'); ?>
			<?php 
				if(isset($data['PartMedia']['url']) && !empty($data['PartMedia']['url'])){
					echo $this->Html->image($data['PartMedia']['url'],array('width'=>'300')); 
				}
			?>
			
	
		<br /><br />
		<?php echo $this->Form->end("Enregistrer"); ?>
	</div>
</div>	