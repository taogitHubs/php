<?php

$data = array(
  'time' => time()
);

if (empty($_GET['callback'])) {
  header('Content-Type: application/json');
  echo json_encode($data);
} else {
  // JSONP
  header('Content-Type: application/javascript');
  $json = json_encode($data);
  echo "{$_GET['callback']}({$json})";
}
