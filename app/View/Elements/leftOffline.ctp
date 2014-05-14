<!-- LES BLOCS DE GAUCHE -->
			
				<!-- BOX MEMBRE EN LIGNE -->
				<div class="box online">
					<div class="title"><h2>Nos membres / <?php echo $countMember; ?> membres inscrits</h2></div>
					<div class="content">
						<h3>Ils viennent de rejoindre la communauté :</h3>
						<p><?php echo $lastMember; ?></p>
						<!--
						<p>Lolo, Mindoux, Wuwuw51 , PetiteFleur, JeanYves52, lolita, Hebert43, Maximax, Heudebert87, Marilia90, Miki73, Mindoux, Maximax, PetiteFleur, JeanYves52, Enora54, Hebert43, Wuwuw51, Heudebert87, Marilia90</p>-->
					</div>
				</div>
				<!-- FIN DU BOX MEMBRE EN LIGNE -->

				<!-- BOX FONCTIONNALITÉ-->
				<div class="box tools">
					<div class="title"><h2>Les fonctionnalités</h2></div>
					<div class="content">
						<div id="tabs">
						  <ul>
						    <li><a class="profil" href="#tabs-1">Profil</a></li>
						    <li><a class="tchat" href="#tabs-2">Tchat</a></li>
						    <li><a class="message" href="#tabs-3">Message</a></li>
						    <li><a class="like" href="#tabs-4">Like</a></li>
						    <li><a class="calendar" href="#tabs-5">Calendrier</a></li>
						  </ul>
						  <div id="tabs-1">
						  	<div class="box-connect">
							    <ul>
							    	<li>Trouvez des membres qui vous correspondent</li>
							    	<li>Ajoutez-les à votre liste d'amis</li>
							    	<li>Gardez le contact à tout moment</li>
							    </ul>
						  	</div>
						  </div>
						  <div id="tabs-2">
						  	<div class="box-connect">
							    <ul>
							    	<li>Tchatez avec les membres en privé</li>
							    	<li>Rejoignez des salons de discussion par thème</li>
							    	<li>Envoyez des demandes de tchat par rendez-vous</li>
							    	<li>Échangez avec nos intervenants professionnels</li>
							    </ul>
						  	</div>
						  </div>
						  <div id="tabs-3">
						  	<div class="box-connect">
						    <ul>
						    	<li>Échangez par mail avec les autres membres</li>
						    	<li>Envoyez des messages à vos contacts même s'ils sont déconnectés</li>
						    	<li>Tenez-vous informé des nouveautés Sympathy World</li>
						    </ul>
						  	</div>
						  </div>
						  <div id="tabs-4">
						  	<div class="box-connect">
						    <ul>
						    	<li>Augmentez votre capital Sympathy en discutant avec les membres</li>
						    	<li>Attribuez vous-même des points de Sympathy aux autres membres</li>
						    	<li>Consultez votre capital Sympathy</li>
						    </ul>
						  	</div>
						  </div>
						  <div id="tabs-5">
						  	<div class="box-connect">
						    <ul>
						    	<li>Consultez le calendrier des événements Sympathy World</li>
						    	<li>Inscrivez-vous aux interventions de nos professionnels</li>
						    	<li>Souhaitez aux membres leur anniversaire</li>
						    </ul>
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
					<div class="content"><?php echo $this->Html->image('logosoutien.jpg'); ?></div>
				</div>
			
			<!-- FIN DES BLOCS DE GAUCHE -->