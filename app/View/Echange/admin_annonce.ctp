<div class="bloc">
                <div class="title">
                    Gestion des petites annonces
                </div>
                <div class="content">
    				<br /><?php echo $this->Html->link( $this->Html->image('icons/news-add.png',array()), array('action'=>'editannonce'), array('escape'=>false));  ?>
    			</div>
                <div class="content index">
                
                    <table>
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Catégorie</th>
                                <th>Auteur</th>
                                <th>En ligne</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php foreach($data['annonce'] as $k=>$v): ?> 
                            <tr>
                                <td><?php echo $this->Html->link( $v['Annonce']['name'], array('action'=>'editannonce',$v['Annonce']['id']), array('escape'=>false)); ?></td>
                                <td><?php echo $data['listgroup'][$v['Annonce']['annonce_groups_id']]; ?></td>
                                <td><a href="#"><?php echo $this->Html->link( $v['Association']['name'], array('action'=>'edit',$v['Annonce']['id']), array('escape'=>false));; ?></a></td>
                                <td><a href="#"><?php  if($v['Annonce']['online']=='1'){ echo $this->Html->image('icons/button-white-check.png',array()); } else { echo $this->Html->image('icons/button-white-remove.png',array()); } ?></td>
                                <td class="actions">
									<?php echo $this->Html->link( $this->Html->image('icons/actions/edit.png',array()), array('action'=>'editannonce',$v['Annonce']['id']), array('escape'=>false)); ?>
									<?php echo $this->Html->link( $this->Html->image('icons/actions/delete.png',array()), array('action'=>'deleteannonce',$v['Annonce']['id']), array('escape'=>false),'Voulez-vous vraiment supprimer cet article ?'); ?>
								</td>
                            </tr>
							<?php endforeach; ?>
         
                        </tbody>
                    </table>
                    <div class="pagination">
					<?php $pagination = str_replace('|','',$this->Paginator->numbers()); echo $pagination; ?>
                    </div>
                </div>
            </div>
</div>
	