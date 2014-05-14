
<div class="sixteen columns">
	<?php echo $this->element('menu_profil');?>
	<br /><br />
</div>

<div class="one-third column">

	<p>
		<h2 class="green">Compte</h2> 
		<br />
		<ul>
			<li><span class="green">Pseudo : </span><?php echo $data['User']['pseudo']; ?></li>
			<li><span class="green">Adresse mail : </span><?php echo $data['User']['mail']; ?></li>
			<li><span class="green">Statut : </span><?php echo $data['User']['role']; ?></li>
			<li><span class="green">Compte créé le : </span><?php echo $data['User']['created']; ?></li>
		</ul>
		<br />
	
		<h2 class="green">Informations du titulaire</h2> 
		<br />
		<ul>
			<li><span class="green">Nom : </span><?php echo $data['Profile']['last_name']; ?></li>
			<li><span class="green">Prènom : </span><?php echo $data['Profile']['first_name']; ?></li>
			<li><span class="green">Année de naissance : </span><?php echo $data['Profile']['bornyear']; ?></li>
			<li><span class="green">Ville : </span><?php echo $data['Profile']['city']; ?></li>
			<li><span class="green">Code Postal : </span><?php echo $data['Profile']['cp']; ?></li>
			<li><span class="green">Pays : </span><?php echo $data['Profile']['country']; ?></li>
			<li><span class="green">Profession : </span><?php echo $data['Profile']['work']; ?></li>
		</ul>
		<br />
		<h2 class="green">Appréciation</h2> 
		<br />
		<ul>
			<li><span class="green">Ce que j'aime sur le site : </span></li>
			<li><?php echo $data['Profile']['like']; ?></li>
			<li><br /></li>
			<li><span class="green">Ce que je n'aime pas sur le site : </span></li>
			<li><?php echo $data['Profile']['dislike']; ?></li>
		</ul>
	</p>
</div>

<div class="one-third column">
<?php if($data['Association']['id']!=null){ ?>
	<p>
		<h2 class="pink">Association</h2> 
		<br />
		<ul>
			<li><span class="pink">Nom : </span><?php echo $data['Association']['name']; ?></li>
			<li><span class="pink">RNA : </span><?php echo $data['Association']['rna']; ?></li>
			<li><span class="pink">Description : </span><?php echo $data['Association']['content']; ?></li>
			<li><span class="pink">Adresse : </span><?php echo $data['Association']['adress']; ?></li>
			<li><span class="pink">Ville : </span><?php echo $data['Association']['city']; ?></li>
			<li><span class="pink">Code Postal : </span><?php echo $data['Association']['cp']; ?></li>
			<li><span class="pink">Zone géographique : </span><?php echo $data['Association']['zone']; ?></li>
			<li><span class="pink">Site web : </span><?php echo $data['Association']['web']; ?></li>
			<li><span class="pink">E-mail : </span><?php echo $data['Association']['mail']; ?></li>
		</ul>
		<br />
		<h2 class="pink"><?php echo $data['Association']['Theme']['name']; ?></h2> 
		<br />
		<ul>
			<li><?php echo $data['Association']['Theme']['content']; ?></li>
		</ul>
		<br />
	</p>
<?php } ?>
</div>

<div class="one-third column">

	<p>
			<?php 
				if(isset($data['Association']['AssoMedia']['url']) && !empty($data['Association']['AssoMedia']['url'])){
					echo $this->Html->image($data['Association']['AssoMedia']['url'],array('width'=>'300')); 
				}
			?>
	</p>
</div>
	