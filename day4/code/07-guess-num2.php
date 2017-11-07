<?php

function init () {
  // 第一次请求 创建一个新的随机数
  $random_num = random_int(0, 100);
  file_put_contents('num2.txt', $random_num);
}

// 1. 判断是否是表单提交
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  init();

} else {

  $old = (int)file_get_contents('num2.txt');
  $compare = isset($_POST['num']) && is_numeric($_POST['num'])
    ? (int)$_POST['num']
    : -1;

  if ($compare === -1) {
    // 提交的不是一个合理是数字字符串
    echo "不是一个合理的数字";
  } else {
    // 合理比较
    file_put_contents('logs.txt', $compare . ',', FILE_APPEND);
    // 先读取已经有了记录
    $logs = file_get_contents('logs.txt');
    // 去掉文件内容最后的逗号
    $logs = rtrim($logs, ',');
    // 按照逗号分隔拆分
    $logs_array = explode(',', $logs);
    // 判断是还有机会
    if (count($logs_array) > 10) {
      // 超出范围
      init();
      // 删除记录文件
      unlink('logs.txt');
      echo "没机会了，游戏结束";
    } else {

      if ($old > $compare) {
        echo "小了";
      } elseif ($old < $compare) {
        echo "大了";
      } else {
        init();
        echo "答对了";
      }
    }
  }

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
    li {
      display: inline-block;
      list-style: none;
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
      <li>记录：</li>
      <?php foreach ($logs_array as $log): ?>
        <li><?php echo $log; ?></li>
      <?php endforeach ?>
    </ol>
  </form>
</body>
</html>
