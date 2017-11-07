<?php

// http://api.day-11.dev/users.php

$data = array(
  array(
    'id' => 1,
    'name' => 'zhangsan'
  ),
  array(
    'id' => 2,
    'name' => 'zhangsan'
  ),
  array(
    'id' => 3,
    'name' => 'zhangsan'
  )
);


$json = json_encode($data);
// => [ {}, {} ]

// 允许哪些源对我发起跨域请求
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
echo $json;
