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
		
			<?php echo $this->Form->input('Association.name',array('label'=>'Nom* :')); ?>
			<?php echo $this->Form->input('Association.content',array('label'=>'Description* :')); ?>
			<?php echo $this->Form->input('Association.themes_id',array('label'=>'Théme* :','type'=>'select','options'=>$theme)); ?>
			<?php echo $this->Form->file('AssoMedia.url'); ?>
			
		
	</div>
	
	<div class="one-third column">
		<h1>Informations (*obligatoire)</h1>
		
			<?php echo $this->Form->input('Association.rna',array('label'=>'RNA* :')); ?>
			<?php echo $this->Form->input('Association.adress',array('label'=>'Adress* :')); ?>
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
		<div class="radius">
		<table class="price shadow">
			<tr class="header"><td><strong>Compte Associatif</strong> (Réservé au association)</td></tr>
			<tr class="item"><td><img src="/argonne/img/arrow-white.png" alt=""> <span class="pink">Inscription dans l'annuaire associatif</span></td></tr>
			<tr class="item"><td><img src="/argonne/img/arrow-white.png" alt=""> <span class="pink">Fiche d'information de l'association</span></td></tr>
			<tr class="item"><td><img src="/argonne/img/arrow-white.png" alt=""> <span class="pink">Rédiger les événements de l'association</span></td></tr>
			<tr class="footer bg-pink"><td><span class="radius"><?php echo $this->Form->end("Demande d'inscription"); ?></span></td></tr>
		</table>
		</div>
	</div>
</div>	