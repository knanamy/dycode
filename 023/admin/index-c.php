<?php


if($_COOKIE['username']!='admin' and $_COOKIE['password']!='123456'){
    header('Location: admin-c.php');
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
<p>欢迎您，<?php echo $_COOKIE['username']; ?>！</p>
<p><a href="logout-c.php">退出登录</a></p>
</body>
</html>
