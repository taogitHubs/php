<?php

// // 打印 PHP 信息
// phpinfo();

$str = 'hello world';

echo strlen($str);

echo "<br>";

$str = '你好啊';

// 一个中文字符在获取长度是3个
echo mb_strlen($str);

// 宽字符集
// 在 PHP 中处理款=宽字符集用 mb_ 开头的函数

// explode('|', $str)
