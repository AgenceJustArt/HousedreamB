
<div class="bloc">
	<div class="title">
		<?php if(empty($this->request->data)){ echo 'Ajouter un article'; } else{ echo 'Modifier un article';} ?>
	</div>
	<div class="content">
		<?php echo $this->Form->create('Post',array('enctype' => 'multipart/form-data')); ?>
		<?php echo $this->Form->input('Post.id'); ?>
       	 <?php echo $this->Form->input('PostMedia.id'); ?>
		 <?php echo $this->Form->input('Post.title'); ?>
		<?php echo $this->Form->input('Post.content',array('id'=>'redactor')); ?>
		<?php 
			foreach($category as $k=>$v){
				$v = current($v);
				$key = $v['id'];
				$valeur = $v['title'];
				$sizes[$key] = $valeur;		
			}
		?>
        <?php echo $this->Form->input('Post.post_categorys_id', array('label'=>'Catégorie :','options' => $sizes, 'default' => 'm')); ?>
		<label for="iphonecheck" class="label">En ligne</label>
		<?php echo $this->Form->input('Post.online',array('label'=>'','type'=>'checkbox','class'=>'iphone','id'=>'iphonecheck')); ?>
		<p> 
		<?php if(isset($this->request->data['PostMedia']['url'])){echo $this->Html->image($this->request->data['PostMedia']['url']);} ?>
		</p>
		<?php echo $this->Form->file('PostMedia.url'); ?>
		<?php echo $this->Form->input('PostMedia.link'); ?>
		<?php echo $this->Form->end('Envoyer'); ?> 
	</div>
</div>


		