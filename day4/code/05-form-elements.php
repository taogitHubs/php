<?php
echo "<pre>";
var_dump($_POST);
echo "</pre>";

// $arr[] = 1;
// $arr[] = 2;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <!-- radio 如果需要提交必须要加 value 属性 -->
    <label><input type="radio" name="gender" value="nan"> 男</label>
    <label><input type="radio" name="gender" value="nv"> 女</label>

    <br>

    <!-- PHP 会自动处理 表单中 键后面有 [] 值  -->
    <ul>
      <li><label><input type="checkbox" name="fun[]" value="football">足球</label></li>
      <li><label><input type="checkbox" name="fun[]" value="basketball">篮球</label></li>
      <li><label><input type="checkbox" name="fun[]" value="earth">地球</label></li>
    </ul>

    <input type="checkbox" name="foo" value="true">


    <select name="subject">
      <option>数学</option>
      <option value="1">英语</option>
      <option>历史</option>
    </select>

    <button type="submit">提交</button>
  </form>
</body>
</html>
