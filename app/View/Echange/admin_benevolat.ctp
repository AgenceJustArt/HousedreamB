<div class="bloc">
                <div class="title">
                    Gestion des bénévolats
                </div>
                <div class="content">
    				<br /><?php echo $this->Html->link( $this->Html->image('icons/news-add.png',array()), array('action'=>'editbenevolat'), array('escape'=>false));  ?>
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
                        
							<?php foreach($data['benevolat'] as $k=>$v): ?> 
                            <tr>
                                <td><?php echo $this->Html->link( $v['Benevolat']['title'], array('action'=>'editbenevolat',$v['Benevolat']['id']), array('escape'=>false)); ?></td>
                                <td><?php echo $data['listgroup'][$v['Benevolat']['benevolat_groups_id']]; ?></td>
                                <td><a href="#"><?php echo $this->Html->link( $v['Association']['name'], array('action'=>'edit',$v['Benevolat']['id']), array('escape'=>false));; ?></a></td>
                                <td><a href="#"><?php  if($v['Benevolat']['online']=='1'){ echo $this->Html->image('icons/button-white-check.png',array()); } else { echo $this->Html->image('icons/button-white-remove.png',array()); } ?></td>
                                <td class="actions">
									<?php echo $this->Html->link( $this->Html->image('icons/actions/edit.png',array()), array('action'=>'editbenevolat',$v['Benevolat']['id']), array('escape'=>false)); ?>
									<?php echo $this->Html->link( $this->Html->image('icons/actions/delete.png',array()), array('action'=>'deletebenevolat',$v['Benevolat']['id']), array('escape'=>false),'Voulez-vous vraiment supprimer cet article ?'); ?>
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
	