<div class="bloc">
                <div class="title">
                    Liste des comptes
                </div>
                <div class="content index">
                    <table>
                        <thead>
                            <tr>
                                <th>Pseudo</th>
                                <th>Mail</th>
                                <th>En ligne</th>
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
                                <td><?php  if($v['active']=='1'){ echo $this->Html->image('icons/button-white-check.png',array()); } else { echo $this->Html->image('icons/button-white-remove.png',array()); } ?></td>
                                <td class="actions">
									<?php echo $this->Html->link( $this->Html->image('icons/actions/edit.png',array()), array('action'=>'edit',$v['id']), array('escape'=>false)); ?>
									<?php echo $this->Html->link( $this->Html->image('icons/actions/delete.png',array()), array('action'=>'delete',$v['id']), array('escape'=>false),'Voulez-vous vraiment supprimer cet article ?'); ?>
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
	