<div class="row">
	<div class="large-12 columns">
		<h1>Modifier mon profil</h1>
	</div>
</div>


<div id="edit" class="shadow">
	<div class="row">
		<div class="large-3 columns">
			<b>Informations du compte</b>
			<?php $this->Form->create('User'); ?>
		</div>
		<div class="large-9 columns">
			<ul class="large-block-grid-2">
				<li><?php echo $this->Form->input('lastname', $options = array('label'=>false,'placeholder'=>'Nom')); ?></li>
				<li><?php echo $this->Form->input('firstname', $options = array('label'=>false,'placeholder'=>'Prénom')); ?></li>
			</ul>
			<ul class="large-block-grid-1">
				<li><?php echo $this->Form->input('mail', $options = array('label'=>false,'placeholder'=>'Mail')); ?></li>
			</ul>
			<ul class="large-block-grid-2">
				<li><?php echo $this->Form->input('pwdA', $options = array('label'=>false,'placeholder'=>'Mot de passe')); ?></li>
				<li><?php echo $this->Form->input('pwdB', $options = array('label'=>false,'placeholder'=>'Confirmation du mot de passe')); ?></li>
			</ul>
		</div>
		

	</div>


	<div class="row">
		<div class="large-3 columns">
			<b>Informations générales</b>
		</div>
		<div class="large-9 columns">
			<ul class="large-block-grid-1">
				<li><?php echo $this->Form->input('address', $options = array('label'=>false,'placeholder'=>'Adresse')); ?></li>
			</ul>
			<ul class="large-block-grid-2">
				<li><?php echo $this->Form->input('cp', $options = array('label'=>false,'placeholder'=>'Code postal')); ?></li>
				<li><?php echo $this->Form->input('city', $options = array('label'=>false,'placeholder'=>'Ville')); ?></li>
			</ul>
		</div>
		

	</div>
</div>