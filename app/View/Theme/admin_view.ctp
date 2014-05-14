<div class="eleven columns">
    <div class="box">
          
          <?php   
          $id = $Post['Post']['id'];

             echo $this->Html->link('', array('action'=>'delete',$id), array('escape'=>false,'class'=>'button delete'),'Voulez-vous vraiment supprimer cet article ?'); 
           ?>
          <h1><?php echo $Post['Post']['title']; ?></h1>
        
         
          <div id="articleItem">
            <em><?php echo 'Le '.$Post['Post']['created'];?></em>
            <?php 
              if(isset($Post['Media']['url'])){
                $media = explode('.',$Post['Media']['url']);
                $media = $media[0].'_m.'.$media[1];
                echo $this->Html->image($media); 
              }
            ?>
            <p><?php echo substr($Post['Post']['content'],0,140)."..."; ?></p>
            
            Catégories : <em> <?php
            $nbCategories = $Post['Category'];
              foreach($Post['Category'] as $category) { 
								echo $category['name'];
								if (next($nbCategories)) {
									echo ", ";
								}
							}             ?></em><br>
			Tags : <em> <?php
            $nbTags = $Post['Tag'];
              foreach($Post['Tag'] as $tag) { 
								echo $tag['title'];
								if (next($nbTags)) {
									echo ", ";
								}
							}             ?></em><br>
         

          </div>
       
        </div>
</div>
</div>


