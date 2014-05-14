

<div class="box article">
					<?php 
					
              if(isset($post['Media']['url'])){
              	$media = str_replace('.','_l.',$post['Media']['url']);
                echo $this->Html->image($media,array('width'=>730,'height'=>350)); 
              }
            ?>
					<div class="content">
						<table>
							<tr>
								<td>
									<h2><?php echo $post['Post']['title']; ?></h2>
									<?php echo $post['Post']['content']; ?><br><br><em>Le <?php 
						$Date = explode(' ',$post['Post']['created']);
						$Hour = end($Date);
						$Date = explode('-',$Date[0]);
						$Date = array_reverse($Date);
						$Date = implode('-',$Date); 
						echo $Date.' à '.$Hour;
					?></em>
									<h4>CATÉGORIES</h4>
									<p class="blue">
									
									<?php 
									$nbCategories = $post['Category'];
									foreach($post['Category'] as $category) { 
											echo $category['name'];
											if (next($nbCategories)) {
												echo ", ";
											}
										}
									?>
									</p>
									<h4>TAGS</h4>
									<p class="blue">
									<?php
									$tags = ''; 
									$countTags = count($post['Tag'])-1;
									foreach($post['Tag'] as $k=>$v) { 
										//$tags.= $this->Html->link($v['title'],array('controller'=>'mag','action'=>'tags',$v['slug']));
										$tags.= $v['title'];
										if($k!=$countTags){
											$tags.= ', ';
										}		
									}
									echo $tags;
									?></p>
									
									
								</td>
								<td>
									<?php if(AuthComponent::user()){ ?>
									<div id="article-tools">
									  <h3 class="article-love active">Ajouter à mes favoris</h3>
									  <div>
									    <p>
									    <?php echo $this->Html->link('Ajouter à mes favoris',array('controller'=>'account','action'=>'addlikepost',$post['Post']['id'])); ?>
									    </p>
									  </div>
									  <h3 class="article-msg">Partager à mes amis</h3>
									  <div>
									    <p>
									    	<?php echo $this->Form->create('Share',array('url'=>array('controller'=>'account','action'=>'sharepost',$post['Post']['slug'].'-'.$post['Post']['id']))); 
									    		echo $this->Form->input('mail');
									    		echo $this->Form->end('Partager');
									    	?>
									    
									    </p>
									  </div>
									</div>
									<?php } ?>

									<div class="share-article">
										<h4>Partager cet article</h4>
										<?php 
											$url = $this->Html->url();
											echo '<a target="_blank" href="http://www.facebook.com/sharer.php?u='.$url.'">'.$this->Html->image('social/facebook.png',array('width'=>32)).'</a>';
											echo '<a target="_blank" href="http://twitter.com/share?url='.$url.'&text='.$post['Post']['title'].'">'.$this->Html->image('social/twitter.png',array('width'=>32)).'</a>';
											echo '<a target="_blank" href="https://plus.google.com/share?url='.$url.'">'.$this->Html->image('social/google.png',array('width'=>32)).'</a>';
											echo '<a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url='.$url.'">'.$this->Html->image('social/linkedin.png',array('width'=>32)).'</a>';
											echo '<a href="">'.$this->Html->image('social/email.png',array('width'=>32)).'</a>';
										?>
									</div>
									
								</td>
							</tr>
						</table>
						<?php if(AuthComponent::user()){ ?>
							<table id="article-comment">	
								<tr>
									<td class="media"><?php echo $this->Html->image(str_replace('.','_s.',AuthComponent::user('media')),array('width'=>50,'height'=>50)); ?></td>
									<td><?php 
											echo $this->Form->create('Comment',array('url'=>array('controller'=>'account','action'=>'comment'))); 
											echo $this->Form->hidden('article',array('value'=>$post['Post']['id']));
											echo $this->Form->input('content',array('type'=>'textarea','label'=>false,'placeholder'=>'Ajouter un commentaire...'));
											echo $this->Form->end('Envoyer');
										?>
									</td>
								</tr>
							</table>
						<?php }else{ ?>
							<a href="#">Connectez-vous</a> pour commenter cet article.<br>
						<?php } ?>
						<table id="article-comment" class="list">
							<?php if(empty($comment)){
								echo 'Aucun commentaire';
							} ?>
							<?php foreach($comment as $k=>$v){ $v = current($v); ?>
							<tr>
								<td class="media"><?php echo $this->Html->image(str_replace('.','_s.',$v['thumbs']),array('width'=>50,'height'=>50)); ?></td>
								<td><?php echo $v['content'] ?></td>
							</tr>
							<?php } ?>
						</table>
					</div>
					
</div>



<script>
	$(function(){
		$( "#article-tools" ).accordion({
			heightStyle: "content",
			collapsible: true,
			active: false
		});

		$('table id#article-comment div.submit input').bind('click',function(){
			var id = $('input#CommentArticle').val();
			var message = $('textarea').val();
			$.post(url+'account/comment/'+id,{message:message},function(data){
				$('table.list').prepend(data.msg);
			},"json");
			$('textarea').val('');
			return false;
		});
	});

</script>