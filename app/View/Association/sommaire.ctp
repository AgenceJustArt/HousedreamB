
 <?php $this->set('title_for_layout','Les articles d\'associations Argonnaises'); ?>

<div class="eleven columns">
				<div id="article">
					<h1 class="pink">Associations</h1>
					<?php
					
					 
					foreach($association as $k=>$v): 
						$asso=$v['Association']; 
						
					?>
                    
					<div id="articleItem">
						<h2><?php echo $asso['name'];?></h2>
						<p><?php echo $this->Calendar->escape($asso['content']); ?></p>
						<?php echo $this->Html->link('Voir l\'association',array('controller'=>'association','action'=>'index','id'=>$asso['id'],'slug'=>$asso['slug']),array('class'=>'pink')); ?> - Ajouté le <?php echo $this->Calendar->format($asso['created']); ?> 
					</div>
					<?php endforeach ?> 
					<div id="paginate"><?php $pagination = str_replace('|','',$this->Paginator->numbers()); echo $pagination; ?></div>
				</div>
</div>

<div class="five columns">
				<div id="search-asso">
                    <h1>Recherche rapide</h1>
                    <div class="round bg-pink">1</div><h3 class="pink">Les thémes :</h3>
					<?php
						foreach($theme as $k=>$v):
						$v = current($v);
						
						 echo $this->Html->link(
						'<div id="filter">'.$v['name'].'<p class="pink">'.$v['content'].'</p><span class="arrow-pink"></span></div>',
						array('controller'=>'association','action'=>'theme','id'=>$v['id']),
						array('class'=>'filter','escape'=>false)
						);
				
						endforeach;				
					?>

                    <div class="barre"></div>
                    <div class="round bg-pink">2</div><h3 class="pink">Les zones géographiques :</h3>
					<div id="carte-menu">
                    <?php
						$zone = array('Ardennes','Marne','Meuse');
						echo '<center>'.
						$this->Html->link($zone[0],array('controller'=>'association','action'=>'zone','location'=>strtolower($zone[0])),array('class'=>'zone','escape'=>false)).
						' - '.
						$this->Html->link($zone[1],array('controller'=>'association','action'=>'zone','location'=>strtolower($zone[1])),array('class'=>'zone','escape'=>false)).
						' - '.
						$this->Html->link($zone[2],array('controller'=>'association','action'=>'zone','location'=>strtolower($zone[2])),array('class'=>'zone','escape'=>false)).
						'</center>';
						
					?>
					</div>
					<div id="zone">
						<div id="carte">
                        	  <?php
						
						echo $this->Html->link('',array('controller'=>'association','action'=>'zone','location'=>strtolower($zone[0])),array('class'=>'marne','escape'=>false));
						echo $this->Html->link('',array('controller'=>'association','action'=>'zone','location'=>strtolower($zone[1])),array('class'=>'ardenne','escape'=>false));
						echo $this->Html->link('',array('controller'=>'association','action'=>'zone','location'=>strtolower($zone[2])),array('class'=>'meuse','escape'=>false));
						
						?>
						</div>
					</div>
					
                    
				</div>
				<div class="clear"></div>
			</div> 
			
			<script>
				$('#filter center a.zone').hover(function(){
					var index = $(this).index();
					var top = -((index+1)*225);
					$("#carte").css("top",top);
				},
				function(){
					$("#carte").css("top",0);
				});
			</script>