

<?php if($ajax){ ?>

<div class="box">
	<div class="title"><h2>Envoyer un message</h2></div>
	<div class="content">
		<div class="answer">
						<?php 
							echo $this->Form->create('Msg',array('url'=>array('controller'=>'msgbox','action'=>'send'),'type'=>'file'));
							echo $this->Form->hidden('users_name',array('value'=>$user['pseudo']));
							echo $this->Form->hidden('users_id',array('value'=>$user['id']));
							echo $this->Form->hidden('sender_name',array('value'=>$sender['pseudo']));
							echo $this->Form->hidden('sender_id',array('value'=>$sender['id']));
						?>
						<table class="answer">
							<tr>
								<td class="label">A</td>
								<td><?php echo ucfirst($user['pseudo']); ?></td>
							</tr>
							<tr>
								<td>Sujet</td>
								<td><?php echo $this->Form->input('subject',array('label'=>false)); ?></td>
							</tr>
							<tr>
								<td></td>
								<td><?php echo $this->Form->textarea('content',array('label'=>false)); ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Pièce jointe (2Mo max.): <?php echo $this->Form->file('files',array('label'=>false)); ?></td>
							</tr>
							<tr>
								<td></td>
								<td><?php echo $this->Form->end('Envoyer'); ?></td>
							</tr>
						</table>
							
							
						
					</div> 							
	</div>
</div>

<?php }else{ ?>
<!-- LES BLOCS DE DROITE -->
			
				<!-- BOX MEMBRE ET TCHAT-->
				<div class="box box-mail">
					<h2>Messages envoyés</h2>
					<div class="tableheader">
					<?php echo $this->Html->Link('< Retour à la boîte mail',array('controller'=>'msgbox','action'=>'index')); ?>
					</div>
					<div class="mailbox">
						<?php if($mailbox){ 
							echo $this->element('msgbox',array('mailbox'=>$mailbox,'trash'=>false,'index'=>false));
							debug($mailbox);
						}else{
						?>
								<tr>
									<td>Aucun message envoyé</td>	
								</tr>
						<?php } ?>
						<?php echo $this->Paginator->numbers(); ?>
					</div>
						
				
				</div>
	
			<!-- FIN DES BLOCS DE DROITE -->

			<?php } ?>






