<?php

// 0. 判断是 POST 提交还是正常 GET 请求
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // 1. 接收请求提交的参数
  $username = isset($_POST['username']) ? $_POST['username'] : '';
  $password = isset($_POST['password']) ? $_POST['password'] : '';

  // 将用户填写的信息记在一个容器
  // $fill_username = $username;

  // isset
  // 可以用来判断一个成员是否被定义
  // 判断关联数组中是否存在一个键，并且忽略 notice
  // $isset = isset($_POST['agree']);

  $agree = isset($_POST['agree']) && $_POST['agree'] === 'on';

  // 2. 根据业务判断参数
  if ($username === '') {
    // 2.1 用户名没填
    $message = '用户名没有还混什么';
  } elseif ($password === '') {
    $message = '告诉我密码是什么';
  } elseif (!$agree) {
    $message = '必须同意霸王条款';
  } else {
    // 填写的都是正常的
    $line = $username . '|' . $password . "\n";
    file_put_contents('user-list.txt', $line, FILE_APPEND);
    $message = "不错不错";
  }

  // 3. 作出反馈
  // if 里面相当于作出反馈

  // 表单处理三部曲
  // 1. 接收参数
  // 2. 参数合法化校验
  // 3. 数据持久化
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>注册用户</title>
</head>
<body>
  <!-- $_SERVER['PHP_SELF'] 获取到的是当前文件在这个网站中的访问路径, 注意不是文件路径 -->
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
    <table>
      <tr>
        <td>用户名</td>
        <td><input type="text" name="username" value="<?php echo isset($username) ? $username : ''; ?>"></td>
      </tr>
      <tr>
        <td>密码</td>
        <td><input type="password" name="password"></td>
      </tr>
      <tr>
        <td>同意注册协议</td>
        <td><input type="checkbox" name="agree"<?php echo isset($agree) && $agree ? ' checked' : '' ?>></td>
      </tr>
      <?php if (isset($message)): ?>
      <tr>
        <td></td>
        <td><?php echo $message; ?></td>
      </tr>
      <?php endif ?>
      <tr>
        <td></td>
        <td><button type="submit">注册</button></td>
      </tr>
    </table>
  </form>
</body>
</html>
