<?php 
//读取json文件
$json_contents=file_get_contents('storage.json');
//将json文件转换为一个php中的数组
$songs = json_decode($json_contents);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>音乐</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
	<div class="container">
		<h1 class="display-3 text-center py-2">音乐列表</h1>
		<hr>
		<a href="new.php">增加</a>
		<table class="table table-bordered table-hover">
			<thead class="thead-inverse">
				<tr>
					<th>标题</th>
					<th>艺术家</th>
					<th>专辑</th>
					<th>音乐</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($songs as $song): ?>
					<tr>
						<td><?php echo $song->title; ?></td>
						<td><?php echo $song->artist; ?></td>
						<td><?php echo $song-> album;?></td>
						<td><audio src="<?php echo $song->source;?>" controls></audio></td>
						<td><button class="btn btn-danger btn-sm">删除</button></td>
					</tr>
				<?php endforeach ?> 
			</tbody>
		</table>
	</div>
</body>
</html>