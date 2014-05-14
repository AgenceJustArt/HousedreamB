<?php
class UploadHelper extends AppHelper {
	
	function img($data,$dir){
		
			// Direction du dossier et création
			$dir = IMAGES.$dir;
			// Gestion du nom du fichier
			// Sépération des terme au point.
			$f = explode('.',$data['name']);
			// extention => Récupération du dernier terme du tableau $f
			$ext = '.'.end($f);
			// nom => Génération du nom de l 'image
			$filename = Inflector::slug(implode('.',array_slice($f,0,-1)),'-');
			
			// Sauvegarde en bdd
			$success = $this->Media->save(array(
				'name'	=> 	$data['name'],
				'url'	=>	date('Y').'/'.date('m').'/'.$filename.$ext
			));
			
			if($success){
				move_uploaded_file($data['Media']['file']['tmp_name'], $dir.DS.$filename.$ext);
			}
			else{
				$this->Session->setFlash("Format non valide","notif",array('type'=>'error'));
			}
		
		$d = array();
		$d['medias'] = $this->Media->find('all',array(
			'conditions'=> array('post_id'=>$post_id)
			));
		$this->set($d);
		
	
		
		

			return $this->output('Le '.$day.'/'.$month.'/'.$year.' à '.$hour.'h'.$minut);
		
		
	}

}
?>