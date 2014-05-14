<div class="bloc">
                <div class="title">
                    Gestion des événements
                </div>
                <div class="content index">
                    <table>
                        <thead>
                            <tr>
								<th>Date</th>
                                <th>Titre</th>
                                <th>Auteur</th>
                                <th>En ligne</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php foreach($data as $k=>$v): ?> 
                            <tr>
								<td><?php $date = explode(' ',$v['Event']['start']); echo $date[0];?></td>
                                <td><?php echo $this->Html->link( $v['Event']['title'], array('action'=>'edit',$v['Event']['id']), array('escape'=>false)); ?></td>
                                <td><a href="#"><?php echo $this->Html->link( $v['User']['pseudo'], array('action'=>'edit',$v['Event']['id']), array('escape'=>false));; ?></a></td>
                                <td><a href="#"><?php  if($v['Event']['online']=='1'){ echo $this->Html->image('icons/button-white-check.png',array()); } else { echo $this->Html->image('icons/button-white-remove.png',array()); } ?></td>
                                <td class="actions">
									<?php echo $this->Html->link( $this->Html->image('icons/actions/edit.png',array()), array('action'=>'edit',$v['Event']['id']), array('escape'=>false)); ?>
									<?php echo $this->Html->link( $this->Html->image('icons/actions/delete.png',array()), array('action'=>'delete',$v['Event']['id']), array('escape'=>false),'Voulez-vous vraiment supprimer cet article ?'); ?>
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
	