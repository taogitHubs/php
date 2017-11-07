<?php

require_once 'functions.php';

// 1. 接收参数（校验）
if (empty($_GET['id']) || !is_numeric($_GET['id'])) {
  exit('未正确提交ID');
}

$id = $_GET['id'];

$conn = db_connect();

$query = mysqli_query($conn, "select * from banji where id = {$id}");

if (!$query) {
  exit('查询对应数据失败');
}

$user = mysqli_fetch_assoc($query);

if (!$user) {
  exit('未找到对应数据');
}
// 明确找到对应用户$user

if($_SERVER['REQUEST_METHOD']==='POST'){
  fun();
}
function fun(){
  global $user;
  if (empty($_POST['name']) || empty($_POST['gender']) || empty($_POST['birthday'])) {
    $GLOBALS['error_str'] = '完整填写表单';
    return;
  }
  $user['name']=$_POST['name'];
  $user['sex']=$_POST['gender'] === '-1'
    ? null
    : $_POST['gender'] === 'male' ? 0 : 1;
  $user['riqi']=$_POST['birthday'];

  if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
    $ext_name = str_replace('image/', '', $_FILES['avatar']['type']);
    $target = './assets/img/img-' . uniqid() . '.' . $ext_name;
    // var_dump($target);
    $is_ok = move_uploaded_file($_FILES['avatar']['tmp_name'], $target);
    if($is_ok){
      $user['tx'] = '/day9/user-crud' . substr($target, 1);
    }
  }
  $conn = db_connect();
  $sql="update banji set tx='{$user['tx']}' , name='{$user['name']}' , sex={$user['sex']} , riqi='{$user['riqi']}'  where id={$user['id']}";
  $query=mysqli_query($conn,$sql);
  if(!$query){
     $GLOBALS['error_str'] = '更新失败';
    return;
  }
  if(mysqli_affected_rows($conn) !==1){
    return;
  }

  redirect('/day9/user-crud/index.php');
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
    <h1 class="heading">编辑用户</h1>
    <?php if (!empty($error_str)): ?>
    <div class="alert alert-danger"><?php echo $error_str; ?></div>
    <?php endif ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?> ?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="avatar">头像</label>
        <input type="file" class="form-control" id="avatar" name="avatar">
        <img src="<?php echo $user['tx']; ?>" alt="">
      </div>
      <div class="form-group">
        <label for="name">姓名</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['name']; ?>">
      </div>
      <div class="form-group">
        <label for="gender">性别</label>
        <select class="form-control" id="gender" name="gender">
          <option value="-1">请选择性别</option>
          <option value="male"<?php echo $user['sex'] == 0 ? ' selected' : ''; ?>>男</option>
          <option value="female"<?php echo $user['sex'] == 1 ? ' selected' : ''; ?>>女</option>
        </select>
      </div>
      <div class="form-group">
        <label for="birthday">生日</label>
        <input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo $user['riqi']; ?>">
      </div>
      <button class="btn btn-primary">保存</button>
    </form>
  </main>
</body>
</html>
