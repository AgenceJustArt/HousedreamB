		
		
	<div class="box forum">
		<div class="title">
					<h2>Forum</h2>
					<div id="addPostForum"><?php echo $this->Html->link('Ouvrir un sujet',array('controller'=>'forum','action'=>'add')); ?></div>
				</div>
				<?php foreach($forum as $k=>$v){
					$v = current($v);
				?>	
				
					<div class="content">
						<table>
							<tr>
								<td class="title"><b><?php 
								echo $this->Html->link($v['title'],array('controller'=>'forum','action'=>'subject','id'=>$v['id'],'slug'=>$v['slug'])); 
								?></b><p><?php echo $v['content']; ?></p></td>
								<td class="count">
									<b>Sujets : </b><?php echo $v['nb_subject']; ?><br>
									<b>Messages : </b><?php echo $v['nb_msg']; ?><br>
									<b>Dernier message : </b><?php echo $v['last_msg']; ?>
								</td>
							</tr>
						</table>
					
				</div>
				<?php } ?>
		
	</div>

					