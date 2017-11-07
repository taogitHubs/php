<?php 
	if($_SERVER['REQUEST_METHOD']==='POST'){
		$usrename=isset($_POST['usrename'])? $_POST['usrename']:'';
		$password=isset($_POST['password'])? $_POST['password']:'';
		$xuz=isset($_POST['xuz']) && $_POST['xuz'] ==='on'; 
		if ($usrename == '') {
			echo "用户名";
		}elseif($password == ''){
			echo "密码";
		}elseif(!$xuz){
			echo "请同意";
		}else{
			echo "注册成功";
			$txt=$usrename . '|' . $password . "\n";
			file_put_contents('3.txt', $txt,FILE_APPEND);
			$password='';
		}
	}

 ?>
<!DOCTYPE html>.
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<div>用户名:<input type="text" name="usrename" value="<?php echo isset($usrename)? $usrename:''; ?>"></div>
		<div>密码:<input type="password" name="password" value="<?php echo isset($password)? $password:''; ?>"></div>
		<div>同意协议 <input type="checkbox" name="xuz" <?php echo isset($xuz)&&$xuz ? 'checked':''; ?>></div>
		<button>注册</button>
	</form>
</body>
</html>