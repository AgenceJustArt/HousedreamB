
    <?php //echo $this->Form->create('User'); ?>
			<!--<input type="hidden" name="compte" value="partenaire"/>-->
		<?php //echo $this->Form->end("S'enregistrer"); ?>
   
	 
<div class="sixteen columns">
	<?php echo $this->element('menu_profil', array(
		"helptext" => "Oh, this text is very helpful."
	));?>
</div>
<div class="clear"></div>
<div id="profil">

	<div class="one-third column">

		
	</div>
	
	<div class="one-third column">
	
			
		
	</div>
	
	<div class="one-third column">
		<div class="radius">
		<table class="price shadow">
			<tr class="header"><td><strong>Compte Association Privilège</strong> <br />(Réservé aux associations)</td></tr>
			<tr class="item"><td><?php echo $this->Html->image('arrow-white.png');?> <span class="pink">Déposer l'acutalité de votre association</span></td></tr>
			<tr class="item"><td><?php echo $this->Html->image('arrow-white.png');?> <span class="pink">Déposer une "Petites annonces"</span></td></tr>
			<tr class="item"><td><?php echo $this->Html->image('arrow-white.png');?> <span class="pink">Partager les ressources associatif</span></td></tr>
			<tr class="item"><td><?php echo $this->Html->image('arrow-white.png');?> <span class="pink">Déposer un document à partager</span></td></tr>
			<tr class="item"><td><?php echo $this->Html->image('arrow-white.png');?> <span class="pink">Accès ressource - Documents</span></td></tr>
			<tr class="item"><td><?php echo $this->Html->image('arrow-white.png');?> <span class="pink">Accès ressource - Liens web</span></td></tr>
			<tr class="item"><td><?php echo $this->Html->image('arrow-white.png');?> <span class="pink">Accès ressource - Logiciel libres</span></td></tr>
			<tr class="item"><td><?php echo $this->Html->image('arrow-white.png');?> <span class="pink">Accès ressource - Lieux</span></td></tr>
			<tr class="item"><td><?php echo $this->Html->image('arrow-white.png');?> <span class="pink">Accès ressource - Associations</span></td></tr>
			<tr class="item"><td><?php echo $this->Html->image('arrow-white.png');?> <span class="pink">Accès ressource - Partenaires</span></td></tr>
			<tr class="item"><td><?php echo $this->Html->image('arrow-white.png');?> <span class="pink">Accès ressource - Presse</span></td></tr>
			
			
		</table>
		</div>
	</div>
	<div class="one-third column">
		<div class="radius">
		<table class="price shadow">
			<tr class="header"><td><strong>Paiement par chéque</strong><br /></td></tr>
			<tr><td>Règlement par chèque bancaire à l'ordre de <strong class="pink">"Association Pays d'Argonne"</strong>

à adresser à :</td></tr>
<tr><td>PAYS D'ARGONNE
<br />
24, rue Chanzy
<br />
51800 SAINTE MENEHOULD
</td></tr>
<tr><td><strong class="pink">ou</strong></td></tr>
<tr><td>PAYS D'ARGONNE
<br />
22, rue Jules bancelin
<br />
55120 LES ISLETTES
</td></tr>
<tr><td><strong class="pink">ou</strong></td></tr>
<tr><td>PAYS D'ARGONNE
<br />
12, rue Chantereine
<br />
08250 GRANDPRE</td></tr>
			<tr class="foote bg-pink"><td>
			
		
			<center class="white">- Adhésion : 20 € -</center>
			
			</td></tr>
		</table>
		</div>
	</div>
	<div class="one-third column">
		<div class="radius">
		<table class="price shadow">
			<tr class="header"><td><strong>Paiement en ligne</strong>(Paypal)</td></tr>
			<tr class="footer bg-pink"><td>
			
			<?php echo $this->Form->create('User'); ?>
			<input type="hidden" name="compte" value="privilege"/>
			<center><?php echo $this->Form->end("Adhésion : 20€"); ?></center>
			
			</td></tr>
		</table>
		</div>
	</div>
</div>	