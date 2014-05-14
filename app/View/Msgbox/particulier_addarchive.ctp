

<?php if($ajax){ ?>

<div class="box">
	<div class="title"><h2>Ajouté un dossier d'archive</h2></div>
	<div class="content">
		<div class="answer">
						<?php 
							echo $this->Form->create('Archive',array('url'=>array('controller'=>'msgbox','action'=>'addarchive')));
							echo $this->Form->input('name',array('label'=>'Dossier :'));
							
						?>
						<?php echo $this->Form->end('Ajouter'); ?>
							
							
						
					</div> 							
	</div>
</div>

<?php } ?>



