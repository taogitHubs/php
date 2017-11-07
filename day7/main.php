<?php 

$yanzheng=isset($_COOKIE['denlu'])&& $_COOKIE['denlu'] === '1';

if(!$yanzheng){
	header('Location:/day7/login.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	成功
</body>
</html>