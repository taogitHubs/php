<?php

function receive_form () {
  // 1. 校验客户端提交的数据
  // 1.1. 校验标题
  // empty($_POST['title']) === !(isset($_POST['title']) && $_POST['title'] !== '')
  // empty函数的作用就是判断一个成员是否为空（未定义、值为false）
  if (empty($_POST['title'])) {
    // 标题未正常填写
    echo "填写标题";
    return;
  }

  if (empty($_POST['artist'])) {
    // 歌手未正常填写
    echo "填写歌手";
    return;
  }

  echo "校验文件";
  // 2. 保存数据

  // 3. 响应
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // 处理接收校验表单
  // receive_form();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>添加新音乐</title>
  <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
  <div class="container py-5">
    <h1 class="display-3">添加新音乐</h1>
    <hr>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">标题</label>
        <input type="text" class="form-control is-invalid" id="title" name="title">
        <small class="invalid-feedback"></small>
      </div>
      <div class="form-group">
        <label for="artist">歌手</label>
        <input type="text" class="form-control" id="artist" name="artist">
      </div>
      <div class="form-group">
        <label for="images">海报</label>
        <!-- multiple 可以让文件域多选 -->
        <!-- accept 可以指定文件域能够选择的默认文件类型 MIME Type -->
        <!-- image/* 代表所有类型图片 -->
        <!-- 除了使用 MIME 类型 还可以使用文件后缀名限制：.png,.jpg -->
        <input type="file" class="form-control" id="images" name="images" multiple accept="image/*">
      </div>
      <div class="form-group">
        <label for="source">音乐</label>
        <input type="file" class="form-control" id="source" name="source" accept="audio/*">
      </div>
      <button class="btn btn-primary btn-block">保存</button>
    </form>
  </div>
</body>
</html>
