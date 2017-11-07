<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // 提交表单（意味着之前已经请求过一次，同时意味着文件肯定存在）
  // 1. 读文件内容
  $num1= (int)file_get_contents('number.txt');
  // 2. 判断文件中的数字与用户提交过来的数字之间差异
  $post_num=isset($_POST['num'])? (int)$_POST['num']:-1;
   if($post_num>$num1){
   	echo "大了";
   }elseif ($post_num<$num1) {
   		echo "小了";
   }elseif($post_num === -1){
   		echo "输入有误";
   }else{
   		echo "猜对了";
   		// 生成一个随机整数（0-100）
		$num = random_int(0, 100);
		// 为了后续请求还能拿到这个随机数，我们将数据保存到一个文件中
		file_put_contents('number.txt', $num);
   }

  // 3. 根据差异给出一个反馈（响应）
}else{
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
  </form>
</body>
</html>