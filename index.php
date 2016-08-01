<?php

#定义字符集
header('Content-Type:text/html;charset=utf-8');

#定义是否生成目录安全文件
#define('BUILD_DIR_SECURE', false);

#开启调试模式
define('APP_DEBUG', true);
//定义常量 用于文件上传
define('UPLOAD_PATH',str_replace('\\','/',__DIR__)); //公司上传图片的路径
#制定文件上传路径
define('FILE_PATH','/Public/Admin/uploads/cimg/');//保存文件路径
//echo UPLOAD_PATH . FILE_PATH ;die;
//define('APP_PATH','./Application/');
#引入ThinkPHP.php项目接口文件
include './ThinkPHP/ThinkPHP.php';