<?php

// $str = '2020-12-12 12:12:12';

// // 将一个有格式的时间字符串转换为一个时间戳
// $timestamp = strtotime($str);

// echo date('d', $timestamp);

// 如果遇见时间对不上，一般是时区设置有问题
// 可以修改配置文件中的默认时区
echo date('Y-m-d H:i:s');
