<div class="four columns">	
				<div id="search-event">

					<div class="box">
						
	      
	                   <h3>Les événements à venir...</h3>
	                    
	                    <?php echo $this->Html->link(
							'<div id="filter"><span class="green">ce week-end ?</span><span class="arrow-green"></span></div>',
							array('controller'=>'evenement','action'=>'weekend'),
							array('escape'=>false)
							);
						?>
	                     <?php echo $this->Html->link(
							'<div id="filter"><span class="green">cette semaine ?</span><span class="arrow-green"></span></div>',
							array('controller'=>'evenement','action'=>'semaine'),
							array('escape'=>false)
							);
						?>
	                     <?php echo $this->Html->link(
							'<div id="filter"><span class="green">ce mois-ci ?</span><span class="arrow-green"></span></div>',
							array('controller'=>'evenement','action'=>'mois'),
							array('escape'=>false)
							);
						?>
	                    <div class="barre"></div>
                		<h3>Les événements par catégorie...</h3>
	                    
	                    <?php echo $this->Form->create('null', array('url' => array('controller'=>'evenement','action'=>'categorie'),'type' => 'get')); ?>
	                    <?php 
							foreach($category as $k=>$v){
								$v = current($v);
								$key = $v['id'];
								$valeur = $v['title'];
								$sizes[$key] = $valeur;		
							}
						?>
						<?php echo $this->Form->input('EventCategory.id', array('options' => $sizes,'value'=>'Choisissez votre catégorie','label'=>'')); ?>
	                    <?php echo $this->Form->end('ok'); ?>
					</div>

					<div class="box">
						<div class="barre"></div>
						<div class="round bg-green">3</div><h3 class="green">Les événements par date :</h3>
						<div id="calendar"></div>
					</div>
				
				</div>
			</div> 

		