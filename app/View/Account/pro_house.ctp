<div id="house-header" class="row">
	<div class="large-8 columns">
		<h1><?php echo $house['House']['name']; ?></h1>
		<div style="width:300px; height:10px; background-color:#ccc;border-radius:5px;overflow:hidden;">
						<div style="width:240px; height:10px; background-color:#a9bc48;">
						</div>
					</div>
					<br>
					Complétée à 80%
	</div>
	<div class="large-2 columns"><a href="#" class="button blue">Publier</a></div>
	<div class="large-2 columns"><a href="#" class="button red">Supprimer</a></div>
</div>

<?php $object = array('Salle de bain','Chambre','Séjour','Cuisine','Salon','Toilette','Grenier','Cave','Garage'); ?>
<?php $attribute = array('Revêtement','Baignoire','Douche','Vasque','Jacuzzi'); ?>


<div id="house-content" class="row">
	<div class="large-12 columns">
		
		<dl class="tabs vertical" data-tab>
			<?php 

				foreach ($data as $k => $v){
					$v = current($v);
					$active ='';
					if($k==0){ $active = ' class="active"'; }
					echo '<dd'.$active.'><a href="#panel'.$k.'a">'.$v['name'].'</a></dd>';
				} 
			?>
		  
		</dl>
	

		
		<div class="tabs-content vertical">
			

			<?php foreach ($data as $k => $v){ 
				$active = '';
				if($k==0){ $active = 'active'; }
			?>
			
			<!--/////////////////////////////////////////////////////////// -->
			<!--///////// Block de contenu pour chaque catégorie ////////// -->
			<!--/////////////////////////////////////////////////////////// -->
			<div class="content <?php echo $active; ?>" id="panel<?php echo $k; ?>a">
			  	<h4><?php echo $v['RoomCategory']['title']; ?></h4>
			    <p><?php echo $v['RoomCategory']['content']; ?></p>


			    <?php 
			    	// Boucle permettant de récupérer les item d'une catégorie
			    	$object = array(); 
			    	foreach($v['RoomItem'] as $kk=>$vv){
			    		$object[] = $vv['name'];
			    	}
			    ?>



				
				<!--/////////////////////////////////////////////////////////// -->
			    <!-- Formulaire d'ajout d'une piece ou d'un élément à la maison -->
			    <!--/////////////////////////////////////////////////////////// -->
			    <?php 
			    	// Boucle permettant de récupérer les item ou les éléments d'une catégorie
			    	$object = array(); 
			    	foreach($v['RoomItem'] as $kk=>$vv){
			    		$object[] = $vv['name'];
			    	}
			    ?>
			    <div class="row">
			    	<div class="large-10 columns">
			    		<?php echo $this->Form->input('AddObject',array('options'=>$object,'placeholder'=>'Choisir','label'=>false)); ?>
			    	</div>
			    	<div class="large-2 columns">
			    		<?php echo $this->Html->link('Ajouter','/',array('class'=>'button')); ?>
			    	</div>
			    </div>
			    <div style="background-color:#999; border-bottom:1px solid #efeeee;height:1px; width:100%;margin-top:40px;margin-bottom:40px;"></div>
			    <!--/////////////////////////////////////////////////////////// -->
			    <!--////////////////// END /////////////////////////////////////-->
			    <!--/////////////////////////////////////////////////////////// -->



			    


				
				<!--//////////////////////////////////////////////////////////////////////////////// -->
			    <!-- BLOCK non stastique - Apparait en fonction de la table house-item relation ship -->
			    <!--//////////////////////////////////////////////////////////////////////////////// -->
			    <section id="itemDetail">
			    	<?php foreach($house['RoomItem'] as $kk=>$vv){ ?>
				    	<?php 
				    		echo '# '.$vv['name']; 
				    		$itemAttribute = array();
				    		foreach($vv['RoomItemAttribute'] as $kkk=>$vvv){
				    			$detail = array();
				    			foreach($vvv['RoomItemAttributeDetail'] as $kkkk=>$vvvv){
				    				$detail[$vvvv['id']] = $vvvv['name'];
				    			}
				    			$itemAttribute[] = array('name'=>$vvv['name'],'id'=>$vvv['id'],'detail'=>$detail);
				    			$optionAttribute[$vvv['id']] = $vvv['name'];
				    		}
				    		
				    		
				    	?>	
				    	<div class="row">
					    	<div class="large-10 columns">
					    		<?php echo $this->Form->input('AddAttribute',array('options'=>$optionAttribute,'placeholder'=>'Choisir','label'=>false)); ?>
					    	</div>
					    	<div class="large-2 columns">
					    		<?php echo $this->Html->link('Ajouter','/',array('class'=>'button')); ?>
						    	</div>
					    </div>
					    <ul class="large-block-grid-2">
					    	<?php foreach($itemAttribute as $kkk=>$vvv){ ?>
					    		<li>
						    		<table width="100%">
						    			<thead>
						    				<tr>
						    					<td class="header"><?php echo $vvv['name']; ?></td>
						    				</tr>
						    			</thead>
						    			<tbody>
						    				<tr>
						    					<td class="section"><?php echo $this->Form->input('AddAttributeItem',array('options'=>$vvv['detail'],'placeholder'=>'Choisir','label'=>false)); ?></td>
						    				</tr>
						    				<tr>
						    					<td>Carrelage*****     X</td>
						    				</tr>

						    			</tbody>
						    		</table>
						    	</li>
				    		<?php	} ?>
				    		
					    	
					    	
					    </ul>
					 <?php } ?>
			    </section>
				<!--////////////////////////////////////////////////////////////////////////// -->
			    <!--////////////////////////////////// END ////////////////////////////////////-->
			    <!--////////////////////////////////////////////////////////////////////////// -->



			</div>
			<?php } ?>

		
	</div>
	

</div>