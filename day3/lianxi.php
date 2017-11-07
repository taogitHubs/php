
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table border="1px">
			<tr>
				<td>编号</td>
				<td>姓名</td>
				<td>年龄</td>
				<td>邮箱</td>
				<td>网站</td>
			</tr>
			<?php  $contents=file_get_contents('./1.txt') ;
				$arr=explode("\n", $contents);
				for ($i=0; $i < count($arr)-1; $i++) { ?>
					<tr>
						<?php $arr1=explode('|', $arr[$i]);
							for ($j=0; $j <count($arr1) ; $j++) { ?>
								<td><?php echo $arr1[$j]; ?></td>
						<?php };?>
					</tr>
			<?php }; ?>
	</table>
</body>
</html>