
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
			<tr class="header"><td><strong>Compte Partenaire</strong><br />(Réservé aux entreprises)</td></tr>
			<tr class="item"><td><?php echo $this->Html->image('arrow-white.png');?> <span class="pink">Inscription dans l'annuaire "Partenaires ressources"</span></td></tr>
			<tr class="item"><td><?php echo $this->Html->image('arrow-white.png');?> <span class="pink">Fiche d'information de l'entreprise</span></td></tr>			
			
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
			
		
			<center class="white">"Personne morale - Entreprise partenaire"<br />Cotisation annuelle : 30€ </center><br />
			<center class="white">"Personne physique"<br />Cotisation annuelle : 10€</center>
			
			</td></tr>
		</table>
		</div>
	</div>
	<div class="one-third column">
		<div class="radius">
		<table class="price shadow">
			<tr class="header"><td><strong>Paiement en ligne</strong> (Paypal)</td></tr>
					
			<tr class="footer bg-pink"><td>
			
			<?php echo $this->Form->create('User'); ?>
			<input type="hidden" name="compte" value="partenaire"/>
			<center><?php echo $this->Form->end("Adhérer (30€)"); ?></center>
			
			</td></tr>
		</table>
		</div>
	</div>
</div>	