<?php
function fun(){
  if (empty($_POST['username'])) {
    $GLOBALS['error_message'] =  '请输入用户名';
    return;
  }
  if(empty($_POST['password'])){
    $GLOBALS['error_message'] =  '请输入密码';
    return;
  }
  $password=$_POST['password'];
  $username=$_POST['username'];

  $jsons=file_get_contents('data.json');
  $json=json_decode($jsons,true);
  foreach ($json as $value) {
    if ($username == $value['username']) {
      $user=$value;
      break;
    }
  }
  if(!isset($user)){
    $GLOBALS['error_message'] = "用户名或密码错误";
    return;
  }
  if($password !==$user['password']){
    $GLOBALS['error_message'] = "用户名密码错误";
    return;
  }
  setcookie('show',$username);
  setcookie('denlu',1);

  header('Location:/day7/main.php');
}

if($_SERVER['REQUEST_METHOD']==='POST'){
  fun();
}
$_username=isset($_COOKIE['show']) ? $_COOKIE['show']:'';

$inpt_value=isset($_POST['username'])?$_POST['username']:'';

$_value=empty($inpt_value) ? $_username : $inpt_value;

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>登录</title>
  <link rel="stylesheet" href="bootstrap.css">
  <style>
    body {
      background-color: #f8f9fb;
    }

    .login-form {
      width: 360px;
      margin: 100px auto;
      padding: 30px 20px;
      background-color: #fff;
      border: 1px solid #eee;
    }

    .login-form h1 {
      font-size: 30px;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <form class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <h1>登录</h1>
    <?php if (isset($error_message)): ?>
    <div class="alert alert-warning" role="alert">
      <?php echo $error_message; ?>
    </div>
    <?php endif ?>
    <div class="form-group">
      <label for="username">用户名</label>
      <input type="text" class="form-control" name="username" id="username" value="<?php echo $_value; ?>">
    </div>
    <div class="form-group">
      <label for="password">密码</label>
      <input type="password" class="form-control" name="password" id="password">
    </div>
    <button type="submit" class="btn btn-primary btn-block">登录</button>
  </form>
</body>
</html>