<?php
function init(){
	file_put_contents('log.txt', '');
	$num = random_int(0, 100);
	file_put_contents('number2.txt', $num);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
	init();
}else{
	$newnum = (int)file_get_contents('number2.txt');
	$post_num=isset($_POST['num']) && is_numeric($_POST['num'])? (int)$_POST['num']:-1;

	if ($post_num === -1) {
		echo "输入有误";
		$oldnum=explode("\n",file_get_contents('log.txt'));
	}else{
		file_put_contents('log.txt', $post_num . "\n",FILE_APPEND);
		$oldnum=explode("\n",file_get_contents('log.txt'));
		if(count($oldnum)<11){
			if($post_num > $newnum) {
				$cs=11-count($oldnum);
				echo "还剩". $cs . "次大了";
			}elseif($post_num < $newnum){
				$cs=11-count($oldnum);
				echo "还剩" . $cs. "次小了";
			}else{
				unlink('log.txt');
				init();
				echo "正确";
			}
		}else{
			if($post_num == $newnum){
				echo "正确";
			}else{
				file_put_contents('log.txt', '');
				echo "你没有机会了";
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
  </style>
</head>
<body>
  <h1>猜数字游戏</h1>
  <p>Hi，我已经准备了一个 0 - 100 的数字，你需要在仅有的 10 机会之内猜对它。</p>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="number" min="0" max="100" name="num" placeholder="随便猜">
    <button type="submit">试一试</button>
    <br>
      <?php if(isset($oldnum)): ?>
		<?php foreach ($oldnum as $value):?>
			<span><?php echo $value ?></span>
		<?php endforeach ?>
	<?php endif ?>
  </form>
</body>
</html>