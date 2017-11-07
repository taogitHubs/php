<?php 
	$contents=file_get_contents('./1.txt') ;
	$list=explode("\n", $contents);
	foreach ($list as $item) {
		$infos=explode('|', $item);
		if (count($infos)!==5) {
			continue;
		}
		$lines[]=$infos;
	};
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 	<style type="text/css">
		table{
			border-collapse:collapse;
			text-align: center;
		}
 	</style>
 </head>
 <body>
 	<table border="1px">
 		<thead>
 			<tr>
 				<td>序号</td>
 				<td>姓名</td>
 				<td>年龄</td>
 				<td>邮箱</td>
 				<td>网站</td>
 			</tr>
 		</thead>
 		<tbody>
 			<?php foreach ($lines as $item) : ?>

 			<tr>

 				<?php foreach ($item as  $line) : ?>

 				<?php if(strpos(trim($line), 'http://') === 0) : ?>
 					<td>
 					<a href="<?php echo strtolower(trim($line)) ?>">

 						<?php echo substr(trim($line), 7); ?>
 					</a>
 					</td>

 				<?php else: ?>
 					<td><?php echo trim($line); ?></td>
				<?php endif ?>

 				<?php endforeach ?>
 			</tr>
			
 			<?php endforeach ?>

 		</tbody>
 	</table>
 </body>
 </html>
