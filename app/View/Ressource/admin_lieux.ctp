

<div class="bloc">
                <div class="title">
                    Gestion des ressources "Lieux"
                </div>
                <div class="content">
    				<br /><?php echo $this->Html->link( $this->Html->image('icons/news-add.png',array()), array('action'=>'editlieux'), array('escape'=>false));  ?>
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
                       
							<?php foreach($data['presse'] as $k=>$v): ?> 
                            <tr>
                                <td><?php echo $this->Html->link( $v['Location']['title'], array('action'=>'editlieux',$v['Location']['id']), array('escape'=>false)); ?></td>
                               	<td><?php echo $data['listgroup'][ $v['Location']['location_groups_id']]; ?></td>
                                <td><?php echo $v['Location']['created']; ?></td>
                               
                               
                                <td class="actions">
									<?php echo $this->Html->link( $this->Html->image('icons/actions/edit.png',array()), array('action'=>'editlieux',$v['Location']['id']), array('escape'=>false)); ?>
									<?php echo $this->Html->link( $this->Html->image('icons/actions/delete.png',array()), array('action'=>'deletelieux',$v['Location']['id']), array('escape'=>false),'Voulez-vous vraiment supprimer cet article ?'); ?>
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
	