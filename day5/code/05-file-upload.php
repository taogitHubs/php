<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_FILES['avatar']['error'] === 0) {
    // 正常上传一个文件
    $name = $_FILES['avatar']['name'];
    // 临时路径
    $temp_path = $_FILES['avatar']['tmp_name'];

    $success = move_uploaded_file($temp_path, './' . $name);
    var_dump($success);
  }
}

// echo '<pre>';
// var_dump($_FILES);
// echo '</pre>';
// 对于表单的 enctype 为 multipart/form-data 接收的方式就会变成 $_FILES
//
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <!--
    如果一个表单中有文件域，
    1. 表单的提交方式 必须是 post
    2. 表单的编码类型 必须是 multipart/form-data
  -->
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

    <input type="file" name="avatar">

    <button type="submit">上传</button>

  </form>
</body>
</html>
