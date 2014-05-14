<h1> Bonjour, </h1>
<p> Login :<?php echo $username; ?></p>
<p> Mot de passe :<?php echo $mdp; ?></p>
<p> Pour valider votre compte, veuillez cliquer sur ce lien <?php echo $this->Html->link('Valider mon compte',$this->Html->url($link,true)); ?></p>