
<?php $profil = AuthComponent::user(); ?>
<?php $month = array(
	'01'=>'janvier',
	'02'=>'février',
	'03'=>'mars',
	'04'=>'avril',
	'05'=>'mai',
	'06'=>'juin',
	'07'=>'juillet',
	'08'=>'août',
	'09'=>'septembre',
	'10'=>'octobre',
	'11'=>'novembre',
	'12'=>'décembre'
); ?>
<!-- LES BLOCS DE GAUCHE -->
			
				
				<!-- BOX FONCTIONNALITÉ-->
				<div class="box tools">
					<div class="title"><h2>Les fonctionnalités <span></span></h2></div>
					<div class="content">
						<div id="tabs">
						  <ul>
						    <li><a title="Profil" class="hastip profil" href="#tabs-1">Profil</a></li>
						    <li><a title="Rechercher un membre" class="hastip tchat" href="#tabs-2">Tchat</a></li>
						    <li><a title="Messagerie" class="hastip message" href="#tabs-3">Message</a></li>
						    <li><a title="Mes coups de coeur" class="hastip like" href="#tabs-4">Like</a></li>
						    <li><a title="Calendrier" class="hastip calendar" href="#tabs-5">Calendrier</a></li>
						    <li><a title="Mes badges" class="hastip badge" href="#tabs-6">Badge</a></li>
						    <li><a title="Les pass" class="hastip params" href="#tabs-7">PASS</a></li>
						  </ul>
						  <div id="tabs-1">
						  	<div class="box-connect profil">
						  		<table>
						  			<tr>
						  				<td width="120">
										    <?php 
												$media = explode('.',$profil['media']);
												$media = $media[0].'_s.'.$media[1];
												echo $this->Html->image($media,array('width'=>100,'height'=>100));
											?>
										</td>
										<td>
											<h2><?php echo $profil['pseudo']; ?></h2>
											Statut : <div class="online">Online</div> <!--<a id="changeStatut" href="#">Changer</a>--><?php echo $this->Html->link('Déconnexion',array('controller'=>'account','action'=>'logout')); ?><br>
											<?php //echo $this->Html->link('Mes favoris', array('controller' => 'membre', 'action' => 'favorite'),array('class'=>'favori')); ?>
											<?php //echo $this->Html->link('Ma blacklist', array('controller' => 'membre', 'action' => 'blacklist'),array('class'=>'blacklist')); ?>
											<?php echo $this->Html->link('<span></span>Modifier mon profil', array('controller' => 'account', 'action' => 'edit'),array('class'=>'edit','escape'=>false)); ?>
											<?php echo $this->Html->link('<span></span>Mon témoignage', array('controller' => 'account', 'action' => 'testimonie'),array('class'=>'edit','escape'=>false)); ?>

											
										</td>
									</tr>
								</table>
									<h4>Ma situation (ce que je vis) :</h4>
									<p><?php echo $profil['situation']; ?></p>
									<h4>Ce que je recherche, ce que j'attends</h4>
									<p><?php echo $profil['waiting']; ?></p>
									<ul class="category">
										<?php foreach ($profil['category'] as $k=>$v) {
											echo '<li>'.$v['name'].'</li>';
										}?>
									</ul>
									
								
							</div>
						  </div>
						  <div id="tabs-2">
						  		<?php
						  			if(isset($_GET['action'])){
						  				if($_GET['action']=='search'){
						  					$this->request->data['Search'] = $_GET;
						  				}
						  			}
						  		 ?>
						    	
						    	<div class="box-connect search">
						    		<?php //echo $this->Html->link('Accéder au tchat',array('controller' => 'membre', 'action' => 'index'),array('class'=>'go-tchat')); ?>
						    		<h2>Recherche avancée</h2>
						    		<?php 
						    			$last_connection = array('0'=>'Connexion indifférente','1'=>'Moins d\'une semaine','2'=>'Moins d\'un mois','3'=>'Moins de deux mois'); 
						    			$options_category[0] = 'Peu importe';
						    			foreach ($allCategory as $k=>$v) {
						    				$v = current($v);
											$options_category[$v['id']] = $v['name'];
										}
									?>
								<?php 
									echo $this->Form->create('Search',array('type'=>'get','url'=>array('controller'=>'membre','action'=>'index'))); 
									echo $this->Form->hidden('action',array('value'=>'search'));
								?>
						  		<table>
						  			<tr>
						  				<td width="95">Pseudo :</td>
										<td width="260"><?php echo $this->Form->input('pseudo',array('label'=>false)); ?></td>
									</tr>
									<tr>
						  				<td>Mots clés :</td>
										<td><?php echo $this->Form->input('situation',array('label'=>false,'type'=>'text')); ?></td>
									</tr>
									<tr>
						  				<td>Âge : <span class="born"><span></td>
										<td><?php echo $this->Form->hidden('born',array('label'=>false,'id'=>'amount')); ?><div id="slider-range"></div></td>
									</tr>
									<tr>
										<td>Sexe* :</td>
						    			<td><?php echo $this->Form->input('sexe',array('label'=>false,'legend'=>false,'options'=>array('A'=>'Peu importe','M'=>'Homme ','F'=>'Femme'),'type'=>'radio','value'=>'A')); ?>
											


 

						    			</td>
						    		</tr>
								</table>
								<table>
						  			<tr>
						  				<td width="95">Pays : </td>
										<td><?php echo $this->Form->input('country',array('label'=>false)); ?></td>
										<td class="right" width="85">Code postal :</td>
										<td><?php echo $this->Form->input('cp',array('label'=>false)); ?></td>
									</tr>
									<tr>
						  				<td>Avec photo :</td>
										<td><?php echo $this->Form->input('withMedia',array('label'=>false,'type'=>'checkbox')); ?></td>
										<td class="right">Connectés :</td>
										<td><?php echo $this->Form->input('connected',array('label'=>false,'type'=>'checkbox')); ?></td>
									</tr>
								</table>
								<table>
						  			<tr>
						  				<td width="160">Dernière connexion :</td>
										<td><?php echo $this->Form->input('last_connection',array('label'=>false,'options'=>$last_connection)); ?></td>
									</tr>
									<tr>
						  				<td width="160">Sa situation :</td>
										<td><?php echo $this->Form->input('category',array('label'=>false,'options'=>$options_category)); ?></td>
									</tr>
								</table>
								<?php echo $this->Form->end('Rechercher'); ?>
									
								
							</div>
						  </div>

						  <div id="tabs-3">
						  	<div class="msgbox">

							    <ul class="msgbox">
							    	<li class="index"><span></span><?php echo $this->Html->link('Boîte de réception', array('controller' => 'msgbox', 'action' => 'index'));?></li>
							    	<li class="draft"><span></span><?php echo $this->Html->link('Brouillon', array('controller' => 'msgbox', 'action' => 'draft'));?></li>
							    	<li class="send"><span></span><?php echo $this->Html->link('Messages envoyés', array('controller' => 'msgbox', 'action' => 'send'));?></li>
							    	<li class="trash"><span></span><?php echo $this->Html->link('Corbeille', array('controller' => 'msgbox', 'action' => 'trash'));?></li>
							    	
							    </ul>
							    <ul class="msgbox">
							    	<li class="archive"><span></span>Archive <?php echo $this->Html->link('Ajouter',array('controller'=>'msgbox','action'=>'addarchive'),array('class'=>'addarchive')); ?></li>
							    	<?php if(isset($archive)){ foreach($archive as $k=>$v){ $v = current($v); ?>	
							    	<li class="subarchive">
							    		<?php echo $this->Html->link($v['title'], array('controller' => 'msgbox', 'action' => 'archive',$v['id'])); ?>
							    		<?php echo $this->Html->link('Suppr',array('controller'=>'msgbox','action'=>'deletearchive',$v['id']),array(),'Êtes-vous sûr de vouloir supprimer cette archive ?');?></li>
							    	<?php }}else{ ?>
							    	<li>Vous n'avez pas d'archive</li>
							    	<?php } ?>	
							    </ul>
							</div>
						  </div>
						  <div id="tabs-4">
						  		<div class="love">

						  			<div id="tabs-love">
									  	<ul>
									    	<li><a href="#tabs-love-1">Amis</a></li>
									    	<li><a href="#tabs-love-2">Article</a></li>
									    	<li><a href="#tabs-love-3">Forum</a></li>
									    	<li><a href="#tabs-love-4">Points de sympathy</a></li>
									  	</ul>
						  			
							  			<!-- SECTION LAST FRIEND -->
							  			<div id="tabs-love-1">
							  				<?php echo $this->Html->link('Voir tous vos amis >',array('controller'=>'membre','action'=>'favorite')); ?>
									  		<table class="favori">
									  			<?php foreach($favoriLove as $k=>$v){ ?>
										  			<tr>
										  				<td><?php echo $this->Html->image(str_replace('.','_s.',$v['media']),array('width'=>32)); ?></td>
										  				<td>
										  					<h2 class="<?php echo $v['sexe']; ?>">
										  						<?php echo $v['pseudo']; ?>
										  					</h2> - 
										  					<?php  
										  						$day = date('d-m-Y');
											  					if($v['last_action']>$connect){
																	echo '<div class="online">Online</div>';
																}
																//echo '</div><br>';
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
										  				<br>
										  					<?php echo $this->Html->link('Discuter',array('controller'=>'','action'=>'')); ?>
										  					|
										  					<?php echo $this->Html->link('Proposer un rendez-vous',array('controller'=>'event','action'=>'ask',$v['id']),array('id'=>'askCalendar')); ?>
										  					|
										  					<?php echo $this->Html->link('Retirer de mes amis',array('controller'=>'account','action'=>'deletefavorite',$v['id'])); ?>
										  				</td>
										  			</tr>
									  			<?php } ?>
									  		</table>
									  	</div>
							  		
								  		<!-- SECTION LAST ARTICLE -->
								  		<div id="tabs-love-2">
									    	<table class="post">
									  			<?php foreach($postFavori as $k=>$v){ ?>
										  			<tr>
										  				
										  				<td>
										  					<h2 class="">
										  						<?php echo $v['title']; ?>
										  					</h2><br>
										  					
										  					<?php echo $this->Html->link('Discuter',array('controller'=>'','action'=>'')); ?>
										  					|
										  					<?php echo $this->Html->link('Proposer un rendez-vous',array('controller'=>'','action'=>'')); ?>
										  					|
										  					<?php echo $this->Html->link('Retirer de mes amis',array('controller'=>'account','action'=>'deletefavorite',$v['id'])); ?>
										  				</td>
										  			</tr>
									  			<?php } ?>
									  		</table>
								    	</div>
							  		
								  		<!-- SECTION LAST SUIVI FORUM -->
								  		<div id="tabs-love-3">
								  			<h4>Les derniers sujets que vous suivez sur le forum :</h4>
									    	<table class="subject">
									    		
									  			<?php foreach($forumLove as $k=>$v){ ?>
										  			<tr>
										  				<td><span class="icon pagesubject"></span></td>
										  				<td>
										  					<p>
										  						<?php echo $v['title']; ?>
										  					</p>
										  					<?php echo $this->Html->link('Voir le sujet ',array('controller'=>'forum','action'=>'view','id'=>$v['id'],'slug'=>$v['slug'])); ?>
										  					|
										  					<?php echo $this->Html->link(' Me désinscrire',array('controller'=>'forum','action'=>'unsubscribe',$v['id'])); ?>
										  					
										  				</td>
										  				
										  			</tr>
									  			<?php } ?>
									  		</table>
								    	</div>

								    	<!-- SECTION SYMPATHY POINT -->
								  		<div id="tabs-love-4">
									    	<p>Vous avez accordé <?php echo $profil['likegive_rate']; ?> point<?php if($profil['likegive_rate']>1){ echo 's';}?> de "Sympathy" sur 100<br>Il vous reste <?php echo 100-$profil['likegive_rate']; ?> points à accorder</p>
							    	<p>Votre niveau de "Sympathy" est de <?php echo $profil['likeme_rate']; ?></p>
								    	</div>
								    </div>

							    	
							    	<!--<p>Grâce à vous Sympathy World a reversé à ce jour 0€ aux associations partenaires</p>-->
						    	</div>
						  </div>
						  <div id="tabs-5">
						  	<div class="calendar">
							  	<h2>Votre calendrier</h2>
							  	
							  	<?php 
								 /* 	
								 echo $this->Html->link('Voir les événements',array(
							  		'controller'=>'event',
							  		'action'=>'index'
							  	)); 
							  	*/
							  	?>
							    <?php 
							    $htmlCalendar = array('SPEECH'=>'','RDV'=>'');
							    foreach ($calendar as $k=>$v) {
							    	$v = current($v);
							    	$date = explode(' ',$v['date']);
							    	
							    	$hour = $date[1];
							    	$hour = explode(':',$hour);
							    	$hour = $hour[0].'h'.$hour[1];

							    	$today = date('Y-m-d');
							    	if($today==$date[0]){
							    		$today = true;
							    	}else{
							    		$today = false;
							    	}

							    	$date = explode('-',$date[0]);
							    	$date = array_reverse($date);
							    	$date = implode('/',$date);
							    	if($today){
							    		$date = 'Aujourd\'hui';
							    	}else{
							    		$date = 'Le '.$date;
							    	}

							    	$htmlCalendar[$v['type']].='<li><em>'.$date.' à '.$hour.'</em><br>'.$v['content'].'</li>';
							    } ?>
							    
							    <div id="tabs-calendar">
									<ul>
									   	<li><a href="#tabs-calendar-1">Interventions</a></li>
									   	<li><a href="#tabs-calendar-2">Vos rendez-vous</a></li>
									   	<li><a href="#tabs-calendar-3">Demandes en cours</a></li>
									</ul>
									<div id="tabs-calendar-1">
										<ul class="calendar">
											<?php echo $htmlCalendar['SPEECH']; ?>
										</ul>
									</div>
									<div id="tabs-calendar-2">
										<ul class="calendar">
											<?php echo $htmlCalendar['RDV']; ?>
										</ul>
									</div>
									<div id="tabs-calendar-3">
										<b>Reçues</b>
										<ul class="calendar ask">

											<?php foreach($askCalendar as $k=>$v){
												$v = current($v);
												$askDate = explode(' ',$v['date']);
												$askHour = end($askDate);
												$askDate = explode('-',$askDate[0]);
												$askDate = array_reverse($askDate);
												$askDate = implode('-',$askDate);

												echo 'De <h2 class="'.$v['sender_sexe'].'">'.$v['sender_name'].'</h2> pour le <b>'.$askDate.'</b> à <b>'.$askHour.'</b><br>';
												echo $this->Html->link('Accepter', array('controller'=>'event', 'action' =>'acceptrdv',$v['id'])).' | ';
												echo $this->Html->link('Refuser', array('controller' => 'event', 'action' => 'refuserdv',$v['id'])).' | ';
												echo $this->Html->link('Proposer une autre date', array('controller' => 'event', 'action' => 'changerdv',$v['id']),array('id'=>'changeAskCalendar')).'<br>';
												
											} ?>
										</ul>
										<br>
										<b>Envoyées</b>
										<ul class="calendar ask">
											<?php  foreach($senderCalendar as $k=>$v){
											
												$v = current($v);
												$senderDate = explode(' ',$v['date']);
												$senderHour = end($senderDate);
												$senderDate = explode('-',$senderDate[0]);
												$senderDate = array_reverse($senderDate);
												$senderDate = implode('-',$senderDate);
												echo 'À <h2 class="'.$v['sender_sexe'].'">'.$v['users_name'].'</h2> pour le <b>'.$senderDate.'</b> à <b>'.$senderHour.'</b><br>';
												echo 'Etat : En attente | ';
												echo $this->Html->link('Annuler', array('controller' => 'event', 'action' =>'cancelrdv',$v['id'])).'<br>';
												
												
											} ?>
										</ul>
										
									</div>
								</div>
							    
							    
							</div>
						  </div>
						  <div id="tabs-6">
						  	<div class="badge">
							  	<h2>Mes derniers badges obtenus</h2>
							  	<?php echo $this->Html->link('Voir mes badges',array(
							  		'controller'=>'account',
							  		'action'=>'badge'
							  	)); ?>
							  	<br>
							  	
							</div>
						  </div>
						  
						   <div id="tabs-7">
						  	<div class="pass">
							  	<h2>Vos pass</h2>
							  	<?php echo $this->Html->link('Acheter des pass',array(
							  		'controller'=>'account',
							  		'action'=>'getpass'
							  	)); ?>
							  	<br>
							  	Vous avez <?php //echo $profil['pass']; ?>
							</div>
						  </div>
						</div>
					</div>
				</div>

				<!-- FIN DU BOX FONCTIONNALITÉ -->

				<!-- BOX RÉSEAUX -->
				<div class="box network">
					<div class="title"><h2>Le réseau sympathy</h2></div>
					<div class="content">
						<!--Conseiller ce site à un ami-->

						
						<h5>Suivez-nous et partagez sur :</h5>
						<ul id="network">
							<?php 
								$socialnetwork = array(
									'facebook'=>'https://www.facebook.com/SympathyWorld',
									'twitter'=>'https://twitter.com/SympathyWorld',
									'google'=>'https://plus.google.com/117422198814436023866/posts?hl=fr'
								);
							?>

							<?php foreach($socialnetwork as $k=>$v){ ?>
								<li><a href="<?php echo $v; ?>" target="_blank"><?php echo $this->Html->image('social/'.$k.'.png',array('width'=>32)); ?></a></li>
							<?php } ?>
						</ul>

					</div>
				</div>
				<!-- FIN DU BOX RÉSEAUX -->

				<!-- BOX RÉSEAUX -->
				<div class="box">
					<div class="title"><h2>Sympathy World soutient leurs actions</h2></div>
					<div class="content"><?php echo $this->Html->image('logosoutien.jpg',array('width'=>415,'height'=>100)); ?></div>
				</div>
			
			<!-- FIN DES BLOCS DE GAUCHE -->

			<script>
				$(function(){
					$( "#slider-range" ).slider({
				      range: true,
				      min: 18,
				      max: 100,
				      values: [ 18, 80 ],
				      slide: function( event, ui ) {
				        $( "#amount" ).val(ui.values[ 0 ] + "-" + ui.values[ 1 ]+'' );
				        $( "span.born" ).text(ui.values[ 0 ] + "-" + ui.values[ 1 ]+' ans' );
				      }
				    });
    				$( "#amount" ).val($( "#slider-range" ).slider( "values", 0 )+"-" + $( "#slider-range" ).slider( "values", 1 )+'' );
    				$( "span.born" ).text($( "#slider-range" ).slider( "values", 0 )+"-" + $( "#slider-range" ).slider( "values", 1 )+' ans' );
				});

			</script>