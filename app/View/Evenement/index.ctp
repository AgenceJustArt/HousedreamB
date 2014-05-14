
<div class="twelve columns">
<div id="event">
	<div class="box">
					<h1 class="green">Evénement</h1>
                    
					<?php $id = $data['Event']['id']; ?>
					
					<?php 
						$event = $data['Event']; 
						$this->set('title_for_layout','Evénement - '.$event['title']); 
						$eventMedia = $data['EventMedia'];
					?>
					<div id="eventItem">
						<div class="date-block bg-green"><?php echo $this->Calendar->find($event['start']); ?></div>
						<h2><?php if(!empty($data['Event']['zone'])){ echo 'Côté '.ucfirst($data['Event']['zone']).' : ';} echo $event['title'];?></h2>
                       <?php $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>
						<a target="_blank"href="http://www.facebook.com/share.php?u=<?php echo $url; ?>" class="iconfacebook"></a>
                        <p><b class="green">Catégorie : </b><?php echo $data['EventCategory']['title']; ?></p>
                        <p><b class="green">Début : </b><?php echo $this->Calendar->fr($event['start']); ?>
						<?php if(isset($event['stop'])){ ?>
						 - <b class="green">Fin : </b><?php echo $this->Calendar->fr($event['stop']); ?></p>
						 <?php } ?>
                        <p><b class="green">Lieux : </b><?php echo $event['location']; ?></p>
                        <p><b class="green">Adresse : </b><span id="adresslocation"><?php echo $event['adress'].' '. $event['cp'].' '. $event['city']; ?></span><?php echo $event['adress']; ?></p>
                        <?php if(!empty($event['city'])){ ?>
                        <p><b class="green">Ville : </b><?php echo $event['city']; ?></p>
                        <?php } ?>
                        <?php if(!empty($event['cp'])){ ?>
                        <p><b class="green">Code postal : </b><?php echo $event['cp']; ?></p>
                        <?php } ?>
                        <?php if(!empty($event['zone'])){ ?>
                        <p><b class="green">Département : </b><?php echo $event['zone']; ?></p>
                        <?php } ?>
                        
                        <p><b class="green">Accès : </b><?php echo $event['access']; ?></p>
						<div id="map_canvas"></div>
						<p class="textIndex"><?php echo $event['content']; ?></p>
					<?php if(isset($eventMedia['url'])){ ?>
                    	<?php $link = explode('.',$eventMedia['link']); if($link[0]=='www'){ $eventMedia['link'] = 'http://'.$eventMedia['link']; } ?>
						<p class="imageIndex"><center><a href="<?php echo $eventMedia['link']; ?>"><?php echo $this->Html->image($eventMedia['url']); ?></a></center></p>
					<?php } ?>
					</div>
                    
					<div id="comment">
                    <h3 class="green">Commentaires :</h3>
                     <div class="barre"></div>
                     <span class="open-comment"><div class="round bg-green">+</div> <h3 class="green"> 
                     Ajouter un commentaire</h3></span>
                     <div id="newcomment">
						<?php 
                        $author = AuthComponent::User('pseudo');
                        
                        if(isset($author)){
                        ?>
                        <?php echo $this->Form->create('Event'); ?>
                            <?php echo $this->Form->hidden('events_id',array('value'=>$id)); ?>
                            <?php echo $this->Form->hidden('author',array('value'=>$author)); ?>
                            <?php echo $this->Form->input('content',array('label'=>'')); ?>
                        <?php echo $this->Form->end("Commenter"); } 
						else { ?>
						
						<div id="connect-com" class="light-green">
							<center class="green">
							Pour ajouter un commentaire vous devez vous <span class=" green log-com">connecter ici</span><br />
							Si vous n'avez pas de compte <?php echo $this->Html->link('inscrivez-vous ici',array('controller'=>'user','action'=>'signup'),array('class'=>'green log-com')); ?>
						</div>	
						<?php }?>
					</div>
                     <div class="barre"></div>
					<?php foreach($data['EventComment'] as $k=>$v): ?>
						<div class="commentItem <?php if($k%2==1){ echo 'impaire'; } else { echo 'paire';} ?>">
                        	<div class="content light-green">
								<p> <? echo $v['content']; ?></p>
							</div>
							<div class="title">
								<p><? echo $v['author']; ?> </p>
								<p class="datetime"> le <?php echo $this->Calendar->format($v['created']); ?> à <?php echo $this->Calendar->format($v['created'],true); ?></p>
							</div>
						</div>
					<?php endforeach ?>
					</div>				
				</div>
			
			</div>
				
			</div>
			
			<?php echo $this->element('searchEvent',array('category'=>$category)); ?>