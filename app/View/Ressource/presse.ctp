
 <?php $this->set('title_for_layout','Pays d\'Argonne - Les documents ressources d\'associations Argonnaises'); ?>
 
<div class="eleven columns">
				<div id="article">
					<h1 class="blue">Presse - <?php echo $data['title']; ?></h1>
					<?php 
					foreach($data['presse'] as $k=>$v): 
					$v = current($v);
					
	
					?>
					<div id="articleItem">
						<h2><?php echo $v['title'];?></h2>
						<p><?php echo $v['content']; ?></p>
                        <?php if(!empty($v['city'])){ ?>
                        <p><b class="blue">Ville : </b><?php echo $v['city']; ?></p>
                        <?php } ?>
                        <?php if(!empty($v['cp'])){ ?>
                        <p><b class="blue">Code postal : </b><?php echo $v['cp']; ?></p>
                        <?php } ?>
                        <?php if(!empty($v['phone'])){ ?>
                        <p><b class="blue">Téléphone : </b><?php echo $v['phone']; ?></p>
                        <?php } ?>
                        <?php if(!empty($v['mail'])){ ?>
                        <p><b class="blue">Mail : </b><?php echo $v['mail']; ?></p>
                        <?php } ?>
                        <?php if(!empty($v['web'])){ ?>
                        <p><b class="blue">Site web : </b><?php echo $v['web']; ?></p>
                        <?php } ?>
						<?php echo $this->Html->link($v['web'],$v['web'],array('class'=>'blue')); ?>Ajouté le <?php echo $v['created']; ?> 
					</div>
					<?php endforeach ?> 
					<div id="paginate"><?php $pagination = str_replace('|','',$this->Paginator->numbers()); echo $pagination; ?></div>
				</div>
</div>

<div class="five columns">
				<div id="search-doc">
                    <h1>Recherche rapide</h1>
                    <div class="round bg-blue">1</div><h3 class="blue">Les catégories de presses :</h3>
					<?php
					
						foreach($data['group'] as $k=>$v):
						$v = current($v);
						
						 echo $this->Html->link(
						'<div id="filter">'.$v['name'].'<p class="blue"></p><span class="arrow-blue"></span></div>',
						array('controller'=>'ressource','action'=>'presse',$v['id']),
						array('class'=>'filter','escape'=>false)
						);
				
						endforeach;				
					?>

                    <div class="barre"></div>
                    
					
                    
				</div>
				<div class="clear"></div>
			</div> 
			
		