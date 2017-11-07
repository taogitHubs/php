<?php

// 1. 读取文件内容
$json = file_get_contents('data.json');
// 2. 反序列化
// json_decode 第二个参数可以用来指定返回数据都采用 关联数组的方式 描述对象
$songs = json_decode($json, true);
// 3. 遍历数据渲染HTML
// var_dump($songs);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>音乐列表</title>
  <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
  <div class="container py-5">
    <h1 class="display-3">音乐列表</h1>
    <hr>
    <div class="px-2 mb-3">
      <a href="" class="btn btn-secondary btn-sm">添加</a>
    </div>
    <table class="table table-bordered table-striped table-hover">
      <thead class="thead-inverse">
        <tr>
          <th class="text-center">标题</th>
          <th class="text-center">歌手</th>
          <th class="text-center">海报</th>
          <th class="text-center">音乐</th>
          <th class="text-center">操作</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php foreach ($songs as $item): ?>
        <tr>
          <td><?php echo $item['title']; ?></td>
          <td><?php echo $item['artist']; ?></td>
          <td>
            <?php foreach ($item['images'] as $img): ?>
            <img src="<?php echo $img; ?>" alt="">
            <?php endforeach ?>
          </td>
          <td><audio src="<?php echo $item['source']; ?>" controls></audio></td>
          <td><button class="btn btn-danger btn-sm">删除</button></td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</body>
</html>
