
<div class="eleven columns">
			

			
				<div id="article">
					<h1 class="yellow">Actualités</h1>
					<?php $id = $post['Post']['id']; ?>
					<?php $this->set('title_for_layout','Actualité - '.$post['Post']['title']);  ?>
					<h2><?php echo $post['Post']['title']; ?></h2>
					<p class="textIndex"><?php echo $post['Post']['content']; ?></p>
					<?php if(!empty($post['PostMedia']['url'])){ ?>
						<p class="imageIndex"><center><?php echo $this->Html->image($post['PostMedia']['url']); ?></center></p>
					<?php } ?>
				
					
					<div id="comment">
                    <h3 class="yellow">Commentaires :</h3>
                     <div class="barre"></div>
                     <span class="open-comment"><div class="round bg-yellow">+</div> <h3 class="yellow"> 
                     Ajouter un commentaire</h3></span>
                     <div id="newcomment">
						<?php 
                        $author = AuthComponent::User('pseudo');
                        
                        if(isset($author)){
                        ?>
                        <?php echo $this->Form->create('Post'); ?>
                            <?php echo $this->Form->hidden('posts_id',array('value'=>$id)); ?>
                            <?php echo $this->Form->hidden('author',array('value'=>$author)); ?>
                            <?php echo $this->Form->input('content',array('label'=>'')); ?>
                        <?php echo $this->Form->end("Commenter"); } 
						else { ?>
						<div id="connect-com" class="light-yellow">
							<center class="yellow">
							Pour ajouter un commentaire vous devez vous <span class=" yellow log-com">connecter ici</span><br />
							Si vous n'avez pas de compte <?php echo $this->Html->link('inscrivez-vous ici',array('controller'=>'user','action'=>'signup'),array('class'=>'yellow log-com')); ?>
						</div>	

						<?php }?>
					</div>
                     <div class="barre"></div>
					 
					<?php foreach($post['PostComment'] as $k=>$v): ?>
						<div class="commentItem <?php if($k%2==1){ echo 'impaire'; } else { echo 'paire';} ?>">
                        	<div class="content light-yellow">
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
			
			<div class="five columns">
				<div id="search-post">
                    <h1>Recherche rapide</h1>
                    <div class="round bg-yellow">1</div><h3 class="yellow">Les articles à venir :</h3>
                    <?php echo $this->Html->link(
						'<div id="filter">Les articles de la <span class="yellow">semaine...</span><span class="arrow-yellow"></span></div>',
						array('controller'=>'article','action'=>'semaine'),
						array('escape'=>false)
						);
					?>
                     <?php echo $this->Html->link(
						'<div id="filter">Les articles du <span class="yellow">week-end...</span><span class="arrow-yellow"></span></div>',
						array('controller'=>'article','action'=>'weekend'),
						array('escape'=>false)
						);
					?>
                     <?php echo $this->Html->link(
						'<div id="filter">Les articles du <span class="yellow">mois...</span><span class="arrow-yellow"></span></div>',
						array('controller'=>'article','action'=>'mois'),
						array('escape'=>false)
						);
					?>
                    <div class="barre"></div>
                    <div class="round bg-yellow">2</div><h3 class="yellow">Les articles par catégorie :</h3>
                    <?php echo $this->Form->create('null', array('url' => array('controller'=>'article','action'=>'categorie'),'type' => 'get')); ?>
                    <?php 
						foreach($category as $k=>$v){
							$v = current($v);
							$key = $v['id'];
							$valeur = $v['title'];
							$sizes[$key] = $valeur;		
						}
					?>
        			<?php echo $this->Form->input('PostCategory.id', array('options' => $sizes,'value'=>'Choisissez votre catégorie','label'=>'')); ?>
                    
                    <?php echo $this->Form->end('ok'); ?>
					<div class="barre"></div>
					<div class="round bg-yellow">3</div><h3 class="yellow">Les articles par date :</h3>
					<div id="calendar"></div>
                    
				</div>
				<div class="clear"></div>
			</div> 