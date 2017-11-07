<?php

// // require 载入其他文件
// require './common/config.php';
// // require 载入文件 如果被载入的文件执行出错，此文件后面的代码不再执行

// echo SYSTEM_NAME;


// require_once './common/config.php';
// // require 载入文件 如果被载入的文件执行出错，此文件后面的代码不再执行

// echo SYSTEM_NAME;

// 不给不行
require './common/config1.php';
// 不给算了吧
include './common/config1.php';

echo "接下来的事情";
