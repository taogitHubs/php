<?php 
if($_SERVER['REQUEST_METHOD']==='POST'){
	$username=isset($_POST['username'])? $_POST['username']:'';
	$password=isset($_POST['password'])? $_POST['password']:'';
	$xuz=isset($_POST['xuz']) && $_POST['xuz']==='on';
	if ($username=='') {
		$count="填写用户名";
	}elseif ($password=='') {
		$count="输入密码";
	}elseif (!$xuz) {
		$count="请同意";
	}else{
		$txt=$username . '|' . $password . "\n";
		file_put_contents('3.txt', $txt);
		$count="注册成功";
		$password='';
	}
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<div>用户名<input type="text" name="username" id="username" value="<?php echo isset($username)? $username:''; ?>"></div>
		<div>密码<input type="password" name="password"id="password" value="<?php echo isset($password)? $password:''; ?>"></div>
		<div>是否同意<input type="checkbox" name="xuz" <?php echo isset($xuz)&&$xuz ? 'checked':''; ?>></div>
		<?php if(isset($count)): ?>
			<div><?php echo $count ?></div>
		<?php endif ?>
		<button>提交</button>
	</form>
</body>
</html>