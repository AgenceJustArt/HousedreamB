
<div class="twelve columns">
    <table class="new">
      <?php $conf = Configure::read('Option.Data');
        
        
        echo $this->Form->create('Post',array('type' => 'file', 'enctype' => 'multipart/form-data')); 
          

          // Création des champs de formulaire Contenue
          
          echo '<tr><td>Titre</td><td>'.$this->Form->input('Post.title',array('label'=>false,'class'=>'inline')).'</td></tr>';
          
          // Création des champs de formulaire Catégorie
          
		  echo $this->Form->input('Category', array('label' => 'Catégories', 'type' => 'select', 'multiple' => 'checkbox'));

 /*
echo $this->Form->input(
        'Category.title',
        array('label'=>false,'multiple' => 'multiple', 'type' => 'select','options' => $categories)
    ); 
*/
          
          echo '<tr><td>Contenu</td><td>'.$this->Form->input('Post.content',array('label'=>false,'id'=>'redactor')).'</td></tr>';
           echo '<tr><td>Tags</td><td>'.$this->Form->input('Post.tags',array('label'=>false)).'</td></tr>'; 
          echo $this->Form->file('media');
        echo '<tr><td></td><td>'.$this->Form->end('Envoyer').'</td></tr>';
     ?>
      </table>
</div>