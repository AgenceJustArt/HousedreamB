

<div class="box forum">
		<div class="title">
				<?php $title = 'Forum > '.$forum.' > '.$subject['title']; ?>
					<h2><?php echo $title; ?></h2>
				</div>
	<div class="content">
		<table>
							<tr>
								<td class="user-forum">
									<?php echo $subject['users_name']; ?><br>
									<?php echo $subject['created']; ?>
								</td>
							
								<td>
									<h2><?php echo $subject['title'];?></h2>
									<p><?php echo $subject['content'];?></p>
								</td>
							</tr>
						</table>				
	</div>
</div>

<?php foreach($answer as $k=>$v){  ?>
	<div class="box forum">
	<div class="content">
		<table>
							<tr>
								<td class="user-forum">
									<?php echo $v['user_name']; ?><br>
									<?php echo $v['created']; ?>
								</td>
							
								<td>
									
									<p><?php echo $v['content'];?></p>
								</td>
							</tr>
						</table>				
	</div>
</div>
<?php } ?>

<div class="box forum">
	<div class="content">
		<?php echo $this->Form->create('Forum'); ?>
		<?php echo $this->Form->hidden('forum_subject_id',array('value'=>$subject['forums_id'])); ?>
		<?php echo $this->Form->textarea('content'); ?>
		<?php echo $this->Form->end('Envoyer'); ?>
	</div>
</div>