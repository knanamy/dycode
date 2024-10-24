<?php
//登录成功首页文件-采用session验证
//判断省去了数据库查询获取帐号密码的操作 直接赋值
session_start();
if($_SESSION['username']!='admin' && $_SESSION['password']!='123456'){
    header('Location: admin-s.php');
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>后台首页</title>
</head>
<body>
<h1>后台首页</h1>
<p>欢迎您，<?php echo $_SESSION['username']; ?>！</p>
<p><a href="logout-s.php">退出登录</a></p>
</body>
</html>
