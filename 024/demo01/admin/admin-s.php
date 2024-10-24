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
//登录文件-采用session验证

//1、接受输入的帐号密码
$user=$_POST['username'];
$pass=$_POST['password'];
$sql="select * from admin where username='$user' and password='$pass';";
$data=mysqli_query($con,$sql);
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(mysqli_num_rows($data) > 0){
        session_start();
        $_SESSION['username']=$user;
        $_SESSION['password']=$pass;
        header('Location: index-s.php');
        exit();
    }else{
        echo '<script>alert("登录失败!")</script>';
    }

}
