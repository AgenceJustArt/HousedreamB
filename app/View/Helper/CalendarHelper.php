<?php
class CalendarHelper extends AppHelper {
	
	
	
	public function escape($content){
		
		$result = strip_tags($content); 
		$result = substr($result,0,200).'...';
		return $this->output($result);
		
	}
	
	
	public function find($date){
		
		$date = explode('-',$date);
		$year = $date[0];
		$month = $date[1];
		$day = substr_replace($date[2],'','2');
		
		$monthText = array(
		'01'=>'JAN',
		'02'=>'FEV',
		'03'=>'MAR',
		'04'=>'AVR',
		'05'=>'MAI',
		'06'=>'JUN',
		'07'=>'JUL',
		'08'=>'AOU',
		'09'=>'SEP',
		'10'=>'OCT',
		'11'=>'NOV',
		'12'=>'DEC'
		);
		return $this->output($day.'<span>'.$monthText[$month].'</span>');
		
	}
	
	public function format($date,$param=null){
		
		$datetime = explode(' ',$date);
		$date = $datetime[0];
		$time = $datetime[1];
		$date = explode('-',$date);
		$year = $date[0];
		$month = $date[1];
		$day = substr_replace($date[2],'','2');
		$time = explode(':',$time);
		$hour = $time[0];
		$minut = $time[1];
		$second = $time[2];
	
		if(isset($param) && $param==true){
			return $this->output($hour.'h'.$minut);
		}
		else{
			return $this->output($day.'/'.$month.'/'.$year);
		}
		
	}
	
	public function fr($date){
		
		$datetime = explode(' ',$date);
		$date = $datetime[0];
		$time = $datetime[1];
		$date = explode('-',$date);
		$year = $date[0];
		$month = $date[1];
		$day = substr_replace($date[2],'','2');
		$time = explode(':',$time);
		$hour = $time[0];
		$minut = $time[1];
		$second = $time[2];
	
		
		

			return $this->output('Le '.$day.'/'.$month.'/'.$year.' à '.$hour.'h'.$minut);
		
		
	}
	

	
	
	
	
}
?>