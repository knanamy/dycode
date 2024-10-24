<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台登录</title>
    <style>
        body {
            background-color: #f1f1f1;
        }
        .login {
            width: 400px;
            margin: 100px auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
            padding: 30px;
        }
        .login h2 {
            text-align: center;
            font-size: 2em;
            margin-bottom: 30px;
        }
        .login label {
            display: block;
            margin-bottom: 20px;
            font-size: 1.2em;
        }
        .login input[type="text"], .login input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1.2em;
            margin-bottom: 20px;
        }
        .login input[type="submit"] {
            background-color: #2ecc71;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
        }
        .login input[type="submit"]:hover {
            background-color: #27ae60;
        }
    </style>
</head>
<body>
<div class="login">
    <h2>后台登录</h2>
    <form action="" method="post">
        <label for="username">用户名:</label>
        <input type="text" name="username" id="username" required>
        <label for="password">密码:</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" value="登录">
    </form>
</div>
</body>
</html>

<?php
include '../config.php';
//登录文件
/*
 * 1、接受输入的帐号密码
 * 2、判断帐号密码正确性
 * 3、正确后生成的cookie进行保存
 * 3、1错误的帐号密码就进行提示
 * 4、跳转至成功登录的页面
 */

//1、接受输入的帐号密码
$user=$_POST['username'];
$pass=$_POST['password'];

//2、判断帐号密码正确性
//连接数据库 进行数据库查询将数据进行对比
$sql="select * from admin where username='$user' and password='$pass';";
$data=mysqli_query($con,$sql);
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //判断用户登录成功
    if(mysqli_num_rows($data) > 0){
        $expire = time() + 60 * 60 * 24 * 30; // 一个月后过期
        setcookie('username', $user, $expire, '/');
        setcookie('password', $pass, $expire, '/');
        //echo '<script>alert("登录成功!")</script>';
        header('Location: index-c.php');
        exit();
    }else{
        //判断用户登录失败
        echo '<script>alert("登录失败!")</script>';
    }
}


