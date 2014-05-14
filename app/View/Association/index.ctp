
<div class="eleven columns">
	<div class="box">
				<div id="article">
					<h1 class="pink">Associations</h1>
					
					<?php $this->set('title_for_layout','Association - '.$d['Association']['name']);  ?>
					<h2><?php echo $d['Association']['name']; ?></h2>
					<br />
					<div class="five columns alpha">
						<p><b class="pink">Adresse : </b><span id="adresslocation"><?php echo $d['Association']['adress'].' '.$d['Association']['cp'].' '.$d['Association']['city']; ?></span><?php echo $d['Association']['adress']; ?></p>
						<p><b class="pink">Ville : </b><?php echo $d['Association']['cp'].' '.ucfirst($d['Association']['city']); ?></p>
						<p><b class="pink">Département : </b><?php echo ucfirst($d['Association']['zone']); ?></p>
					</div>
					<div class="five columns">
						<p><b class="pink">Téléphone : </b><?php echo $d['Association']['phone']; ?></p>
						<p><b class="pink">Site internet : </b><a href="<?php echo $d['Association']['web']; ?>"><?php echo $d['Association']['web']; ?></a></p>
						<p><button id="opener">Open Dialog</button></p>
					</div>
					<div class="clear"></div>
					
					<div id="map_canvas"></div>
					<p class="textIndex"><?php echo $d['Association']['content']; ?></p>
					
					<?php if(!empty($d['AssoMedia']['url'])){ ?>
						<p class="imageIndex"><center><?php echo $this->Html->image($d['AssoMedia']['url']); ?></center></p>
					<?php } ?>
				
					
					<div id="comment">
                     	<div class="barre"></div>
                     	<span class="open-comment"><div class="round bg-pink">+</div> 
						<h3 class="pink">Envoyer un message</h3></span>
                     	<div id="newcomment">
							<?php 
							$author = AuthComponent::User('pseudo');
							
							if(isset($author)){
							?>
							<?php echo $this->Form->create('Post'); ?>
								<?php echo $this->Form->hidden('posts_id',array('value'=>$id)); ?>
								<?php echo $this->Form->hidden('author',array('value'=>$author)); ?>
								<?php echo $this->Form->input('content',array('label'=>'')); ?>
							<?php echo $this->Form->end("Commenter"); } 
							else { ?>
	
							<?php }?>
						</div>
                     	<div class="barre"></div>
					</div>		
				</div>
	</div>
</div>
			
			<div class="five columns">
				<div class="box">
				<div id="search-asso">
                    <h1>Recherche rapide</h1>
                    <div class="round bg-pink">1</div><h3 class="pink">Les thémes :</h3>
					<?php
						foreach($theme as $k=>$v):
						$v = current($v);
						
						 echo $this->Html->link(
						'<div id="filter">'.$v['name'].'<p class="pink">'.$v['content'].'</p><span class="arrow-pink"></span></div>',
						array('controller'=>'association','action'=>'theme','id'=>$v['id']),
						array('class'=>'filter','escape'=>false)
						);
				
						endforeach;				
					?>

                    <div class="barre"></div>
                    <div class="round bg-pink">2</div><h3 class="pink">Les zones géographiques :</h3>
					<div id="carte-menu">
                    <?php
						$zone = array('Ardennes','Marne','Meuse');
						echo '<center>'.
						$this->Html->link($zone[0],array('controller'=>'association','action'=>'zone','location'=>strtolower($zone[0])),array('class'=>'zone','escape'=>false)).
						' - '.
						$this->Html->link($zone[1],array('controller'=>'association','action'=>'zone','location'=>strtolower($zone[1])),array('class'=>'zone','escape'=>false)).
						' - '.
						$this->Html->link($zone[2],array('controller'=>'association','action'=>'zone','location'=>strtolower($zone[2])),array('class'=>'zone','escape'=>false)).
						'</center>';
						
					?>
					</div>
					<div id="zone">
						<div id="carte">
                        	  <?php
						
						echo $this->Html->link('',array('controller'=>'association','action'=>'zone','location'=>strtolower($zone[0])),array('class'=>'marne','escape'=>false));
						echo $this->Html->link('',array('controller'=>'association','action'=>'zone','location'=>strtolower($zone[1])),array('class'=>'ardenne','escape'=>false));
						echo $this->Html->link('',array('controller'=>'association','action'=>'zone','location'=>strtolower($zone[2])),array('class'=>'meuse','escape'=>false));
						
						?>
						</div>
					</div>
					
                    
				</div>
				<?php echo $this->Html->link('Demander la mise en relation',array('controller'=>'association','action'=>'askrelation',$d['Association']['users_id'])); ?>
				<div class="clear"></div>
				</div>
			</div> 
			
			<div id="dialog" title="Basic dialog">
  <p>
  	<?php 
  		echo $this->Form->create(null,array('url'=>'/association/message'));
  		echo $this->Form->hidden('Mail.users_id',array('value'=>$d['Association']['users_id']));
  		echo $this->Form->hidden('Mail.sender',array('value'=>$d['Association']['users_id']));
  		echo $this->Form->input('Mail.subject');
  		echo $this->Form->textarea('Mail.content');
  		echo $this->Form->end('Envoyer');
  	?>

  </p>
</div>
<script>
  $(function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });
 
    $( "#opener" ).click(function() {
      $( "#dialog" ).dialog( "open" );
    });

  });
  </script>
	