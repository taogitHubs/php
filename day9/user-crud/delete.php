<?php

// 载入公共的函数文件
require_once 'functions.php';

// 1. 接收参数（校验）
// if (empty($_GET['item'])) {
if (empty($_GET['id']) || !is_numeric($_GET['id'])) {
  // 没有提交我们需要的id
  exit('shit1');
}

$id = $_GET['id'];
var_dump($id);

// 2. 根据参数删除数据
$conn = db_connect();

$query = mysqli_query($conn, "delete from banji where id={$id};");

if (!$query) {
  // 查询失败
  exit('shit2');
}

// mysqli_affected_rows 获取的是 $conn 最后一次查询受影响行数
$affected_rows = mysqli_affected_rows($conn); 

if ($affected_rows !== 1) {
  exit('shit3');
}

// 3. 响应（跳转）
header('Location: /day9/user-crud/');
