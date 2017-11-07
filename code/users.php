<?php

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

header('Content-Type: application/json');

echo json_encode($data);
