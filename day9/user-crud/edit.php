<?php

require_once 'functions.php';

function postback () {

  if (empty($_POST['name']) || empty($_POST['gender']) || empty($_POST['birthday'])) {
    $GLOBALS['error_str'] = '完整填写表单';
    return;
  }

  if (!(isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK)) {
    $GLOBALS['error_str'] = '上传头像失败';
    return;
  }
  //获取上传的文件的后缀名
  $ext_name = str_replace('image/', '', $_FILES['avatar']['type']);
  // 设置要移动到的目录
  $target = './assets/img/img-' . uniqid() . '.' . $ext_name;
  var_dump($target);
  // 移动文件
  $is_ok = move_uploaded_file($_FILES['avatar']['tmp_name'], $target);
  var_dump($_FILES['avatar']['tmp_name']);
  if (!$is_ok) {
    $GLOBALS['error_str'] = '上传头像失败';
    return;
  }

  // 保存数据
  $name = $_POST['name']; // zhangsan

  $gender = $_POST['gender'] === '-1'
    ? null
    : $_POST['gender'] === 'male' ? 0 : 1;

  $birthday = $_POST['birthday'];
  $avatar = '/day9/user-crud' . substr($target, 1);

  // 建立数据库连接，将数据保存
  $conn = db_connect();

  $sql_str = "insert into banji value (null, '{$avatar}' ,'{$name}', {$gender} , '{$birthday}');";
  var_dump($sql_str);
  $query=mysqli_query($conn, $sql_str);
var_dump($query);
  $affected_rows = mysqli_affected_rows($conn);

  if ($affected_rows !== 1) {
    $GLOBALS['error_str'] = '保存失败，请重试';
    return;
  }

  // redirect('/day9/user-crud/');

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  postback();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>XXX管理系统</title>
  <link rel="stylesheet" href="/day9/user-crud/assets/css/bootstrap.css">
  <link rel="stylesheet" href="/day9/user-crud/assets/css/style.css">
</head>
<body>
  <?php include '_nav.php'; ?>
  <main class="container">
    <h1 class="heading">添加用户</h1>
    <?php if (!empty($error_str)): ?>
    <div class="alert alert-danger"><?php echo $error_str; ?></div>
    <?php endif ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="avatar">头像</label>
        <input type="file" class="form-control" id="avatar" name="avatar">
      </div>
      <div class="form-group">
        <label for="name">姓名</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="form-group">
        <label for="gender">性别</label>
        <select class="form-control" id="gender" name="gender">
          <option value="-1">请选择性别</option>
          <option value="male">男</option>
          <option value="female">女</option>
        </select>
      </div>
      <div class="form-group">
        <label for="birthday">生日</label>
        <input type="date" class="form-control" id="birthday" name="birthday">
      </div>
      <button class="btn btn-primary">保存</button>
    </form>
  </main>
</body>
</html>
