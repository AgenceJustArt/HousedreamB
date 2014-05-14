



<div class="eleven columns">
		
				<div id="article">
					<h1 class="blue">Partenaire - <?php echo $data['d']['Part']['title'];?></h1>
					
					<?php $this->set('title_for_layout','Partenaires - '.$data['d']['Part']['title']);  ?>
					<h2><?php echo $data['d']['Part']['title']; ?></h2>
					<br />
					<div class="five columns alpha">
						<p><b class="blue">Adresse : </b><span id="adresslocation"><?php echo $data['d']['Part']['adress']; ?></span></p>
						<p><b class="blue">Ville : </b><?php echo ucfirst($data['d']['Part']['city']).' - '.$data['d']['Part']['cp']; ?></p>
						
					</div>
					<div class="five columns">
						<p><b class="blue">Téléphone : </b><?php echo $data['d']['Part']['phone']; ?></p>
						<p><b class="blue">Site internet : </b><?php echo $data['d']['Part']['web']; ?></p>
					</div>
					<div class="clear"></div>
                    	<p><b class="blue">Catégorie : </b><?php echo $data['d']['PartGroup']['name']; ?></p>
					
					<div id="map_canvas"></div>
					<p class="textIndex"><?php echo $data['d']['Part']['content']; ?></p>
					
					<?php if(!empty($data['d']['PartMedia']['url'])){ ?>
						<p class="imageIndex"><center><?php echo $this->Html->image($data['d']['PartMedia']['url']); ?></center></p>
					<?php } ?>
				
					
			
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
			
	