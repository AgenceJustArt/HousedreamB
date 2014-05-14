
<div class="twelve columns">
    <table class="new">
      <?php $conf = Configure::read('Option.Data');
      $data = $this->request->data;
      $nbTags = $data['Tag'];
      $strTags = "";
      foreach($data['Tag'] as $k=>$v){
	      $strTags .= $v['title'];
	      	if (next($nbTags)) {
				$strTags .= ", ";
			} 
      }
      
        
        
        echo $this->Form->create('Post',array('type' => 'file', 'enctype' => 'multipart/form-data')); 

          // Création des champs de formulaire Contenue
          
          echo '<tr><td>Titre</td><td>'.$this->Form->input('Post.title',array('label'=>false,'class'=>'inline')).'</td></tr>';
          
          // Création des champs de formulaire Catégorie
          /*
          foreach($Category as $k=>$v){
            if(!empty($k)){
              echo '<tr><td>'.$k.' : </td><td>'.$this->Form->input('Post.category.'.$k, array('label'=>false,'options' => $v)).'</td></tr>';
            }
          }
          */
          echo $this->Form->input('Category', array('type' => 'select', 'multiple' => 'checkbox'));
          
          // Création des champs de formulaire Field

          
          echo '<tr><td>Contenu</td><td>'.$this->Form->input('Post.content',array('label'=>false,'id'=>'redactor-content')).'</td></tr>'; 
          echo '<tr><td>Tags</td><td>'.$this->Form->input('Post.tags',array('label'=>false, 'value' => $strTags)).'</td></tr>';
          echo $this->Form->file('media');
        echo '<tr><td></td><td>'.$this->Form->end('Envoyer').'</td></tr>';
     ?>
      </table>
</div>