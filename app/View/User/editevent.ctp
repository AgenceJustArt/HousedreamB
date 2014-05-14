

		
			
	
	
		
			


    	
	


<div class="sixteen columns">
	<?php echo $this->element('menu_profil', array(
		"helptext" => "Oh, this text is very helpful."
	));?>
</div>

<div class="clear"></div>

<div id="profil">
	<?php if($timestamp){ ?>
	<div class="one-third column">
		<h1>Ajouter un événement</h1>
		
	
		<?php echo $this->Form->create('Event',array('enctype' => 'multipart/form-data')); ?>
		
		<?php echo $this->Form->input('Event.title',array('class'=>'inline')); ?>
		<?php echo $this->Form->input('Event.content',array('id'=>'redactor')); ?> 
		<?php 
			foreach($category as $k=>$v){
				$v = current($v);
				$key = $v['id'];
				$valeur = $v['title'];
				$sizes[$key] = $valeur;		
			}
		?>
        <?php 
			echo $this->Form->input('Event.event_categorys_id', array('label'=>'Catégorie :','options' => $sizes, 'default' => 'm')); 
		?>
			
		
	</div>
	
	<div class="one-third column">
		<h1>Informations</h1>
		
			<?php 
				echo $this->Form->input('Event.location',array('label'=>'Lieu :')); 
				echo $this->Form->input('Event.adress',array('label'=>'Adresse :')); 
				echo $this->Form->input('Event.city',array('label'=>'Ville* :')); 
				echo $this->Form->input('Event.cp',array('label'=>'Code postal* :'));
				$zone = array(
					'ardennes'=>'Ardennes',
					'marne'=>'Marne',
					'meuse'=>'Meuse'
				);
				echo $this->Form->input('Event.zone',array('label'=>'Département* :','type'=>'select','options'=>$zone));
				echo $this->Form->input('Event.access',array('label'=>'Accès (Gratuit, payant, etc...) :')); 
				echo $this->Form->input('Event.start', array('id'=>'start','label' => 'Début de l\'événement','type'=>'text'));
				echo $this->Form->input('Event.stop', array('id'=>'stop','label' => 'Fin de l\'événement','type'=>'text'));
			?>
			
		
	</div>
	
	<div class="one-third column">
	<h1>Photo ou illustration</h1>
		
	
    <?php echo $this->Form->file('EventMedia.url'); ?>
    <?php echo $this->Form->input('EventMedia.link',array('label'=>'Lien du média (www.monsite.com) :'));  ?>
	<?php echo $this->Form->end('Envoyer'); ?> 	
	</div>
	<?php } else {  ?>
		<div class="sixteen columns">
			<center><span class="pink">Vous ne pouvez pas proposer plus d'un événement en 24H.</span></center>
			<center> Temps restant : <?php echo $restant; ?></center>
		</div>
	<?php } ?>
</div>	
		