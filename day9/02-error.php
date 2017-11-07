<?php

$conn = mysqli_connect('127.0.0.1', 'root', 'wanglei', 'demo111');

if (!$conn) {
  // 如果连接失败报错
  die('<h1>Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error() . '</h1>');
}
