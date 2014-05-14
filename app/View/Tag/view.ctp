<div class="ten columns">

<h1><?php echo $tag['Tag']['title']; ?></h1>

<ul>
	<?php foreach ($tag['Post'] as $post) {?>
	<li><?php echo $this->Html->link($post['title'], array('controller' => 'Post', 'action' => 'view', $post['id'])); ?></li>
	<?php } ?>	
</ul>

</div>