<div id="menu-profil">
	<?php 
		$user = AuthComponent::user();
		$role = $user['role'];
		$controller = 'account';
		$action = $this->request->params['action'];
		$acl = array(
			'membre'=>array(
				'Mon compte'=>array('controller'=>$controller,'action'=>'information'),
				'Changer mon profil'=>array('controller'=>$controller,'action'=>'profil'),
				'Compte Associatif'=>array('controller'=>$controller,'action'=>'basique'),
				'Compte Partenaire'=>array('controller'=>$controller,'action'=>'adhesionpartenaire')
			),
			'basique'=>array(
				'Mon compte'=>array('controller'=>$controller,'action'=>'information'),
				'Mes relations'=>array('controller'=>$controller,'action'=>'relation'),
				'Changer mon profil'=>array('controller'=>$controller,'action'=>'profil'),
				'Changer mon association'=>array('controller'=>$controller,'action'=>'association'),
				'Rédiger un événement'=>array('controller'=>$controller,'action'=>'editevent'),
				'Adhésion'=>array('controller'=>$controller,'action'=>'adhesion')
			),
			'privilege'=>array(
				'Mon compte'=>array('controller'=>$controller,'action'=>'information'),
				'Mes relations'=>array('controller'=>$controller,'action'=>'relation'),
				'Changer mon profil'=>array('controller'=>$controller,'action'=>'profil'),
				'Changer mon association'=>array('controller'=>$controller,'action'=>'association'),
				'Rédiger un événement'=>array('controller'=>$controller,'action'=>'editevent'),
				'Rédiger une actualité'=>array('controller'=>$controller,'action'=>'editpost'),
				'Rédiger une petite annonce'=>array('controller'=>$controller,'action'=>'editannonce'),
				'Rédiger une recherche de bénévole'=>array('controller'=>$controller,'action'=>'editbenevolat')
			),
			'partenaire'=>array(
				'Mon compte'=>array('controller'=>$controller,'action'=>'information'),
				'Changer mon profil'=>array('controller'=>$controller,'action'=>'profil'),
				'Changer mon entreprise'=>array('controller'=>$controller,'action'=>'partenaire')
			)
		);
	?>

	<h3>Bonjour <b><?php echo $user['pseudo']; ?></b></h3>
	<h3>Compte : <b><?php echo ucfirst($user['role']); ?></b></h3>
	<h3><?php echo $this->Html->link('Messagerie <b>('.$mailboxcount.')</b>',array('controller'=>$controller,'action'=>'mailbox'),array('escape'=>false)); ?></h3>
	<div class="barre"></div>
		<ul class="menu-profil">
			<?php foreach($acl[$role] as $k=>$v){ ?>
					<li <?php if($action == $v['action']){ echo 'class=\'active\''; } ?>><?php echo $this->Html->link($k,$v); ?></li>
			<?php } ?>
		</ul>
	<div class="barre"></div>
</div>
		
