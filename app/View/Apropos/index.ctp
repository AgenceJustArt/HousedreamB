
<?php echo $this->set('title_for_layout','Bienvenue en Pays d\'Argonne !'); ?>
<div class="eleven columns">
	<br />
	<b><span class="green">PAYS D'ARGONNE,</span> une association <span class="green">100%</span> Argonnaise au service des associations de son territoire.</b>
    <br /><br />
    <h3 class="pink arrow-pink-left">Pourquoi ?</h3>
    <br />
    <ul class="list">
    	<li>Pour soutenir la vie associative</li>
        <li>Pour favoriser les collaborations</li>
        <li>Pour échanger, dialoguer</li>
        <li>Pour améliorer la qualité des services</li>
        <li>Pour réduire certains coûts</li>
        <li>Pour peser lourd</li>
    </ul>
    <br /><br />
    <h3 class="green arrow-green-left">Comment ?</h3>
    <br />
    <ul class="list">
    	<li>Par des réflexions et des pratiques :<br /><em>Rencontres associatives, tables rondes, groupe d’échanges, …</em></li>
        <li>Par des moyens techniques :<br /><em>Matériel technique, ou bureautique, logiciels, stands,…</em></li>
        <li>Par des compétences :<br /><em>Echange de savoirs, formations, mutualisation du bénévolat,…</em></li>
        <li>Par de l’information, des ressources :<br /><em>Support de communication, sites internet, publications, centre de ressources,…</em></li>
        <li>Par du service :<br /><em>Offres d’emploi, petites annonces,…</em></li>
        <li>Par des moyens d’action :<br /><em>Lobbying, économies d'échelle, grands projets d’animation, …</em></li>
       

</div>
			
<div class="five columns">
		     <div id="my-slideshow-weather">
                        <ul class="bjqs">
                            <li><div class="weatherA" title="Sainte-Menehould"><br /><center><b>Sainte-Menehould</b></center></div></li>
                            <li><div class="weatherB" title="Vouziers"><br><center><b>Vouziers</b></center></div></li>
                            <li><div class="weatherC" title="Clermont-en-Argonne"><br /><center><b>Clermont-en-Argonne</b></center></div></li>
                        </ul>
                    </div>
					
				
                	<div class="clear"></div>
		
					<center>
                    <br />
                    <div class="barre-top-pub"></div>
                    <br />
                    <b class="green">Les dernières annonces</b>
                    <br /><br />
                    <div id="my-slideshow-annonce">
                        <ul class="bjqs">
                        	<?php 
								foreach($annonce as $k=>$v){			
							?>
                            	<li><a href="<?php echo $this->Html->url(array('controller'=>'home','action'=>'index'));?>"><b><?php echo $v['Annonce']['name']; ?></b><p><?php echo $v['Annonce']['content']; ?></p></a></li>
							<?php	
								} 
							?>
                        </ul>
                    </div>
					<div class="barre-top-pub"></div>
                    </center>
                    
                    <center>
                    <br />
                    <div id="my-slideshow-banniere">
                        <ul class="bjqs">
                        	<?php 
								foreach($banniere as $k=>$v){			
							?>
                            	<li><a href="<?php echo $v['Banniere']['link']; ?>"><?php echo $this->Html->image('banniere/'.$v['Banniere']['url']);?></a></li>
							<?php	
								} 
							?>
                        </ul>
                    </div>
					<div class="barre-top-pub"></div>
                    </center>
                    
                     <center>
                    <br />
                    <div id="my-slideshow-logo">
                        <ul class="bjqs">
                        	<?php 
								foreach($logo as $k=>$v){			
							?>
                            	<li><a href="<?php echo $v['Logo']['link']; ?>"><?php echo $this->Html->image('logo/'.$v['Logo']['url'],array('width'=>'180'));?></a></li>
							<?php	
								} 
							?>
                        </ul>
                    </div>
					<div class="barre-top-pub"></div>
                    </center>
					
</div>    
	