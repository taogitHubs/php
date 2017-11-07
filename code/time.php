<?php

$data = array('time' => time());

// 设置响应类型
header('Content-Type: application/json');

echo json_encode($data);
