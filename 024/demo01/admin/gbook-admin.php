<?php
include '../config.php';
include '../gbook.php';

show_gbook($con,'del');


$delstr=@$_GET['del'];
if(isset($delstr)){
    $sql2="delete from gbook where username = '$delstr';";
    if(mysqli_query($con,$sql2)){
        echo "<script>alert('删除成功!')</script>";
    }
}
