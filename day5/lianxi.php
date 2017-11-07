<?php 
//应用场景
//1.重定向
// header()用于设置响应的响应头 参数为 -> 'key:value' 字符串
// Location:请求地址
// header('Location:http://www.baidu.com'); //直接跳转到百度去
// header('Content-type: text/css');//展示源代码正常为text/html
// Content-type:内容的类型，响应体的内容类型

// 将内容类型设置为application/octet‐stream 目的是告诉浏览器我给你的文件你看不懂，你把它下载下来
// header('Content‐Type: application/octet‐stream');
// 设置默认下载文件名
// header('Content‐Disposition: attachment; filename=demo.txt');
// GET - 从指定的资源请求数据。
// POST - 向指定的资源提交要被处理的数据
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>你看不见我</h1>
</body>
</html>