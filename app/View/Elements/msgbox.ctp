
 <h3>Boîte de réception</h3>
                <div class="divider"></div>
<div class="sidebarWidget">
	<div class="row">
<?php 

	foreach($mailbox as $k=>$v){ 
		$v['MsgFile'] = 'je';
		$date = explode(' ',$v['Msg']['created']);
		$date = $date[0];
		$link = $this->Html->url(array('controller'=>'msgbox','action'=>'read','particulier'=>true,$v['Msg']['id']),true); 
		if($this->params['action']=='send'){
			$sender = $v['Msg']['users_name'];
		}else{
			$sender = $v['Msg']['sender_name'];
		} ?>



		


		<a href="<?php echo $link; ?>">
					<div class="col-lg-12">
						<div class="col-lg-1">
							<?php if($v['Msg']['read']==1){ echo '<span class="glyphicon glyphicon-envelope"></span>'; } ?>
							<?php if(!empty($v['MsgFile'])){ echo '<span class="glyphicon glyphicon-folder-open"></span>'; }  ?>
						</div>
						<div class="col-lg-2">
							
							<?php echo $sender; ?>
						</div>
						<div class="col-lg-7">
							<?php echo $v['Msg']['subject']; ?>
						</div>	
						
						<div class="col-lg-2">
							<?php echo $date; ?>
							<?php 
							echo $this->Html->link('Supprimer',array('controller'=>'msgbox','action'=>'delete',$v['Msg']['id']),array(),'Êtes-vous sûr de vouloir supprimer ce message ?'); 
							
								 echo $this->Html->link('Effacer',array('controller'=>'msgbox','action'=>'trash',$v['Msg']['id']),array(),'Envoyer ce message à la corbeille ?');  ?>
						</div>	
					</div>
		</a>

<?php } ?>
	</div>
</div>


