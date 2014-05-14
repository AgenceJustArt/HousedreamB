<!-- start subheader -->
<section class="subHeader page">
    <div class="container">
    	<h1>Property Single</h1>
    	<form class="searchForm" method="post" action="#">
            <input type="text" name="search" value="Search our site" />
        </form>
    </div><!-- end subheader container -->
</section><!-- end subheader section -->

<div class="container">
	<div class="col-lg-12">
		<h1>Tableau de bord</h1>
	</div>
</div>



<div class="container">
	<div class="col-lg-12">
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

<div class="container">
	<div class="col-lg-4">
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
	<div class="col-lg-4">
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
	<div class="col-lg-4">
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
			


			
		
			
