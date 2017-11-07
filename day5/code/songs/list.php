<?php
// 1. 读取文件中的 JSON 字符串
$json_contents = file_get_contents('storage.json');
// 2. 将 JSON 字符串 转换成一个 PHP 中数组
$songs = json_decode($json_contents);

// 3. 遍历这个数组渲染每一个 tr 标签
// 这里不需要遍历，在下面与 HTML 混编

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>音乐列表</title>
  <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
  <div class="container">
    <h1 class="display-3 text-center py-5">音乐列表</h1>
    <hr>
    <a href="new.php" class="btn btn-info">添加</a>
    <table class="table table-bordered table-striped table-hover">
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
          <td><?php echo $song->album; ?></td>
          <td><audio src="<?php echo $song->source; ?>" controls></audio></td>
          <td><button class="btn btn-danger btn-sm">删除</button></td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</body>
</html>
