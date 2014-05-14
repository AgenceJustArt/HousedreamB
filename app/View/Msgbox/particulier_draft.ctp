


<!-- LES BLOCS DE DROITE -->
			
				<!-- BOX MEMBRE ET TCHAT-->
				<div class="box box-mail">
					<h2>Vos brouillons</h2>
					<div class="tableheader">
					<?php echo $this->Html->Link('< Retour à la boîte mail',array('controller'=>'msgbox','action'=>'index')); ?>
					</div>
					<div class="mailbox">
						<?php if($mailbox){ 
							echo $this->element('msgbox',array('mailbox'=>$mailbox,'trash'=>false,'index'=>false));
						}else{
						?>
								<tr>
									<td>Vous n'avez pas de brouillon</td>	
								</tr>
						<?php } ?>
						<?php echo $this->Paginator->numbers(); ?>
					</div>
						
				
				</div>
		
			<!-- FIN DES BLOCS DE DROITE -->








