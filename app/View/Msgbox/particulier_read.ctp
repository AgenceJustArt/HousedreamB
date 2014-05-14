


<!-- start subheader -->
<section class="subHeader page">
    <div class="container">
    	<h1>Agent Listing Grid Sidebar</h1>
    	<form class="searchForm" method="post" action="#">
            <input type="text" name="search" value="Search our site" />
        </form>
    </div><!-- end subheader container -->
</section><!-- end subheader section -->

<!-- start properties -->
<section class="properties">
    <div class="container">

        <div class="row">
        	<!-- START SIDEBAR -->
            <div class="col-lg-3 col-md-3">
                

                <?php echo $this->element('menu_msgbox'); ?>

                

                

            </div><!-- end col -->
            <div class="col-lg-9 col-md-9">
            <div class="row">
            	
          		
            	
                <div class="sidebarWidget">
                	<div class="row">
						<?php 
							if($mail['Msg']['sender_id']==$sender['id']){
								echo $this->Html->Link('Supprimer',array('controller'=>'msgbox','action'=>'delete',$mail['Msg']['id']));
							}else{
								echo $this->Html->Link('Répondre','#',array('class'=>'answer')).' | '.
								$this->Html->Link('Mettre dans la corbeille',array('controller'=>'msgbox','action'=>'trash',$mail['Msg']['id'])).' | '.
								$this->Html->Link('Supprimer',array('controller'=>'msgbox','action'=>'delete',$mail['Msg']['id']));
							} 
						?>
						
						</div>
						
						<div class="mailbox">
							<h2><?php echo $mail['Msg']['sender_name'].' à '.$mail['Msg']['users_name'].' le '; ?><?php 
						$Date = explode(' ',$mail['Msg']['created']);
						$Hour = end($Date);
						$Date = explode('-',$Date[0]);
						$Date = array_reverse($Date);
						$Date = implode('-',$Date); 
						echo $Date.' à '.$Hour;
					?></h2>
							<p><?php echo $mail['Msg']['content']; ?> </p>
							<br>
							<?php if($mail['MsgFile']){ ?>
							Les pièce jointes :
							
								<ul>
									
								<?php foreach($mail['MsgFile'] as $k=>$v){ 
									
									$v['size'] = 1876543;
									if(strlen($v['size']>6)){
										$size = $v['size']/1000000;
										$ext = 'Mo';
									}
									elseif(strlen($v['size']>3)){
										$size = $v['size']/1000;
										$ext = 'Ko';
									}
									elseif(strlen($v['size']>0)){
										$size = $v['size']/1;
										$ext = 'Octets';
									}
									
								?>
									<li><a href="/files/<?php echo $v['url'] ?>" target="_blank">
									<?php
										$currentFile = explode('/',$v['url']);
										$currentFile = end($currentFile);
										echo ucfirst($currentFile).'('.round($size,2).''.$ext.')'; 
									?>
									</a></li>
								<?php } ?>
								</ul>
							<?php } ?>
						</div>
						<div class="answer">
							<?php 
								echo $this->Form->create('Msg',array('url'=>array('controller'=>'msgbox','action'=>'send'),'type'=>'file'));
								echo $this->Form->hidden('users_name',array('value'=>$mail['Msg']['sender_name']));
								echo $this->Form->hidden('users_id',array('value'=>$mail['Msg']['sender_id']));
								echo $this->Form->hidden('sender_name',array('value'=>$sender['pseudo']));
								echo $this->Form->hidden('sender_id',array('value'=>$sender['id']));
							?>
							<table class="answer">
								<tr>
									<td class="label">A</td>
									<td><?php echo ucfirst($mail['Msg']['sender_name']); ?></td>
								</tr>
								<tr>
									<td>Sujet</td>
									<td><?php echo $this->Form->input('subject',array('label'=>false,'value'=>'RE : '.$mail['Msg']['subject'])); ?></td>
								</tr>
								<tr>
									<td></td>
									<td><?php echo $this->Form->textarea('content',array('label'=>false)); ?></td>
								</tr>
								<tr>
									<td></td>
									<td>Pièce jointe (2Mo max.): <?php echo $this->Form->file('files',array('label'=>false)); ?></td>
								</tr>
								<tr>
									<td></td>
									<td><?php echo $this->Form->end('Envoyer'); ?></td>
								</tr>
							</table>
								
								
							</div>
						</div>
   
            </div><!-- end row -->
            </div><!-- end col -->
        
            
        </div><!-- end row -->

    </div><!-- end container -->
</section>
<!-- end properties -->
		


					

		


					



<script type="text/javascript">
	$(function(){
		$('div.answer').hide();
		$('a.answer').bind('click',function(){
			$('div.answer').slideToggle('1000');
			return false;
		});
	});
</script>





