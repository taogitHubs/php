<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>指令式条件判断</title>
</head>
<body>
  <?php if (true): ?>
    <h1>Hahahaha</h1>
  <?php else: ?>
    <h1>wuwuwuwu</h1>
  <?php endif; ?>


  <?php if (true) { ?>
    <h1>Hahahaha</h1>
  <?php } else { ?>
    <h1>wuwuwuwu</h1>
  <?php } ?>


  <?php foreach ($variable as $key => $value): ?>

  <?php endforeach; ?>
</body>
</html>
