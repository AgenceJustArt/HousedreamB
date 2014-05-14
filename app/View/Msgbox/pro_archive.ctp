


<!-- LES BLOCS DE DROITE -->
			
				<!-- BOX MEMBRE ET TCHAT-->
				<div class="box box-mail">
					<h2>Messages reçus</h2>
					<div class="tableheader">
					<?php echo $this->Html->Link('Nouveau message',array('controller'=>'account','action'=>'mailwrite')); ?>
					</div>
					<div class="mailbox">
						<?php if($mailbox){ 
							echo $this->element('msgbox',array('mailbox'=>$mailbox,'trash'=>false,'index'=>false));
						}else{
						?>
								<tr>
									<td>Boite mail vide</td>	
								</tr>
						<?php } ?>
						<?php echo $this->Paginator->numbers(); ?>
					</div>
						
				
				</div>
		
			<!-- FIN DES BLOCS DE DROITE -->








