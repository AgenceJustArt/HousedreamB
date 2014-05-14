
 <?php $this->set('title_for_layout','Pays d\'Argonne - Les echanges d\'associations Argonnaises - Bénévolat'); ?>
<div class="eleven columns">
				<div id="article">
					<h1 class="blue">Bénévolat - <?php echo $data['title']; ?></h1>
					<?php 
					
					foreach($data['document'] as $k=>$v):
					$v = $v['Benevolat']
					?>
					<div id="articleItem">
						<h2><?php echo $v['title'];?></h2>
						<p><?php echo $this->Calendar->escape($v['content']); ?></p>
						<?php echo $this->Html->link('Voir l\'association',array('controller'=>'association','action'=>'index','id'=>$v['assos_id']),array('class'=>'blue')); ?> - Ajouté le <?php echo $this->Calendar->format($v['created']); ?> 
					</div>
					<?php endforeach ?> 
					<div id="paginate"><?php $pagination = str_replace('|','',$this->Paginator->numbers()); echo $pagination; ?></div>
				</div>
</div>

<div class="five columns">
				<div id="search-doc">
                    <h1>Recherche rapide</h1>
                    <div class="round bg-blue">1</div><h3 class="blue">Les catégories :</h3>
					<?php
						foreach($data['group'] as $k=>$v):
						$v = current($v);
						
						 echo $this->Html->link(
						'<div id="filter">'.$v['name'].'<span class="arrow-blue"></span></div>',
						array('controller'=>'echange','action'=>'benevolat','id'=>$v['id']),
						array('class'=>'filter','escape'=>false)
						);
				
						endforeach;				
					?>

                    <div class="barre"></div>
                    
					
                    
				</div>
				<div class="clear"></div>
			</div> 
			