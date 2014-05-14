<h1> Bonjour, </h1>


<p><?php echo $username; ?> a répondu à la discussion '<?php echo $subject; ?>' à laquelle vous êtes inscrit.</p>

<p>Le message est situé <?php echo $this->Html->link($this->Html->url($link,true),$this->Html->url($link,true)); ?></p>

<?php if(isset($delta)){ ?>
Vous pouvez vous désabonner ici <?php echo $this->Html->link($this->Html->url($unsubscribe,true),$this->Html->url($unsubscribe,true)); ?>
<?php } ?>