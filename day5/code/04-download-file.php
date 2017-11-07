<?php
// 将内容类型设置为 application/octet-stream 目的就是告诉客户端浏览器
// 我给你的响应体内容你看不懂（你没有办法解析），你把它下载下来
header('Content-Type: application/octet-stream');
// 设置浏览器默认下载名称
header('Content-Disposition: attachment; filename=demo.txt');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <h1>这里的HTML不会被显示出来</h1>
</body>
</html>
