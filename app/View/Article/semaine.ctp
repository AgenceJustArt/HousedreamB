 <?php $this->set('title_for_layout','Les articles d\'associations Argonnaises'); ?>
<div class="eleven columns">
				<div id="article">
					<h1 class="yellow">Actualités</h1>
					<?php foreach($post as $k=>$v): $v = current($v); ?>
					<div id="articleItem">
						<h2><?php echo $v['title'];?></h2>
						<p><?php echo $this->Calendar->escape($v['content']); ?></p>
						<?php echo $this->Html->link('Lire l\'article',array('controller'=>'article','action'=>'index','id'=>$v['id'],'slug'=>$v['slug']),array('class'=>'yellow')); ?> - le <?php echo $this->Calendar->format($v['created']); ?>  <span class="comment"><center><?php echo $v['count']; ?></center></span>
					</div>
					<?php endforeach ?> 
					<div id="paginate"><?php $pagination = str_replace('|','',$this->Paginator->numbers()); echo $pagination; ?></div>
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