


<!-- LES BLOCS DE DROITE -->
		
				<!-- BOX MEMBRE ET TCHAT-->
				<div class="box box-mail">
					<h2>Corbeille</h2>
					<div class="tableheader">
					<?php echo $this->Html->Link('< Retour à la boîte mail',array('controller'=>'msgbox','action'=>'index')); ?>
					</div>
					<div class="mailbox">
						<?php if($mailbox){ 
							echo $this->element('msgbox',array('mailbox'=>$mailbox,'trash'=>true,'index'=>false));
						}else{
						?>
								<tr>
									<td>Votre corbeille est vide</td>	
								</tr>
						<?php } ?>
						<?php echo $this->Paginator->numbers(); ?>
					</div>
						
				
				</div>
			
			<!-- FIN DES BLOCS DE DROITE -->








