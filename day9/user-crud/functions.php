<?php

/**
 * 获取数据库连接对象
 * @return [type] 连接对象
 */
function db_connect () {
  $conn = mysqli_connect('localhost', 'root', '123.com', 'demo');
  if (!$conn) {
    die('连接数据库失败');
  }

  // 设置此次连接通过UTF8编码解析数据
  mysqli_set_charset($conn, 'utf8');

  return $conn;
}

/**
 * 跳转
 * @param  [type] $url [description]
 * @return [type]      [description]
 */
function redirect ($url) {
  header("Location: {$url}");
}
