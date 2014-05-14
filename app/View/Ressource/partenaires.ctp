
 <?php $this->set('title_for_layout','Pays d\'Argonne - Les documents ressources d\'associations Argonnaises'); ?>
 
<div class="eleven columns">
				<div id="article">
					<h1 class="blue">Partenaires - <?php echo $data['title']; ?></h1>
					<?php 
					foreach($data['part'] as $k=>$v): 
					$v = current($v);
					
	
					?>
					<div id="articleItem">
						<h2><?php echo $v['title'];?></h2>
						<p><?php echo $v['content']; ?></p>
						<?php echo $this->Html->link('Fiche du partenaire',array('controller'=>'ressource','action'=>'partenaire','id'=>$v['id'],'slug'=>$v['slug']),array('class'=>'blue')); ?> - Ajouté le <?php echo $v['created']; ?> 
					</div>
					<?php endforeach ?> 
					<div id="paginate"><?php $pagination = str_replace('|','',$this->Paginator->numbers()); echo $pagination; ?></div>
				</div>
</div>

<div class="five columns">
				<div id="search-doc">
                    <h1>Recherche rapide</h1>
                    <div class="round bg-blue">1</div><h3 class="blue">Les catégories de partenaires :</h3>
					<?php
					
						foreach($data['group'] as $k=>$v):
						$v = current($v);
						
						 echo $this->Html->link(
						'<div id="filter">'.$v['name'].'<p class="blue"></p><span class="arrow-blue"></span></div>',
						array('controller'=>'ressource','action'=>'partenaires',$v['id']),
						array('class'=>'filter','escape'=>false)
						);
				
						endforeach;				
					?>

                    <div class="barre"></div>
                    
					
                    
				</div>
				<div class="clear"></div>
			</div> 
			
		