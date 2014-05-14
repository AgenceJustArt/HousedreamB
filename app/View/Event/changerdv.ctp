
<?php $hour = array();
	for($i=0;$i<25;$i++){
		if(strlen($i)<2){
			$hour['0'.$i] = '0'.$i.'H';
		}else{
			$hour[$i] = $i.'H';
		}
		
	}
	for($i=0;$i<61;$i++){
		if(strlen($i)<2){
			$min['0'.$i] = '0'.$i.'';
		}else{
			$min[$i] = $i.'';
		}
		
	}
?>
<?php if($ajax){ ?>

<div class="box">
	<div class="title"><h2>Proposer un autre rendez-vous</h2></div>
	<div class="content">
		<div class="askCalendar">
						<?php 
							echo $this->Form->create('Ask',array('url'=>array('controller'=>'event','action'=>'changerdv',$ask['id']),'type'=>'file'));
							echo $this->Form->hidden('users_name',array('value'=>$user['pseudo']));
							echo $this->Form->hidden('users_id',array('value'=>$user['id']));
							echo $this->Form->hidden('sender_name',array('value'=>$sender['pseudo']));
							echo $this->Form->hidden('sender_id',array('value'=>$sender['id']));
						?>
						<table class="answer">
							<tr>
								<td class="label">Demande à : </td>
								<td><h2 class="<?php echo $user['sexe']; ?>"><?php echo ucfirst($user['pseudo']); ?></td>
							</tr>
							<tr>
								<td>Motif</td>
								<td><?php echo $this->Form->input('content',array('label'=>false,'value'=>$content)); ?></td>
							</tr>
							<tr>
								<td>Date et heure :</td>
								<td><?php echo $this->Form->input('date',array('label'=>false,'type'=>'text','id'=>'datepicker')); ?> à <?php echo $this->Form->input('hour',array('label'=>false,'options'=>$hour)); ?>:<?php echo $this->Form->input('min',array('label'=>false,'options'=>$min)); ?></td>
							</tr>
							
							<tr>
								<td></td>
								<td><?php echo $this->Form->end('Envoyer la proposition'); ?></td>
							</tr>
						</table>
							
							
						
					</div> 							
	</div>
</div>

<?php }else{ ?>
<div class="box">
	<div class="title"><h2>Proposer un autre rendez-vous</h2></div>
	<div class="content">
		<div class="askCalendar">
						<?php 
							echo $this->Form->create('Ask',array('url'=>array('controller'=>'event','action'=>'changerdv',$user['id']),'type'=>'file'));
							echo $this->Form->hidden('users_name',array('value'=>$user['pseudo']));
							echo $this->Form->hidden('users_id',array('value'=>$user['id']));
							echo $this->Form->hidden('sender_name',array('value'=>$sender['pseudo']));
							echo $this->Form->hidden('sender_id',array('value'=>$sender['id']));
						?>
						<table class="answer">
							<tr>
								<td class="label">Demande à : </td>
								<td><h2 class="<?php echo $user['sexe']; ?>"><?php echo ucfirst($user['pseudo']); ?></td>
							</tr>
							<tr>
								<td>Motif</td>
								<td><?php echo $this->Form->input('content',array('label'=>false)); ?></td>
							</tr>
							<tr>
								<td>Date et heure :</td>
								<td><?php echo $this->Form->input('date',array('label'=>false,'type'=>'text','id'=>'datepicker')); ?> à <?php echo $this->Form->input('hour',array('label'=>false,'options'=>$hour)); ?>:<?php echo $this->Form->input('min',array('label'=>false,'options'=>$min)); ?></td>
							</tr>
							
							<tr>
								<td></td>
								<td><?php echo $this->Form->end('Envoyer la proposition'); ?></td>
							</tr>
						</table>
							
							
						
					</div> 							
	</div>
</div>
			
	
			<!-- FIN DES BLOCS DE DROITE -->

			<?php } ?>

<script>
	$(function(){
		$( "#datepicker" ).datepicker({
			dateFormat: "yy-mm-dd",
			dayNamesMin: ['D','L','M','M','J','V','S'],
			monthNames: ["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Decembre"],
			prevText: "<",
			nextText: ">"
			
		});
	});




