
<?php echo $this->set('title_for_layout','Bienvenue en Pays d\'Argonne !'); ?>
<script> var lastid = '<?php echo $lastid; ?>'; </script>
<div class="twelve columns">
	
			
				<div id="TchatContent">
					


					<h1 class="green">Bienvenue sur le Tchat <?php //echo $user['pseudo']; ?></h1>
					<div class="message">

					<?php foreach($message as $k=>$v){
						$v = current($v);
						
						echo '<div class="box"><table><tr>'.
						'<td class="name">'.$user[$v['id_adherent']].' :</td>'.
						'<td class="text">'.$v['text_tchat_message'].'</td>'.
						'<td class="date">'.$v['date_tchat_message'].'</td></tr></table></div>';
					}?>
					</div>
					<?php echo $this->Form->create('Tchat'); ?>
						<?php echo $this->Form->hidden('pseudo',array('value'=>$adherent)); ?>
						<?php echo $this->Form->input('content',array('type'=>'textarea')); ?>
						
					<?php echo $this->Form->end("Valider"); ?>
				
				</div>
			
</div>  
		
 
	