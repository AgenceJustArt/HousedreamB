<div class="row">
	<div class="large-12 columns">
		<h1>Tableau de bord</h1>
	</div>
</div>

<div class="row">
	<div class="large-12 columns">
		<div id="dashboard">
			<ul class="large-block-grid-4" >
				<li>
					<center style="color:white;"><b><?php echo $HouseCount; ?></b><br>Maison créées</center>
				</li>
				<li>
					<center style="color:white;"><b>10</b><br>réponses proposées</center>
				</li>
				<li>
					<center style="color:white;"><b>345</b><br>relations</center>
				</li>
				<li>
					<center style="color:white;"><b><?php echo $MsgCount;?></b><br>nouveaux messages</center>
				</li>
			</ul>
		</div>
	</div>
	
</div>

<div class="row">
	<div class="large-4 columns">
		<div class="box shadow">
			<header><h3>Dernières réponses</h3></header>
			<section>
				<ul>
					<li><a href="#">Yves Damonte</a> vous propose un bien</li>
					<li><a href="#">Century 21</a> vous propose un bien</li>
					<li><a href="#">Orpi</a> vous propose un bien</li>
					<li><a href="#">Lafôret</a> vous propose un bien</li>
				</ul>
			</section>
			<footer>
				<a href="#">Voir toutes les réponses</a>
			</footer>
		</div>
	</div>
	<div class="large-4 columns">
		<div class="box shadow">
			<header><h3>Messagerie</h3></header>
			<section>
				<ul>
					<?php foreach($MsgLast as $k=>$v){
						$v = current($v);
						echo '<li>'.$this->Html->link('<b>'.$v['sender_name'].'</b><br>'.$v['subject'],array('controller'=>'msgbox','action'=>'read',$v['id']),array('escape'=>false)).'</li>';
					}?>
				</ul>
			</section>
			<footer>
				<?php echo $this->Html->link('Voir tous les messages',array('controller'=>'msgbox','action'=>'index','particulier'=>true)); ?>
			</footer>
		</div>
	</div>
	<div class="large-4 columns">
		<div class="box shadow">
			<header><h3>Relations</h3></header>
			<section>
				<ul>
					<li><a href="#"><b>Ménardie Valentin</b></a><br> souhaiterais être en relation</li>
					<li><a href="#"><b>Hody Julien</b></a><br> souhaiterais être en relation</li>
					<li><a href="#"><b>Alphonse Robert</b></a><br> souhaiterais être en relation</li>
					<li><a href="#"><b>Coutant Claire</b></a><br> souhaiterais être en relation</li>
				</ul>
			</section>
			<footer>
				<a href="#">Voir toutes vos relations</a>
			</footer>
		</div>
	</div>

</div>