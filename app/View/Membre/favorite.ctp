<?php 
	
	$dialogMenu = AuthComponent::user('Dialog');
	$adherent = AuthComponent::user('Adherent');
?>


<!-- LES BLOCS DE DROITE -->
			
				<!-- BOX MEMBRE ET TCHAT-->
				<div class="box tools">
					<div id="tabs-content">
						<!--
						  <ul class="content">
						    <li><a title="Les membres" class="hastip profil" href="#membre-content">Profil</a></li>
						    <li><a title="Tchat privé" class="hastip tchat" href="#tchat-content">Tchat</a></li>
						    <li><a title="Les salons" class="hastip salons" href="#salon-content">Salon</a></li>
						  </ul>
						-->


						  <!-- BOX MEMBRE -->
						  <div id="membre-content">
						  	<div class="content">
								<div class="box-membre">
								<?php 
									
									$genre = array('homme'=>'h','femme'=>'f'); 
									$day = date('d-m-Y');
									$connect = (time()-30);
								?>		

								
								<?php foreach($data as $k=>$v){ $v = $v['User']; ?>
									<div id="<?php echo $v['id'];?>" class="box-user">
										<div class="media">
										<?php 
											$media = explode('.',$v['media']);
											if(isset($media[0]) && isset($media[1])){
												$media = $media[0].'_s.'.$media[1];
												echo $this->Html->image($media,array('width'=>100));
											}else{
												$media = '';
												echo '<img src="" width="100">';
											}
												 
											
										?>
										</div>
										<div class="profil">
										<?php 
											echo '<h2 class="'.$v['sexe'].'">'.$v['pseudo'].'</h2>'; 
											echo '<div class="statut">';
											$translate = array(0=>'a',1=>'b',2=>'c',3=>'d',4=>'e',5=>'f',6=>'g',7=>'h',8=>'i',9=>'j',10=>'k');
											$like = $v['like_rate'];
											if($like<10){
												$like = 0;
											}elseif($like==100){
												$like = 10;
											}
											else{
												$like = substr($like,-2,1);
											}
											$like = $translate[$like];
											

											if($v['last_action']>$connect){
												echo '<div class="online">Online</div>';
											}
											echo '</div><br>';
											$lastAction = date('d-m-Y',$v['last_action']);
											
											echo '<b>';
											if($lastAction == $day){
												echo 'Dernière connexion : Aujourd\'hui';
											}
											else{
												echo 'Dernière connexion : '.$lastAction;
											}
											echo '</b>';

										?>
										<p><?php echo substr($v['situation'],0,80).'...'; ?></p>
											<div class="action">
												<?php echo $this->Html->link('',array('controller' => 'account', 'action' => 'more',$v['id']),array('id'=>$v['id'],'class'=>'link more hastip','title'=>'Voir le profil')); ?>
												<?php echo $this->Html->link('','#',array('id'=>$v['id'],'class'=>'link tchat hastip','title'=>'Tchater')); ?>
												<?php echo $this->Html->link('',array('controller' => 'msgbox', 'action' => 'send',$v['id']),array('id'=>$v['id'],'class'=>'link message hastip','title'=>'Envoyer un message')); ?>
												<?php echo $this->Html->link('',array('controller' => 'account', 'action' => 'addlike',$v['id']),array('id'=>$v['id'],'class'=>'link hastip like '.$like,'title'=>'Point de sympathy')); ?>
												<div class="list"><?php echo $this->Html->link('Favori',array('controller' => 'account', 'action' => 'addfavorite',$v['id']),array('id'=>$v['id'],'class'=>'favorite')); ?> | <?php echo $this->Html->link('Bloquer',array('controller' => 'account', 'action' => 'addblacklist',$v['id']),array('id'=>$v['id'],'class'=>'blacklist')); ?></div>
											</div>
										</div>
										
										
									</div>

								<?php 
								} 
								?>
								<div id="paginator">
								<?php echo $this->Paginator->numbers(); ?>
								</div>
								</div>

							</div>
						  </div>
						  <!-- FIN DU BOX MEMBRE-->
							
						</div>
						
						
				
				</div>
	
			<!-- FIN DES BLOCS DE DROITE -->








