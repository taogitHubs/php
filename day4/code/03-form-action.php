<?php

// echo 在打印布尔值时 如果值为 false 不输出 值为 true 输出 1
// var_dump(array_key_exists('username', $_GET));

// if (array_key_exists('username', $_GET)) {
//   // 有提交的参数
//   echo '<pre>';

//   var_dump($_GET);

//   echo "\n ----------------------- \n";

//   var_dump($_POST);

//   echo "\n ----------------------- \n";

//   var_dump($_REQUEST);

//   echo "</pre>";
// }
//

// 1. 一般表单提交我们都是采用 post 方式提交到当前文件
// 2. 在当前文件一开始的位置通过判断 请求方式 来辨别到底是 拿表单 还是 提交表单
//

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // 当前是 post 方式请求过来的
  var_dump($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>表单提交地址</title>
</head>
<body>
  <form action="03-form-action.php" method="post">
    <div class="item">
      <label for="username">用户名</label>
      <input type="text" name="username" id="username">
    </div>
    <div class="item">
      <label for="password">密码</label>
      <input type="password" name="password" id="password">
    </div>
    <button type="submit">提交</button>
  </form>

<!--   <pre>

    var a = '123'
    var a = '123'
    var a = '123'

  </pre> -->
</body>
</html>
