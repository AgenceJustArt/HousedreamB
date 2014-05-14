<?php echo $this->set('title_for_layout','Pays d\'argonne. Connectez-vous, inscrivez-vous ou découvrez !'); ?>
	<div id="signup">
		<h1>Inscription</h1> <br />Votre inscription vous permet de déposer vos événements, contribuer à l'actualité sur le Territoire d'Argonne, émettre des commentaires, paraitre dans l'annuaire des associations Argonnaises et de profiter de nombreux avantages par la suite
		<div class="barre"></div>
		
		<div class="block">
					<?php echo $this->Form->create('User'); ?>
						<?php echo $this->Form->input('pseudo',array('label'=>'Pseudo')); ?>
		</div>
		<div class="block">
			<?php echo $this->Form->input('mail',array('label'=>'E-mail <span class="pink">(votre mail sera votre identifiant)</span>')); ?>
		</div>
		<div class="block">
			<?php echo $this->Form->input('pwd',array('label'=>'Mot de passe :')); ?>
		</div>
		
			<div class="letter light-green">
				<br />
				<center><span class="green">Je souhaite m'inscrire à la newsletter maintenant</span></center>
				<center>
				<?php 	
					$options = array('1' => 'Oui', '0' => 'Non');
					$attributes = array('legend'=>false,'value'=>'0');
					echo $this->Form->radio('Newsletter.value', $options, $attributes);
				?>
				</center>	
			</div>
			<div class="letter light-pink">
				<br />
				<center><span class="pink">Valider votre inscription ici</span></center>
				<?php echo $this->Form->end("S'enregistrer"); ?>		
			</div>
	
	</div>
	
	
	
