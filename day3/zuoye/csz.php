<?php 
	foreach ($_POST as $name=>$value) {
		$value;
	}
	if(file_get_contents('2.txt')==""){
		define('SJS', random_int(1,100));
		file_put_contents('2.txt', SJS);
		if(file_get_contents('2.txt')>$value){
			echo "小了";
		}elseif(file_get_contents('2.txt')==$value){
			echo "正确";
			define('SJS', random_int(1,100));
			file_put_contents('2.txt', SJS);
		}else{
			echo "大了";
		}
	}else{
		if(file_get_contents('2.txt')>$value){
			echo "小了";
		}elseif(file_get_contents('2.txt')==$value){
			echo "正确";
			define('SJS', random_int(1,100));
			file_put_contents('2.txt', SJS);
		}else{
			echo "大了";
		}
	}
	
	// echo file_get_contents('2.txt');