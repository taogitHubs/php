<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>这是一个包含 PHP 脚本的网页</title>
</head>
<body>
  <h1>这是一个包含 PHP 脚本的网页</h1>
  <p>这里原封不动的输出</p>

  <?php
  // 这里是 PHP 代码，必须满足 PHP 语法
  $foo = 'bar';
  echo $foo;
  ?>

  <p>这里也不变</p>

  <p><?php echo '<b>这是 PHP 输出的</b>'; ?></p>
</body>
</html>
