<?php 	
	$str=$_GET['data'];
	$arr=Array('adb','a2a8ad7','397sd','6asd23','a5tr6','4gfg45','ahg78','8jhj56','45bcv9');
	$data = array();
	$strlen = strlen($str);
	foreach ($arr as $value) {
		if($str===mb_substr($value,0,$strlen)){
			$data[]=$value;
		}
	}
echo json_encode($data);