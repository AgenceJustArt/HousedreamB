<div class="eleven columns">
			

			
				<div id="event">
					<h1 class="green">Les événements de la semaine en Argonne</h1>
					<?php 
						
						foreach($event as $k=>$v): 
						$v = current($v); 
					?>
					<div id="eventItem">
						<div class="date-block bg-green"><?php echo $this->Calendar->find($v['start']); ?></div>
						<h2><?php echo $v['title'];?></h2>
						<p><?php echo $this->Calendar->escape($v['content']); ?></p>
						<?php echo $this->Html->link("Lire l'évènement",array('controller'=>'evenement','action'=>'index','id'=>$v['id'],'slug'=>$v['slug']),array('class'=>'green')); ?> - le <?php echo $this->Calendar->format($v['created']); ?>  <span class="comment"><center><?php echo $v['count']; ?></center></span>
					</div>
					<?php endforeach; ?>
					<div id="paginate"><?php $pagination = str_replace('|','',$this->Paginator->numbers()); echo $pagination; ?></div>
				</div>
				
				
			</div>
			
			<?php echo $this->element('searchEvent', array(
    			"category" => $category
			)); ?>