<?php
session_start();

$token = $_POST['token'] ?? '';

if ($token !== $_SESSION['token']) {
    // token不匹配，禁止访问
    header('HTTP/1.1 403 Forbidden');
    $_SESSION['token'] = bin2hex(random_bytes(16));
    echo 'Access denied';
    exit;
}else{
    $_SESSION['token'] = bin2hex(random_bytes(16));
    if($_POST['username']=='admin' && $_POST['password']=='123456'){
        echo '登录成功!';
        echo '你是管理员可以访问文件管理页面！';
    }else{
        echo '登录失败！';
    }
}