<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php echo "title"; ?>
	<?php $age=15;if($age>18){ ?>
	<h1>雷浩</h1>
	<p>晚上不可以回家</p>
	<?php }else{ ?>
	<h1>雷浩</h1>
	<p>晚上不可睡觉</p>
	<?php } ?>
	<?php for ($i=0; $i <10 ; $i++) { ?>
		<p><?php echo $i; ?></p>
	<?php } ?>
</body>
</html>