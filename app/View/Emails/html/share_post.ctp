<h1> Bonjour, <?php echo $usermail ?> souhaite partager cet article. </h1>





					<?php 
					
              if(isset($post['Media']['url'])){
              	$media = str_replace('.','_l.',$post['Media']['url']);
                echo $this->Html->image($media,array('width'=>730,'height'=>350)); 
              }
            ?>
				
						<table>
							<tr>
								<td>
									<h2><?php echo $post['Post']['title']; ?></h2>
									<?php echo $post['Post']['content']; ?><br><br><em>Le <?php echo $post['Post']['created']; ?></em>
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
						



