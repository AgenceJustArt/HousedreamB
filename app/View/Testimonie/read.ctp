

<div class="box testimonies">


						  		<table>
						  			<tr>
						  				<td width="120">
										    <?php 
												$media = explode('.',$user['media']);
												$media = $media[0].'_s.'.$media[1];
												echo $this->Html->image($media,array('width'=>100,'height'=>100));
											?>
										</td>
										<td>
											<h2><?php echo $user['pseudo']; ?></h2>
											<h4>Sa situation (ce qu'il ou elle vit) :</h4>
											<p><?php echo $user['situation']; ?></p>
											<h4>Ce qu'il ou elle recherche, ce qu'il ou elle attends</h4>
											<p><?php echo $user['waiting']; ?></p>
											<ul class="category">
												<?php foreach ($category as $k=>$v) {
													echo '<li>'.$v['name'].'</li>';
												}?>
											</ul>
											<br><br>
											<h2>Témoignage :</h2>
						<table>
							<tr>
								<td>
									<?php if(isset($data['Testimonie']['content'])){ ?>
									
									<?php echo $data['Testimonie']['content']; ?>
									
									
									
									<br><br>
									<p>
									<?php echo 'Créé le : '.$data['Testimonie']['created']; ?><br>
									<?php echo 'Modifié le : '.$data['Testimonie']['modified']; ?>
									</p>
									<br>
									Ce témoignage ne vous semble pas conforme ? <strong><?php echo $this->Html->link('Signaler un abus.', array('controller' => 'testimonie', 'action' => 'abus',$user['id'])); ?></strong>
									<?php }else{ ?>
										Ce membre n'a pas déposé de témoignage. Cependant vous aimeriez le lire, faite le lui savoir. <br>
										<strong><?php echo $this->Html->link('Effectuer une demande de témoignage', array('controller' => 'testimonie', 'action' => 'ask',$user['id'])); ?></strong>
										
									<?php } ?>
								</td>
								
							</tr>
						</table>
										</td>
									</tr>
								</table>
									
									
								
						
				
		
						
		
					
</div>

</div>


<script>
	$(function(){
		$( "#testimonies-tools" ).accordion({
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
