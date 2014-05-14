

<div class="box forum">
		<div class="title">
				<?php $title = 'Forum > Ouvrir un sujet'; ?>
					<h2><?php echo $title; ?></h2>
				</div>



	<div class="content">
		<?php if($connect=="On"){ ?>
			<?php echo $this->Form->create('Forum'); ?>
		
			
			<b>Sujet :</b>
			<?php echo $this->Form->input('title',array('label'=>false)); ?>
			<b>Description :</b>
			<?php echo $this->Form->textarea('content'); ?>
			<br><br>
			<table>
				<tr>
					<td>
						<b>Espace forum :</b>
						<?php echo $this->Form->input('forums_id',array('options'=>$forum,'label'=>false)); ?>
					</td>
					<td>
						<b>Catégorie :</b>
						<?php echo $this->Form->input('categorys_id',array('options'=>$category,'label'=>false)); ?>
					</td>
				</tr>
			</table>
			<?php echo $this->Form->end('Ouvrir'); ?>
		<?php }else{ ?>
			Désolé vous devez être inscrit et connecté pour pouvoir déposer un sujet sur le forum. <?php echo $this->Html->link('Inscription', array('controller' => 'account', 'action' => 'signup')); ?> | <?php echo $this->Html->link('Connection', array('controller' => 'account', 'action' => 'login')); ?>
		<?php } ?>
	</div>
</div>