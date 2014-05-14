
<div class="bloc">
                <div class="title">
                    Gestion des articles
					
                </div>
                <div class="content">
                    <table>
                        <thead>
                            <tr>
								<th>Ecrit le</th>
                                <th>Titre</th>
                                <th>Auteur</th>
                                <th>En ligne</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
							<?php foreach($data as $k=>$v): ?> 
                            <tr>
								<td><?php $date = explode(' ',$v['Post']['created']); echo $date[0];?></td>
                                <td><?php echo $this->Html->link( $v['Post']['title'], array('action'=>'edit',$v['Post']['id']), array('escape'=>false)); ?></td>
                                <td><?php echo $v['User']['pseudo']; ?></td>
                                <td><a href="#"><?php  if($v['Post']['online']=='1'){ echo $this->Html->image('icons/button-white-check.png',array()); } else { echo $this->Html->image('icons/button-white-remove.png',array()); } ?></td>
                                <td class="actions">
									<?php echo $this->Html->link( $this->Html->image('icons/actions/edit.png',array()), array('action'=>'edit',$v['Post']['id']), array('escape'=>false)); ?>
									<?php echo $this->Html->link( $this->Html->image('icons/actions/delete.png',array()), array('action'=>'delete',$v['Post']['id']), array('escape'=>false),'Voulez-vous vraiment supprimer cet article ?'); ?>
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
	