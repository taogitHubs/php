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


// 服务端不配合 客户端永远使用不了JSONP
if (empty($_GET['callback'])) {
  header('Content-Type: application/json');
  echo $json;
} else {
  // 如果是 JSONP 请求 返回 JavaScript
  header('Content-Type: application/javascript');
  // echo "var data = {$json};";
  echo "{$_GET['callback']}({$json});";
}
