<?php 
	
	$dialogMenu = AuthComponent::user('Dialog');
	$adherent = AuthComponent::user('Adherent');
	$semaine = array(
		'Dimanche',
		'Lundi',
		'Mardi',
		'mercredi',
		'Jeudi',
		'Vendredi',
		'Samedi'
	);
	$month = array(
	'01'=>'Janvier',
	'02'=>'Février',
	'03'=>'Mars',
	'04'=>'Avril',
	'05'=>'Mai',
	'06'=>'Juin',
	'07'=>'Juillet',
	'08'=>'Août',
	'09'=>'Septembre',
	'10'=>'Octobre',
	'11'=>'Novembre',
	'12'=>'Décembre'
);
?>


<!-- LES BLOCS DE DROITE -->
			
				<div class="box">
					<h2>Les interventions : </h2>
				</div>
				
				<?php foreach($event as $k=>$v){ $v=current($v); ?> 
				<div class="box event">
								<div class="validation" id="validation<?php echo $v['id']; ?>">
									Hello
								</div>
								<table class="event-list">
								
								<?php
									
									$date = explode(' ',$v['date']);
							    	
							    	$hour = $date[1];
							    	$hour = explode(':',$hour);
							    	$hour = $hour[0].'h'.$hour[1];

							    	$today = date('Y-m-d');
							    	if($today==$date[0]){
							    		$today = true;
							    	}else{
							    		$today = false;
							    	}
							    	
							    	$nameDay = strtotime($date[0]);
							    	$nameDay = date("w",$nameDay);
							    	$nameDay = $semaine[$nameDay];

							    	$date = explode('-',$date[0]);
							    	$date = array_reverse($date);
							    	//$date = implode('/',$date);
							    	$today = false;
							    	if($today){
							    		$date = 'Aujourd\'hui';
							    	}else{
							    		$date = $nameDay.'<span class="dayNumber">'.$date[0].'</span>'.$month[$date[1]];
							    	}
							    	$durationHour = floor($v['duration']/3600);
							    	$durationHour = str_pad($durationHour,2,'0',STR_PAD_LEFT);
							    	$durationMin = ($v['duration']%3600)/60;
							    	$durationMin = str_pad($durationMin,2,'0',STR_PAD_LEFT);
							    	$duration = $durationHour.':'.$durationMin;
								?>
									<tr>
										<td class="date"><center><?php echo $date; ?></center></td>
										<td class="sujet">Intervenant :<b><?php echo $v['username']; ?></b><br>Sujet : <b><?php echo $v['title']; ?></b></td>
										<td class="place">
											Horaire : <b><?php echo $hour; ?></b><br>
											Durée : <b><?php echo $duration; ?></b><br>
											<b><?php echo $v['place']-$v['buy']; ?> places restantes</b><br>
											<b>Accès :</b> 
											<?php if($v['pass']==0){ 
												echo 'Gratuit';
											}else{
												echo $v['pass'].' PASS';
											}
											?>
											<br>
											<a href="<?php echo $v['id']; ?>" class="blue">Je m'inscris ></a></td>
										
									</tr>
								
								</table>
				</div>
				<?php } ?>


	
			<!-- FIN DES BLOCS DE DROITE -->



<script>
$(function(){
	var eventBox = $('div.event a');
	eventBox.bind('click',function(){
		event.preventDefault();
		var validation = $(this).attr('href');
		$('div#validation'+validation).animate({right:'0px'},1000);
		
	});
});
</script>




