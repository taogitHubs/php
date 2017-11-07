<?php

// echo 'hello world';
// // 不支持特殊的转义符
// echo 'hello\nworld';

// // 单引号字符串中转义符只能在单引号前面用
// echo 'I\'m a better man';

// echo "hello world";

// echo "hello\nworld";


// $foo = 'zhangsan';
// // 双引号字符串支持变量解析
// echo "$foo 你好";
// echo '$foo 你好';
// 总结：
// 双引号字符串多了两个特点
// 1. 变量解析
// 2. 转义符
// 不需要以上两个功能时尽量使用单引号字符串，效率更高
// 功能越强大，效率越低
//

// 字符串函数
$foo = 'zhangsan';
echo substr($foo, 2);
