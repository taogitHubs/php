<?php
// 1. 读取文件内容到一个变量中   => 文件内容字符串
$contents = file_get_contents('names.txt');

// 2. 将这个变量通过\n(换行)分隔 => 包含每行字符串的一个数组
$lines = explode("\n", $contents);

// 3. 遍历这个数组，
foreach ($lines as $item) {
  // $item => '1 | 朱芳 | 18 | b.unyrl@tpwpqt.st | http://XEP.VC'
  // 解析每一行
  $tempArray = explode('|', $item);
  if (count($tempArray) !== 5) {
    continue; // 当前行不是我们要的数据
  }

  // 记录下每一行应该有的数据
  $list[] = $tempArray;
}

//
// 一般在最上面的代码中组织数据
// 在下面与HTML混编过程中输出
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>全体同志列表</title>
</head>
<body>
  <h1>同志们好</h1>
  <table border="1">
    <thead>
      <tr>
        <th>编号</th>
        <th>姓名</th>
        <th>年龄</th>
        <th>邮箱</th>
        <th>网址</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($list as $infos): ?>
      <tr>
        <?php foreach ($infos as $info): ?>
        <!-- 先判断当前 $info 是不是一个网址 -->
        <!-- 判断 $info 是不是一个 以 http://开头的字符串 -->
          <?php if (strpos($info, 'http://') === 1): ?>
            <td><a href="<?php echo strtolower(trim($info)); ?>"><?php echo substr(trim($info), 7); ?></a></td>
          <?php else: ?>
            <td><?php echo trim($info); ?></td>
          <?php endif ?>
        <?php endforeach ?>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</body>
</html>
