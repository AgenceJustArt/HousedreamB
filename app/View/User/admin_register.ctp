<div class="bloc">
                <div class="title">
                    Demande de compte ASSO
					
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
								$v = $v['User']
							?> 
							
                            <tr>
                                <td><?php echo $this->Html->link( $v['pseudo'], array('action'=>'edit',$v['id']), array('escape'=>false)); ?></td>
								<td><?php echo $this->Html->link( $v['mail'], array('action'=>'edit',$v['id']), array('escape'=>false));; ?></td>
                                <td>
									<?php echo $this->Html->link( $this->Html->image('icons/database-add.png',array()), array('action'=>'validregister',$v['id']), array('escape'=>false));?>
									<?php echo $this->Html->link( $this->Html->image('icons/database-remove.png',array()), array('action'=>'notvalidregister',$v['id']), array('escape'=>false));?>
								</td>
                                <td class="actions">
									<?php echo $this->Html->link( $this->Html->image('icons/actions/edit.png',array()), array('action'=>'edit',$v['id']), array('escape'=>false)); ?>
									<?php echo $this->Html->link( $this->Html->image('icons/actions/delete.png',array()), array('action'=>'delete',$v['id']), array('escape'=>false),'Voulez-vous vraiment supprimer cet article ?'); ?>
								</td>
                            </tr>
							<?php endforeach; ?>
         
                        </tbody>
                    </table>
                    
                </div>
            </div>
</div>
	