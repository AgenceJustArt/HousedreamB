
 <?php $id = $this->Session->read('Auth.User.id'); ?>
 <?php $this->set('title_for_layout','Pays d\'Argonne - Mon compte - Ajouter une petite annonce'); ?>
<div class="sixteen columns">
	<?php echo $this->element('menu_profil', array(
		"helptext" => "Oh, this text is very helpful."
	));?>
</div>

<div class="clear"></div>

<div id="profil">
	<?php if($timestamp){ ?>
	<div class="one-third column">
		<h1>Ajouter une petite annonce</h1>
		
	
		<?php echo $this->Form->create('Annonce',array('enctype' => 'multipart/form-data')); ?>
		
		<?php echo $this->Form->input('Annonce.name',array('label'=>'Titre de l\'annonce','class'=>'inline')); ?>
		<?php echo $this->Form->input('Annonce.content',array('label'=>'Description et informations','id'=>'redactor')); ?> 
		<?php 
			foreach($category as $k=>$v){
				$v = current($v);
				$key = $v['id'];
				$valeur = $v['name'];
				$sizes[$key] = $valeur;		
			}
		?>
        <?php 
			echo $this->Form->input('Annonce.annonce_groups_id', array('label'=>'Catégorie :','options' => $sizes)); 
		?>
			<?php echo $this->Form->end('Envoyer'); ?> 
		
	</div>
    <div class="one-third column">
	
	</div>
	
	<div class="one-third column">
	
	</div>
	<?php } else {  ?>
		<div class="sixteen columns">
			<center><span class="pink">Vous ne pouvez pas proposer plus d'une petite annonce en 24H.</span></center>
			<center> Temps restant : <?php echo $restant; ?></center>
		</div>
	<?php } ?>
</div>	
		