<div class="sixteen column box">
	

		<?php 
			$i=1;
			$genre = array('homme'=>'h','femme'=>'f'); 
			$day = date('Y-m-d');
			$connect = date('Y-m-d H:i:s',time()-30);
		?>		

		<?php foreach($data as $k=>$v){ $v=current($v); ?>
			<div id="<?php echo $v['id_adherent'];?>" class="adherent cols<?php echo $i;?>">
				<div class="avatarSmall">
				<?php 
					if(!empty($v['avatar_adherent'])){  
						echo $this->Html->image('s/'.$v['avatar_adherent']); 
					}else{
						echo $this->Html->image('avatar_'.$genre[$v['sexe_adherent']].'.png'); 
					}
				?>
				</div>
				<div class="avatarName">
				<?php 
					echo $v['pseudo_adherent'].'<br>'; 
					$lastAction = explode(' ',$v['lastAction_adherent']);
					$lastAction = $lastAction[0];
					$active = 'inactive';
					if($v['lastAction_adherent']>$connect){
						echo 'Connecté';
						$active = 'active';
					}
					elseif($lastAction == $day){
						echo 'Dernière connexion : Ajourd\'hui';
					}
					else{
						echo 'Dernière connexion : '.$lastAction;
					}

				?>

				</div>
				<div class="clear"></div>
				<div class="avatarAction">
					<div class="tchat"><a class="<?php echo $active; ?>" href="tchat_<?php echo $v['id_adherent']; ?>">Tchat</a></div>
					<div class="write">Écrire</div>
					<div class="more">En savoir plus</div>
				</div>
			</div>

		<?php 
		$i++;
			if($i>3){ 
				$i=1;
				echo '<div class="clear"></div>';
			}
		} 
		?>
		<?php echo $this->Paginator->numbers(); ?>

</div>

<script>
	$(function(){
		$('.tchat a').live('click',function(){
				
					var id = $(this).attr('href').replace('tchat_','');
					
					
					if($(this).hasClass('inactive')){
						alert('Ce membre n\'est pas connecté');
						/*
						$('#area_info_membre').addClass('small');
						
						$('#lightbox_info_membre #get_info').empty().html('<div id="id_' + id + '" class="infos_adherent center"><h2 class="mrg_b_m center"><img src="<?php echo RESSOURCE_URL; ?>/images/logos/sympathy-world-white.png" alt="" /></h2>Ce membre est actuellement indisponible<br /><br />Vous pouvez le contacter directement<br />en lui envoyant un message via la messagerie interne.<br /><br /><div class="picto picto_email send_message" style="width:140px;margin:0 auto;"><a class="gnl_blue_light" href="">écrire un message</a></div></div>');
						$('#lightbox_info_membre').show();
						*/
					}
					else{
						
					
						
						var windowOpen = window.open('http://localhost:8888/finalsym/tchat/'+id,"tchat_"+id,'resizable=0,menubar=0,scrollbars=0,status=0,toolbar=0,width=600,height=550');
						windowOpen.focus();
						
						}
				
					return false;
				});
	});
</script>





