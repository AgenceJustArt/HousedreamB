<div class="bloc">
                <div class="title">
                    Demande d'annonce 
					
                </div>
                <div class="content index">
                    <table>
                        <thead>
                            <tr>
                                <th>Pseudo</th>
                                <th>Mail</th>
                                <th>En attente de validation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php foreach($data as $k=>$v): 
								$v = $v['Annonce']
							?> 
							
                            <tr>
                                <td><?php echo $this->Html->link( $v['name'], array('action'=>'edit',$v['id']), array('escape'=>false)); ?></td>
								<td><?php echo $this->Html->link( $v['content'], array('action'=>'edit',$v['id']), array('escape'=>false));; ?></td>
                                <td>
									<?php echo $this->Html->link( $this->Html->image('icons/database-add.png',array()), array('action'=>'annonceaccept',$v['id']), array('escape'=>false));?>
									<?php echo $this->Html->link( $this->Html->image('icons/database-remove.png',array()), array('action'=>'annoncenotaccept',$v['id']), array('escape'=>false));?>
								</td>
                                <td class="actions">
									<?php echo $this->Html->link( $this->Html->image('icons/actions/edit.png',array()), array('action'=>'editannonce',$v['id']), array('escape'=>false)); ?>
									<?php echo $this->Html->link( $this->Html->image('icons/actions/delete.png',array()), array('action'=>'deleteannonce',$v['id']), array('escape'=>false),'Voulez-vous vraiment supprimer cette annonce ?'); ?>
								</td>
                            </tr>
							<?php endforeach; ?>
         
                        </tbody>
                    </table>
                    
                </div>
            </div>
</div>
	