

<?php if($ajax){ ?>

<div class="box">
	<div class="title"><h2>Envoyer un message</h2></div>
	<div class="content">
		<div class="answer">
						<?php 
							echo $this->Form->create('Msg',array('url'=>array('controller'=>'msgbox','action'=>'send'),'type'=>'file'));
							echo $this->Form->hidden('users_name',array('value'=>$user['pseudo']));
							echo $this->Form->hidden('users_id',array('value'=>$user['id']));
							echo $this->Form->hidden('sender_name',array('value'=>$sender['pseudo']));
							echo $this->Form->hidden('sender_id',array('value'=>$sender['id']));
						?>
						<table class="answer">
							<tr>
								<td class="label">A</td>
								<td><?php echo ucfirst($user['pseudo']); ?></td>
							</tr>
							<tr>
								<td>Sujet</td>
								<td><?php echo $this->Form->input('subject',array('label'=>false)); ?></td>
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
</div>

<?php }else{ ?>
<!-- LES BLOCS DE DROITE -->
			
				<!-- BOX MEMBRE ET TCHAT-->
				


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
            	
                <?php if($mailbox){ 
							echo $this->element('msgbox',array('mailbox'=>$mailbox,'trash'=>false,'index'=>true));
						}else{
						?>
								<tr>
									<td>Boite mail vide</td>	
								</tr>
						<?php } ?>
                <ul class="pageList">
                    <li><a href="#">&lt;</a></li>
                    <li><a href="#" class="current">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&gt;</a></li>
                </ul>
            </div><!-- end row -->
            </div><!-- end col -->
        
            
        </div><!-- end row -->

    </div><!-- end container -->
</section>
<!-- end properties -->
		


					



	
			<!-- FIN DES BLOCS DE DROITE -->

			<?php } ?>


<?php echo $this->Paginator->numbers(); ?>



