

<div class="box post">
					<?php 
              if(isset($post['Media']['url'])){
                $media = explode('.',$post['Media']['url']);
                $media = $media[0].'_m.'.$media[1];
                echo $this->Html->image($media); 
              }
            ?>
					<div class="content">
						<h2><?php echo $post['Post']['title']; ?></h2>
						<p><?php echo $post['Post']['content']; ?></p>
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
						<p class="blue"><?php 
						$nbTags = $post['Tag'];
						foreach($post['Tag'] as $tag) { 
								echo $tag['title'];
								if (next($nbTags)) {
									echo ", ";
								}
							}
						?></p>
					</div>
					<div class="info"><em>Le <?php 
						$Date = explode(' ',$post['Post']['created']);
						$Hour = end($Date);
						$Date = explode('-',$Date[0]);
						$Date = array_reverse($Date);
						$Date = implode('-',$Date); 
						echo $Date.' à '.$Hour;
					?></em></div>
					<div class="read">Lire la suite</div>
</div>

