
<?php echo $this->set('title_for_layout','Bienvenue en Pays d\'Argonne !'); ?>
<div class="eleven columns">
			
				<div id="event">
					<h1 class="green">Bientôt en Argonne</h1>
					<?php 
						foreach($Event as $k=>$v): 
						$v = current($v); 
					?>
					<div id="eventItem">
						<div class="date-block bg-green"><?php echo $this->Calendar->find($v['start']); ?></div>
						<h2><?php echo $v['title'];?></h2>
						<p><?php echo $this->Calendar->escape($v['content']) ;?></p>
						<?php echo $this->Html->link("Lire l'évènement",array('controller'=>'evenement','action'=>'index','id'=>$v['id'],'slug'=>$v['slug']),array('class'=>'green')); ?> - le <?php echo $this->Calendar->format($v['created']); ?>  <span class="comment"><center><?php echo $v['count']; ?></center></span>
					</div>
					<?php endforeach ?>
					<div class="footer">
						<div class="barre-top"></div>
						<div class="block">
							Nombre d'événements : <span class="green"><?php echo $countEvent; ?></span><br />
							Nombre de commentaires : <span class="green"><?php echo $countCommentEvent; ?></span>
						</div>
						<div class="block dialog"><center class="green">Adhérer aux newletters</center></div>
						<div class="block"><?php echo $this->Html->link('<p>Toutes les événements</p>',array('controller'=>'evenement','action'=>'sommaire'),array('class'=>'next','escape'=>false)); ?></div>
						<div class="barre-bottom"></div>
					</div>
				</div>
			
				<div id="article">
					<h1 class="yellow">Actualités</h1>
					<?php foreach($Post as $k=>$v): $v = current($v); ?>
					<div id="articleItem">
						<h2><?php echo $v['title'];?></h2>
						<p><?php echo $this->Calendar->escape($v['content']) ;?></p>
						<?php echo $this->Html->link('Lire l\'article',array('controller'=>'article','action'=>'index','id'=>$v['id'],'slug'=>$v['slug']),array('class'=>'yellow')); ?> - le <?php echo $this->Calendar->format($v['created']); ?>  <span class="comment"><center><?php echo $v['count']; ?></center></span>
					</div>
					<?php endforeach ?> 
					<div class="footer">
						<div class="barre-top"></div>
						<div class="block">
							Nombre d'articles : <span class="yellow"><?php echo $countPost; ?></span><br />
							Nombre de commentaires : <span class="yellow"><?php echo $countCommentPost; ?></span>
						</div>
						<div class="block dialog"><center class="yellow">Adhérer aux newletters</center></div>
						<div class="block"><?php echo $this->Html->link('<p>Toutes les actualités</p>',array('controller'=>'article','action'=>'sommaire'),array('class'=>'next','escape'=>false)); ?></div>
						<div class="barre-bottom"></div>
					</div>
				</div>
				
				<div id="association">
					<h1 class="pink">Les dernières associations de l'annuaire</h1>
					<?php foreach($Asso as $k=>$v): $v = current($v); ?>
					<div id="assoItem">
						<h2><?php echo $v['name'];?></h2>
						<p><?php echo substr($v['content'],0,300).'...';?></p>
						<?php echo $this->Html->link('Voir l\'association',array('controller'=>'association','action'=>'index','id'=>$v['id'],'slug'=>$v['slug']),array('class'=>'pink')); ?> - le <?php echo $this->Calendar->format($v['created']); ?>  <span class="comment"><center></center></span>
					</div>
					<?php endforeach ?> 
					<div class="footer">
						<div class="barre-top"></div>
						<div class="block">
							Nombre d'associations : <span class="pink"><?php echo $countAsso; ?></span><br />
						</div>
						<div class="block dialog"><center class="pink">Adhérer aux newletters</center></div>
						<div class="block"><?php echo $this->Html->link('<p>Toutes les associations</p>',array('controller'=>'association','action'=>'sommaire'),array('class'=>'next','escape'=>false)); ?></div>
						<div class="barre-bottom"></div>
					</div>
				</div>
				
				
			</div>
			
			<div class="five columns">
				
                    <div id="my-slideshow-weather">
                        <ul class="bjqs">
                            <li><div class="weatherA" title="Sainte-Menehould"><br /><center><b>Sainte-Menehould</b></center></div></li>
                            <li><div class="weatherB" title="Vouziers"><br><center><b>Vouziers</b></center></div></li>
                            <li><div class="weatherC" title="Clermont-en-Argonne"><br /><center><b>Clermont-en-Argonne</b></center></div></li>
                        </ul>
                    </div>
					
				
                	<div class="clear"></div>
		
					<center>
                    <br />
                    <div class="barre-top-pub"></div>
                    <br />
                    <b class="green">Les dernières annonces</b>
                    <br /><br />
                    <div id="my-slideshow-annonce">
                        <ul class="bjqs">
                        	<?php 
								foreach($annonce as $k=>$v){			
								
							?>
                            	<li><a href="<?php echo $this->Html->url(array('controller'=>'echange','action'=>'annoncelecture','id'=>$v['Annonce']['id'],'slug'=>$v['Annonce']['slug']));?>"><b><?php echo $v['Annonce']['name']; ?></b><p><?php echo $v['Annonce']['content']; ?></p></a></li>
							<?php	
								} 
							?>
                        </ul>
                    </div>
					<div class="barre-top-pub"></div>
                    </center>
                    
                    <center>
                    <br />
                    <div id="my-slideshow-banniere">
                        <ul class="bjqs">
                        	<?php 
								foreach($banniere as $k=>$v){			
							?>
                            	<li><a href="<?php echo $v['Banniere']['link']; ?>"><?php echo $this->Html->image('banniere/'.$v['Banniere']['url']);?></a></li>
							<?php	
								} 
							?>
                        </ul>
                    </div>
					<div class="barre-top-pub"></div>
                    </center>
                    
                     <center>
                    <br />
                    <div id="my-slideshow-logo">
                        <ul class="bjqs">
                        	<?php 
								foreach($logo as $k=>$v){			
							?>
                            	<li><a href="<?php echo $v['Logo']['link']; ?>"><?php echo $this->Html->image('logo/'.$v['Logo']['url'],array('width'=>'180'));?></a></li>
							<?php	
								} 
							?>
                        </ul>
                    </div>
					<div class="barre-top-pub"></div>
                    </center>
				
			
			</div>    
	