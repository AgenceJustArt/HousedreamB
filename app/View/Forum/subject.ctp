
		
<div class="box forum">
	<div class="title">
					<h2>Forum > <?php echo $forum; ?></h2>
					<div id="addPostForum">
						<span class="icon-white newsubject"></span>
						<?php echo $this->Html->link('Ouvrir un sujet',array('controller'=>'forum','action'=>'add')); ?>
					</div>
				</div>
				

				<?php foreach($subject as $k=>$v){
					
				?>	
				
					<div class="content">
						<table>
							<tr>
								<td>
									<span class="icon pagesubject"></span>
								</td>
								<td class="title"><b><?php 
								echo $this->Html->link($v['ForumSubject']['title'],array('controller'=>'forum','action'=>'view','id'=>$v['ForumSubject']['id'],'slug'=>$v['ForumSubject']['slug'])); 
								?></b><p><?php echo $v['ForumSubject']['content']; ?></p><br></td>
							</tr>
							<tr>
								<td>
									<span class="icon viewsubject"></span>
								</td>
								<td class="count">
									<ul>
										<li><b>Vues : </b><?php echo $v['ForumSubject']['view']; ?></li>
										<li><b><span class="icon responsesubject"></span> Réponses : </b><?php echo $v['ForumSubject']['answer']; ?></li>
										<li><b><span class="icon timesubject"></span> Dernier message : </b><?php echo $v['ForumSubject']['last_msg']; ?></li>
										<li><b><span class="icon authorsubject"></span> Autheur : </b><?php echo $v['User']['pseudo']; ?></li>
									</ul>
								</td>
							</tr>
						</table>
					</div>
					
				
				<?php } ?>
		
	

					</div>