

<div class="bloc">
                <div class="title">
                    Gestion des ressources "Associations"
                </div>

                <div class="content">
                    <table>
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Catégorie</th>
                                <th>Date</th>
                                
                               
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                       
							<?php foreach($data['association'] as $k=>$v): ?> 
                            <tr>
                                <td><?php echo $this->Html->link( $v['Association']['name'], array('action'=>'editassociations',$v['Association']['id']), array('escape'=>false)); ?></td>
                               	<td><?php echo $data['listgroup'][ $v['Association']['asso_groups_id']]; ?></td>
                                <td><?php echo $v['Association']['created']; ?></td>
                               
                               
                                <td class="actions">
									<?php echo $this->Html->link( $this->Html->image('icons/actions/edit.png',array()), array('action'=>'editassociations',$v['Association']['id']), array('escape'=>false)); ?>
									
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
	