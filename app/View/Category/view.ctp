<div class="ten columns">

<h1><?php echo $category['Category']['name']; ?></h1>

<ul>
	<?php foreach ($category['Post'] as $post) {?>
	<li><?php echo $post['title']; ?></li>
	<?php } ?>	
</ul>

</div>