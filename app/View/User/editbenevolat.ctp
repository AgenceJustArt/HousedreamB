
 <?php $this->set('title_for_layout','Pays d\'Argonne - Mon compte - Ajouter une recherche de bénévole'); ?>
<div class="sixteen columns">
	<?php echo $this->element('menu_profil', array(
		"helptext" => "Oh, this text is very helpful."
	));?>
</div>

<div class="clear"></div>

<div id="profil">
	<?php if($timestamp){ ?>
	<div class="one-third column">
		<h1>Ajouter une recherche de bénévole</h1>
		
	
		<?php echo $this->Form->create('Benevolat',array('enctype' => 'multipart/form-data')); ?>
		
		<?php echo $this->Form->input('Benevolat.title',array('label'=>'Titre de la recherche','class'=>'inline')); ?>
		<?php echo $this->Form->input('Benevolat.content',array('type'=>'textarea','label'=>'Description et informations','id'=>'redactor')); ?> 
		<?php 
			foreach($category as $k=>$v){
				$v = current($v);
				$key = $v['id'];
				$valeur = $v['name'];
				$sizes[$key] = $valeur;		
			}
		?>
        <?php 
			echo $this->Form->input('Benevolat.benevolat_groups_id', array('label'=>'Catégorie :','options' => $sizes, 'default' => 'm')); 
		?>
			<?php echo $this->Form->end('Envoyer'); ?> 
		
	</div>
    <div class="one-third column">
	
	</div>

	
	<div class="one-third column">
	
	</div>
	<?php } else {  ?>
		<div class="sixteen columns">
			<center><span class="pink">Vous ne pouvez pas proposer plus d'une recherche de bénévole en 24H.</span></center>
			<center> Temps restant : <?php echo $restant; ?></center>
		</div>
	<?php } ?>
</div>	
		