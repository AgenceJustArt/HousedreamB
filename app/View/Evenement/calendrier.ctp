<div class="eleven columns">
				
				<?php 
					$date = $_GET['date'];
					$year = substr($date,0,4);
					$month = substr($date,4,2);
					if(substr($month,0,1)==0){
						$month = substr($month,1,1);
					}
					$month = $month-1;
					$day = substr($date,6,2);  
					if(substr($day,0,1)==0){
						$day = substr($day,1,1);
					}
					$tablemonth =  array('janvier','février','mars','avril','mail','juin','juiller','août','septembre','octobre','novembre','décembre');
					$title = 'Les événements du '.$day.' '.$tablemonth[$month].' '.$year;
				?>

			
				<div id="event">
					<h1 class="green"><?php echo $title; ?></h1>
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