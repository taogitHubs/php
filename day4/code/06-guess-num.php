<?php

// // random_int 是 PHP7 的内置函数，老版本需要有以下兼容方案
// // function_exists 可以用于判断函数是否存在，参数就是函数名称
// if (!function_exists('random_int')) {
//   // 不存在 及自己实现一个
//   function random_int($min, $max) {
//      if (!function_exists('mcrypt_create_iv')) {
//          trigger_error(
//              'mcrypt must be loaded for random_int to work',
//              E_USER_WARNING
//          );
//          return null;
//      }

//      if (!is_int($min) || !is_int($max)) {
//          trigger_error('$min and $max must be integer values', E_USER_NOTICE);
//          $min = (int)$min;
//          $max = (int)$max;
//      }

//      if ($min > $max) {
//          trigger_error('$max can\'t be lesser than $min', E_USER_WARNING);
//          return null;
//      }

//      $range = $counter = $max - $min;
//      $bits = 1;

//      while ($counter >>= 1) {
//          ++$bits;
//      }

//      $bytes = (int)max(ceil($bits/8), 1);
//      $bitmask = pow(2, $bits) - 1;

//      if ($bitmask >= PHP_INT_MAX) {
//          $bitmask = PHP_INT_MAX;
//      }

//      do {
//          $result = hexdec(
//              bin2hex(
//                  mcrypt_create_iv($bytes, MCRYPT_DEV_URANDOM)
//              )
//          ) & $bitmask;
//      } while ($result > $range);

//      return $result + $min;
//   }
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // 提交表单（意味着之前已经请求过一次，同时意味着文件肯定存在）
  // 1. 读文件内容
  $old_num = (int)file_get_contents('number.txt');

  // (int) 是将一个字符串强制转换为 int 类型的数字，如果转换失败（不是数字字符串） 返回 0
  // 需要判断是不是一个数字字符串
  // 2. 判断文件中的数字与用户提交过来的数字之间差异
  $postd_num = isset($_POST['num']) && is_numeric($_POST['num']) ? (int)$_POST['num'] : -1;

  if ($postd_num === -1) {
    // 你没有提交服务端需要的数字
    echo "必须要填";
  } else {
    $res = $old_num - $postd_num;

    // 3. 根据差异给出一个反馈（响应）
    if ($res < 0) {
      echo "太大了";
    } elseif ($res > 0) {
      echo "太小了";
    } else {
      // 猜对了到底应该干什么？ 游戏结束
      // 重新开始
      // 生成一个随机整数（0-100）
      $num = random_int(0, 100);
      // 为了后续请求还能拿到这个随机数，我们将数据保存到一个文件中
      file_put_contents('number.txt', $num);
      echo "猜对了";
    }
  }

} else {
  // 生成一个随机整数（0-100）
  $num = random_int(0, 100);
  // 为了后续请求还能拿到这个随机数，我们将数据保存到一个文件中
  file_put_contents('number.txt', $num);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>猜数字</title>
  <style>
    body {
      padding: 100px 0;
      background-color: #2b3b49;
      color: #fff;
      text-align: center;
      font-size: 2.5em;
    }
    input {
      padding: 5px 20px;
      height: 50px;
      background-color: #3b4b59;
      border: 1px solid #c0c0c0;
      box-sizing: border-box;
      color: #fff;
      font-size: 20px;
    }
    button {
      padding: 5px 20px;
      height: 50px;
      font-size: 16px;
    }
  </style>
</head>
<body>
  <h1>猜数字游戏</h1>
  <p>Hi，我已经准备了一个 0 - 100 的数字，你需要在仅有的 10 机会之内猜对它。</p>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="number" min="0" max="100" name="num" placeholder="随便猜">
    <button type="submit">试一试</button>
    <ol>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ol>
  </form>
</body>
</html>
