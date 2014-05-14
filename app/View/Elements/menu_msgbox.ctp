


 <h3>MESSAGERIE</h3>
                <div class="divider"></div>
                <div class="filterContent sidebarWidget">
                	<ul>
                		<li><?php echo $this->Html->link('Boite de réception (4)', array('controller' => 'msgbox', 'action' => 'index',$prefix=>true)); ?></li>
                		<li><?php echo $this->Html->link('Messages envoyés', array('controller' => 'msgbox', 'action' => 'send',$prefix=>true)); ?></li>
                		<li><?php echo $this->Html->link('Brouillon', array('controller' => 'msgbox', 'action' => 'draft',$prefix=>true));?></li>
                		<li><?php echo $this->Html->link('Corbeille', array('controller' => 'msgbox', 'action' => 'trash',$prefix=>true));?></li>

                
                	</ul>
                   
                </div><!-- end quick search widget -->