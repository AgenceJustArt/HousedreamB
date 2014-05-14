
		
		
			
			
 <?php $this->set('title_for_layout','Pays d\'Argonne - Les documents ressources d\'associations Argonnaises'); ?>
 
<div class="eleven columns">
				<div id="article">
					<h1 class="blue">Lieux ressources - <?php echo $data['title']; ?></h1>
					<h2><?php echo $data['location']['Location']['title']; ?></h2>
					<div class="five columns alpha">
						<p><b class="blue">Adresse : </b><span id="adresslocation"><?php echo $data['location']['Location']['adress'].' '.$data['location']['Location']['cp'].' '.$data['location']['Location']['city']; ?></span><?php echo $data['location']['Location']['adress']; ?></p>
						<p><b class="blue">Ville : </b><?php echo $data['location']['Location']['cp'].' '.ucfirst($data['location']['Location']['city']); ?></p>

					</div>
					<div class="five columns">
						<p><b class="blue">Téléphone : </b><?php echo $data['location']['Location']['phone']; ?></p>
						<p><b class="blue">Site internet : </b><a href="<?php echo $data['location']['Location']['url']; ?>"><?php echo $data['location']['Location']['url']; ?></a></p>
					</div>
					<div class="clear"></div>
					
					<!--<div id="map_canvas"></div>-->
					<p class="textIndex"><?php echo $data['location']['Location']['content']; ?></p>
				</div>
</div>

<div class="five columns">
				<div id="search-doc">
                    <h1>Recherche rapide</h1>
                    <div class="round bg-blue">1</div><h3 class="blue">Les types de lieux :</h3>
					<?php
					
						foreach($data['group'] as $k=>$v):
						$v = current($v);
						
						 echo $this->Html->link(
						'<div id="filter">'.$v['name'].'<p class="blue"></p><span class="arrow-blue"></span></div>',
						array('controller'=>'ressource','action'=>'lieux',$v['id']),
						array('class'=>'filter','escape'=>false)
						);
				
						endforeach;				
					?>

                    <div class="barre"></div>
                    
					
                    
				</div>
				<div class="clear"></div>
			</div> 
			
	