<div id="subscribe">
<h2>Abonnez-vous et profitez pleinement de sympathy world !</h2>
<h3>Information : pour vous laisser une pleine liberté les abonnements ne sont pas reconduit automatiquement et les informations bancaires ne sont pas stocké !</h3>
<table>
	<tr>
		<td>
			<h3>1. POURQUOI S'ABONNER</h3>
			<table>
				<thead>
					<tr>
						<td>Sans</td>
						<td>Avec</td>
						<td>Les avantages</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><span class="icon-check"></span></td>
						<td><span class="icon-check"></span></td>
						<td>Créer votre profil</td>
					</tr>
					<tr>
						<td><span class="icon-check"></span></td>
						<td><span class="icon-check"></span></td>
						<td>Rechercher un membre</td>
					</tr>
					<tr>
						<td><span class="icon-check"></span></td>
						<td><span class="icon-check"></span></td>
						<td>Voir les profils des membres</td>
					</tr>
					<tr>
						<td><span class="icon-check"></span></td>
						<td><span class="icon-check"></span></td>
						<td>Voir le calendrier des intervenants</td>
					</tr>
					<tr>
						<td><span class="icon-check"></span></td>
						<td><span class="icon-check"></span></td>
						<td>Voir nos partenaires associatifs</td>
					</tr>
					<tr>
						<td></td>
						<td><span class="icon-check"></span></td>
						<td>Envoyer des messages</td>
					</tr>
					<tr>
						<td></td>
						<td><span class="icon-check"></span></td>
						<td>Consulter les messages reçu</td>
					</tr>
					<tr>
						<td></td>
						<td><span class="icon-check"></span></td>
						<td>Tchat privé entre membre</td>
					</tr>
					<tr>
						<td></td>
						<td><span class="icon-check"></span></td>
						<td>Salon de tchat par théme</td>
					</tr>
					<tr>
						<td></td>
						<td><span class="icon-check"></span></td>
						<td>Poster des questions ouvertes</td>
					</tr>
					<tr>
						<td></td>
						<td><span class="icon-check"></span></td>
						<td>Répondre aux questions ouvertes</td>
					</tr>
					<tr>
						<td></td>
						<td><span class="icon-check"></span></td>
						<td>Commenter les articles</td>
					</tr>
					<tr>
						<td></td>
						<td><span class="icon-check"></span></td>
						<td>S'inscrire aux consultations privées avec<br> nos professionnels (PASS)*</td>
					</tr>
					<tr>
						<td></td>
						<td><span class="icon-check"></span></td>
						<td>Participer aux groupes de soutien animés <br>
par nos professionnels (PASS*)<br><em>* PASS disponible à l’achat pour réserver les places</em></td>
					</tr>
					
					
					
				</tbody>
			</table>
		</td>
		<td class="padding_30">
			<?php echo $this->Form->create('Order',array('url'=>array('controller'=>'checkout','action'=>'index')));?>
			<h3>2. CHOISIR SON ABONNEMENT</h3>
			<table>
			<?php 
			$price = array(
				'A'=>array('month'=>12,'reduice'=>20,'base'=>9.90,'price'=>7.90,'total'=>94.80),
				'B'=>array('month'=>6,'reduice'=>15,'base'=>9.90,'price'=>8.40,'total'=>50.40),
				'C'=>array('month'=>3,'reduice'=>10,'base'=>9.90,'price'=>8.90,'total'=>26.70),
				'D'=>array('month'=>1,'reduice'=>0,'base'=>9.90,'price'=>9.90,'total'=>9.90)
			);
			foreach($price as $k=>$v){
				if($k=='A'){ $check = 'checked'; }else{ $check = ''; }
				echo '<tr>'.
				'<td><input type="radio" name="choice" value="'.$k.'" '.$check.'></td>'.
				'<td><table><tr><td><b>'.$v['month'].' Mois : '.$v['price'].'€/mois*</b></td><td><span class="reduice">-'.$v['reduice'].'%</span></td></tr></table></td></tr>'.
				'<tr><td></td><td class="total">Facturé en un paiment de '.$v['total'].'€</td></tr>';
				
				
			}

			?>
			</table>
			<h3>3. MODE DE PAIEMENT</h3>
			<table>
				<tr>
		            <td>
		                <input type="radio" name="payment" value="CARTE-CB" checked><?php echo $this->Html->image('card/CB.jpg',array('height'=>'30')); ?>
		            </td>
		            <td>
		                <input type="radio" name="payment" value="CARTE-VISA"><?php echo $this->Html->image('card/visa.jpg',array('height'=>'30')); ?>
		            </td>
		        </tr>
		       	<tr>
		            <td>
		                <input type="radio" name="payment" value="CARTE-EUROCARD_MASTERCARD"><?php echo $this->Html->image('card/master.jpg',array('height'=>'30')); ?>
		            </td>
		            <td>
		                <input type="radio" name="payment" value="CARTE-E_CARD"><?php echo $this->Html->image('card/e-card.jpg',array('height'=>'30')); ?>
		            </td>
		        </tr>
		        <tr>
		        	<td></td>
		        	<td><?php echo $this->Form->submit('Valider ma commande');?></td>
		        </tr>
			</table>
		</td>
	</tr>
</table>

</div>