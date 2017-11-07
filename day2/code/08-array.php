<?php
// ========== 索引数组（键为数字索引） ============
// 5.4.0 定义数组可以通过与 JavaScript 相同的方式
// $arr = [1, 2, 3, 4];

// for ($i = 0; $i < count($arr); $i++) {
//   echo $i;
// }

// 兼容性强
// $arr = array('12312', 2, 3, 4);

// for ($i = 0; $i < count($arr); $i++) {
//   echo $arr[$i];
// }


// ========== 关联数组（键为数字或者字符串） ============

// 关联数组与 JS 中的 键值对相同
// var dict = {
//   key1: 'value1',
//   key1: 'value1',
//   key1: 'value1',
// }
// dict['key1']

$dict = array(
  'key1' => 'value1',
  'key2' => 'value2',
  1 => 'value3',
  // 如果出现相同键的情况后面的会覆盖前面的
  1 => 'value4',
  true => 'value5'
);

// foreach ($dict as $key => $value) {
//   echo $key, $value;
//   echo '<br>';
// }

// 一般用于调试
print_r($dict);
