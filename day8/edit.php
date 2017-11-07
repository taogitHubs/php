<?php 
function fun2(){
 if($_FILES['avatar']['error'] !== 0){
  echo '选择要上传的文件';
  return;
 }

 $temp_path = $_FILES['avatar']['tmp_name'];

 $file_name = $_FILES['avatar']['name'];
 
  if (!move_uploaded_file($temp_path, 'assets/img/'.$file_name)) {
   echo "上传失败";
   return;
  }
  move_uploaded_file($temp_path, 'assets/img/'.$file_name);

 if(empty($_POST['name'])){
  echo "输入姓名";
  return;
 }

 // var_dump($_POST['gender']);
 // var_dump($_POST['birthday']);
 if($_POST['gender']==='请选择性别'){
  echo "请选择性别";
  return;
 }

 if($_POST['birthday']===''){
  echo "输入日期";
  return;
 }

}

 if($_SERVER['REQUEST_METHOD']==='POST'){
    fun2();
      $conn=mysqli_connect('127.0.0.1','root','123.com','demo');
    if (!$conn) {
      // 如果连接失败报错
      die('<h1>Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error() . '</h1>');
    }

    $img=$_FILES['avatar']['name'];
    $user=$_POST['name'];
    $sex=$_POST['gender']==='男'?1:0;
    $rq=$_POST['birthday'];
    $sd="insert into banji value(null,'$img','$user','$sex','$rq');";
    var_dump($sd);
    $query=mysqli_query($conn,$sd);
    var_dump($query);
    if (!$query) {
    die('<h1>查询失败</h1>');
    }
 
  }
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>XXX管理系统</title>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">XXX管理系统</a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/day8/list.php">用户管理</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">商品管理</a>
      </li>
    </ul>
  </nav>
  <main class="container">
    <h1 class="heading">添加用户</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" >
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
          <option>请选择性别</option>
          <option>男</option>
          <option>女</option>
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
