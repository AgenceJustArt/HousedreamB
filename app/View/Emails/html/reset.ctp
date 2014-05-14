<h1> Bonjour <?php echo $username; ?> </h1>

<p>Vous avez effectuer une demande de reinitialisation de votre mot de passe<p>
<p> Pour valider cette demande cliquez sur le lien ci-dessous</p>
<?php echo $this->Html->link('Reinitialiser mon mot de passe',$this->Html->url($link,true)); ?></p>