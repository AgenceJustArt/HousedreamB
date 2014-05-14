
 <?php $this->set('title_for_layout','Pays d\'Argonne - Les documents ressources d\'associations Argonnaises'); ?>
<div class="eleven columns">
				<div id="article">
				
                	<?php 
						if($data['title']){
					?>
                    	<h1 class="blue">Petites annonces - <?php echo $data['title']; ?></h1>
                    <?php	
					}else{
					?>
                    	<h1 class="blue">Petites annonces</h1>
                    <?php 
					}
					?>
					<?php $active = $data['active']; ?>
					
					<?php 
					
					foreach($data['document'] as $k=>$v):
					$v = $v['Annonce']
					?>
					<div id="articleItem">
						<h2><?php echo $v['name'];?></h2>
						<p><?php echo $this->Calendar->escape($v['content']); ?></p>
						<?php echo $this->Html->link('Voir l\'annonce',array('controller'=>'echange','action'=>'annoncelecture','slug'=>$v['slug'],'id'=>$v['id']),array('class'=>'blue')); ?> - <?php echo $this->Html->link('Voir l\'association',array('controller'=>'association','action'=>'index','id'=>$v['assos_id']),array('class'=>'blue')); ?> - Ajouté le <?php echo $this->Calendar->format($v['created']); ?> 
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
						
						if($active==$v['id']){
							 echo $this->Html->link('<div id="filter">'.$v['name'].'<span class="arrow-blue"></span></div>',array('controller'=>'echange','action'=>'annonce','id'=>$v['id']),array('class'=>'filter active','escape'=>false));
						}
						else{
						 echo $this->Html->link('<div id="filter">'.$v['name'].'<span class="arrow-blue"></span></div>',array('controller'=>'echange','action'=>'annonce','id'=>$v['id']),array('class'=>'filter','escape'=>false));
						}
				
						endforeach;				
					?>

                    <div class="barre"></div>
                    
					
                    
				</div>
				<div class="clear"></div>
			</div> 
			