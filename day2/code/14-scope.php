<?php

ini_set('display_errors', 'On'); // 打开错误信息显示
error_reporting(E_ALL);  // 让所有错误信息都显示

// JS 建议都不要使用作用域外定义的变量，效率问题（沿着作用域链查找有性能损耗）
//

// $foo = '123';
// echo $foo;

// function bar ($foo) {
//   echo $foo;
// }

// bar($foo);


// === 可以通过 global 关键词拿到（但是不建议用）
$foo = '123';
$foo2 = '123';
echo $foo;

function bar () {
  global $foo, $foo2; // 手动声明这里需要一个全局的变量

  echo $foo;
}

bar();
