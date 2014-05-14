<?php $d = $data['document']; ?>

		

<div class="eleven columns">
				<div id="article">
				
				
              	
                    	<h1 class="blue">Petites annonces - <?php echo $d['AnnonceGroup']['name']?></h1>
              <?php $active = $d['AnnonceGroup']['id']; ?>

					
					<?php  $id = $d['Annonce']['id']; ?>
					<?php $this->set('title_for_layout','Pays d\'Argonne - Les documents ressources d\'associations Argonnaises - '.$d['Annonce']['name']);  ?>
					<h2><?php echo $d['Annonce']['name']; ?></h2>
					<p class="textIndex"><?php echo $d['Annonce']['content']; ?></p><br />
					<em><?php echo $d['Association']['name']; ?></em>
					<?php if($d['Association']['id']!='0'){echo ' - '.$this->Html->link('Voir l\'association',array('controller'=>'association','action'=>'index','id'=>$d['Annonce']['assos_id']),array('class'=>'blue')); } ?> - Ajouté le <?php echo $this->Calendar->format($d['Annonce']['created']); ?>
					
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
		