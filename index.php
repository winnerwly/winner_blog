<?php
$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';    
     
$allow_origin = array(    
    'http://127.0.0.1:4200',    
    'http://localhost:4200'   
);    
     
if(in_array($origin, $allow_origin)){    
    // 设置请求域名
    header('Access-Control-Allow-Origin:'.$origin);    
} 
// 设置请求方式
header('Access-Control-Allow-Methods:POST');    
// 设置请求类型
header('Access-Control-Allow-Headers:x-requested-with,content-type');    
// 允许用户携带cookie访问
header('Access-Control-Allow-Credentials: true');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);

// 定义应用目录
define('APP_PATH','./App/');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单