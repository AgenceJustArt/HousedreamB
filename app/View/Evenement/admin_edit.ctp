
<div class="bloc">
	<div class="title">
		<?php if(empty($this->request->data)){ echo 'Ajouter un événement'; } else{ echo 'Modifier l\'événement';} ?>
	</div>
	<div class="content">
		<?php echo $this->Form->create('Event',array('enctype' => 'multipart/form-data')); ?>
		<?php echo $this->Form->input('Event.id'); ?>
       	<?php echo $this->Form->input('EventMedia.id'); ?>
		<?php echo $this->Form->input('Event.title',array('class'=>'inline')); ?>
		<?php echo $this->Form->input('Event.content',array('id'=>'redactor')); ?> 
		<?php 
			foreach($category as $k=>$v){
				$v = current($v);
				$key = $v['id'];
				$valeur = $v['title'];
				$sizes[$key] = $valeur;		
			}
		?>
        <?php 
			echo $this->Form->input('Event.event_categorys_id', array('label'=>'Catégorie :','options' => $sizes, 'default' => 'm')); 
			echo $this->Form->input('Event.location',array('label'=>'Lieu :')); 
			echo $this->Form->input('Event.adress',array('label'=>'Adress postal :')); 
			echo $this->Form->input('Event.access'); 
        	echo $this->Form->input('Event.start', array('id'=>'start','label' => 'Début de l\'événement','type'=>'text'));
			echo $this->Form->input('Event.stop', array('id'=>'stop','label' => 'Fin de l\'événement','type'=>'text'));
		?>
		<label for="iphonecheck" class="label">En ligne</label>
		<?php echo $this->Form->input('Event.online',array('label'=>'','type'=>'checkbox','class'=>'iphone','id'=>'iphonecheck')); ?>	
		<p> 
			<?php if(isset($this->request->data['EventMedia']['url'])){echo $this->Html->image($this->request->data['EventMedia']['url']);} ?>
		</p>
    <?php echo $this->Form->file('EventMedia.url'); ?>
    <?php echo $this->Form->input('EventMedia.link'); ?>
	<?php echo $this->Form->end('Envoyer'); ?> 	
	</div>
</div>


    	
	

		