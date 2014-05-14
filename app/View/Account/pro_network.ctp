<div class="row">
	<div class="large-9 columns">
		<h1>Mes relations</h1>
	</div>
	<div class="large-3 columns">
		<b>Demandes de relation <span class="notif-alert">1</span></b>
	</div>
</div>

<div class="row">
	
		<div class="large-8 columns">
			<?php 
				echo $this->Form->create('network',array('id'=>'network'));
				echo $this->Form->input('name',array('placeholder'=>'Nom','label'=>false));
			?>
		</div>
		<div class="large-2 columns">
			<?php 
				$options = array('Century 21','Victoria Keys','Orpi');
				echo $this->Form->input('agency',array('options'=>$options,'label'=>false));
			?>
		</div>
		<div class="large-2 columns">
			<?php echo $this->Form->end('Rechercher'); ?>
		</div>
	
	
	
</div>

<div class="row">
	<div class="large-12 columns">
		<div id="network" class="shadow">
			<ul class="large-block-grid-3 columns">
				<li>
					<table>
						<tr>
							<td><?php echo $this->Html->image('profil/profilme.jpg'); ?></td>
							<td><h4>Pierre Dupont</h4><em>Agent immobilier</em></td>
							<td>
								<div class="msg"><?php echo $this->Html->link('', array('controller' => '', 'action' => '')); ?></div>
								<div class="delete"><?php echo $this->Html->link('', array('controller' => '', 'action' => '')); ?></div>
							</td>
						</tr>
					</table>
				</li>
				<li>
					<table>
						<tr>
							<td><?php echo $this->Html->image('profil/profilme.jpg'); ?></td>
							<td><h4>Pierre Dupont</h4><em>Agent immobilier</em></td>
							<td>
								<div class="msg"><?php echo $this->Html->link('', array('controller' => '', 'action' => '')); ?></div>
								<div class="delete"><?php echo $this->Html->link('', array('controller' => '', 'action' => '')); ?></div>
							</td>
						</tr>
					</table>
				</li>
				<li>
					<table>
						<tr>
							<td><?php echo $this->Html->image('profil/profilme.jpg'); ?></td>
							<td><h4>Pierre Dupont</h4><em>Agent immobilier</em></td>
							<td>
								<div class="msg"><?php echo $this->Html->link('', array('controller' => '', 'action' => '')); ?></div>
								<div class="delete"><?php echo $this->Html->link('', array('controller' => '', 'action' => '')); ?></div>
							</td>
						</tr>
					</table>
				</li>
				<li>
					<table>
						<tr>
							<td><?php echo $this->Html->image('profil/profilme.jpg'); ?></td>
							<td><h4>Pierre Dupont</h4><em>Agent immobilier</em></td>
							<td>
								<div class="msg"><?php echo $this->Html->link('', array('controller' => '', 'action' => '')); ?></div>
								<div class="delete"><?php echo $this->Html->link('', array('controller' => '', 'action' => '')); ?></div>
							</td>
						</tr>
					</table>
				</li>
				<li>
					<table>
						<tr>
							<td><?php echo $this->Html->image('profil/profilme.jpg'); ?></td>
							<td><h4>Pierre Dupont</h4><em>Agent immobilier</em></td>
							<td>
								<div class="msg"><?php echo $this->Html->link('', array('controller' => '', 'action' => '')); ?></div>
								<div class="delete"><?php echo $this->Html->link('', array('controller' => '', 'action' => '')); ?></div>
							</td>
						</tr>
					</table>
				</li>
				<li>
					<table>
						<tr>
							<td><?php echo $this->Html->image('profil/profilme.jpg'); ?></td>
							<td><h4>Pierre Dupont</h4><em>Agent immobilier</em></td>
							<td>
								<div class="msg"><?php echo $this->Html->link('', array('controller' => '', 'action' => '')); ?></div>
								<div class="delete"><?php echo $this->Html->link('', array('controller' => '', 'action' => '')); ?></div>
							</td>
						</tr>
					</table>
				</li>
				<li>
					<table>
						<tr>
							<td><?php echo $this->Html->image('profil/profilme.jpg'); ?></td>
							<td><h4>Pierre Dupont</h4><em>Agent immobilier</em></td>
							<td>
								<div class="msg"><?php echo $this->Html->link('', array('controller' => '', 'action' => '')); ?></div>
								<div class="delete"><?php echo $this->Html->link('', array('controller' => '', 'action' => '')); ?></div>
							</td>
						</tr>
					</table>
				</li>
				<li>
					<table>
						<tr>
							<td><?php echo $this->Html->image('profil/profilme.jpg'); ?></td>
							<td><h4>Pierre Dupont</h4><em>Agent immobilier</em></td>
							<td>
								<div class="msg"><?php echo $this->Html->link('', array('controller' => '', 'action' => '')); ?></div>
								<div class="delete"><?php echo $this->Html->link('', array('controller' => '', 'action' => '')); ?></div>
							</td>
						</tr>
					</table>
				</li>
				<li>
					<table>
						<tr>
							<td><?php echo $this->Html->image('profil/profilme.jpg'); ?></td>
							<td><h4>Pierre Dupont</h4><em>Agent immobilier</em></td>
							<td>
								<div class="msg"><?php echo $this->Html->link('', array('controller' => '', 'action' => '')); ?></div>
								<div class="delete"><?php echo $this->Html->link('', array('controller' => '', 'action' => '')); ?></div>
							</td>
						</tr>
					</table>
				</li>
			</ul>
		</div>
	</div>
</div>