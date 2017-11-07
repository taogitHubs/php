<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo "title"; ?></title>
</head>
<body>
  <?php echo "title"; ?>

  <?php $age = 19; if ($age > 18) { ?>
    <h1>成年人</h1>
    <p>成年人可以晚上不回家</p>
  <?php } else { ?>
    <h1>小朋友</h1>
    <p>小朋友不能吃糖果</p>
  <?php } ?>

  <?php for ($i = 0; $i < 10; $i++) { ?>
  <p><?php echo $i; ?></p>
  <?php } ?>
</body>
</html>
