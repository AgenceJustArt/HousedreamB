

<div class="sixteen columns">
	<?php echo $this->element('menu_profil', array(
		"helptext" => "Oh, this text is very helpful."
	));?>
</div>

<div class="clear"></div>

<div id="profil">
	<?php if($timestamp){ ?>
	<div class="one-third column">
		<h1>Ajouter une actualité</h1>
		
	
		<?php echo $this->Form->create('Post',array('enctype' => 'multipart/form-data')); ?>
		
		<?php echo $this->Form->input('Post.title',array('class'=>'inline')); ?>
		<?php echo $this->Form->input('Post.content',array('id'=>'redactor')); ?> 
		<?php 
			foreach($category as $k=>$v){
				$v = current($v);
				$key = $v['id'];
				$valeur = $v['title'];
				$sizes[$key] = $valeur;		
			}
		?>
        <?php 
			echo $this->Form->input('Post.Post_categorys_id', array('label'=>'Catégorie :','options' => $sizes, 'default' => 'm')); 
		?>
			
		
	</div>
	
	<div class="one-third column">
	<h1>Photo ou illustration</h1>
		
	
    <?php echo $this->Form->file('PostMedia.url'); ?>
    <?php echo $this->Form->input('PostMedia.link',array('label'=>'Lien du média (www.monsite.com) :'));  ?>
	<?php echo $this->Form->end('Envoyer'); ?> 		
		
	</div>
	
	<div class="one-third column">
	
	</div>
	<?php } else {  ?>
		<div class="sixteen columns">
			<center><span class="pink">Vous ne pouvez pas proposer plus d'une actualité en 24H.</span></center>
			<center> Temps restant : <?php echo $restant; ?></center>
		</div>
	<?php } ?>
</div>	
		