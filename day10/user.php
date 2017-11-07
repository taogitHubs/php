<?php 

$conn=mysqli_connect('127.0.0.1','root','123.com','demo');

if(!$conn){
	die('连接失败');
}

$query=mysqli_query($conn,'select * from banji;');
if(!$query){
	die('查询失败');
}
//遍历结果集
while ($row=mysqli_fetch_assoc($query)) {
	$data[]=$row;
}
//响应
$json=json_encode($data);
echo $json;
