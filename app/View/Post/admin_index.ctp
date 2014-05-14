

<?php $this->set('title_for_layout', 'Bienvenue');?>

    <div class="box">
        <div class="way">
                Gérer les annonces
        </div>
    </div>

<div class="box">

             
    
      
          <table class="all">
                        <thead>
                        <tr>
                        <th>Date :</th>
                        <th>Nom :</th>
                        
                        <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                       
                       
                        <?php foreach($Post as $k=>$v){ 
                            $id = $v['Post']['id'];
                            $date = explode(' ',$v['Post']['created']);
                            $date = implode('/',array_reverse(explode('-',$date[0])));
                        ?>
                      
                        <tr>
                        <td><?php echo $date ; ?></td>
                        <td><?php echo $v['Post']['title'] ; ?></td>
                      
                        <td>
                            <?php echo $this->Html->link('', array('action'=>'view',$id), array('escape'=>false,'class'=>'button view')); ?>
                            <?php echo $this->Html->link('', array('action'=>'update',$id), array('escape'=>false,'class'=>'button edit')); ?>
                            <?php echo $this->Html->link('', array('action'=>'delete',$id), array('escape'=>false,'class'=>'button delete'),'Voulez-vous vraiment supprimer cet article ?'); ?>
                        </td>
                        </tr>
                        
                        
                        <?php } ?>
                                                </tbody>
                        </table>
                         <div class="pagination">
                    <?php $pagination = str_replace('|','',$this->Paginator->numbers()); echo $pagination; ?>
                    </div>
                       
</div>
 



	