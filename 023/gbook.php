<script src="/ueditor/ueditor.config.js">/*引入配置文件*/</script>
<script src="/ueditor/ueditor.all.js">/*引入源码文件*/</script>

<form id="form1" name="form1" method="post" action="">

	  用户名：<input type="text" name="username" maxlength="2000"><br>

  内容：

	  <textarea id="content" rows="10" cols="70" name="content" style="border:1px solid #E5E5E5;">
    </textarea>
    <script type="text/javascript">
        UE.getEditor("content");

        //实例化编辑器传参,id为将要被替换的容器。
    </script>


	  <input type="submit" name="submit" id="submit" value="提交">
	
</form>

<?php
include 'config.php';


function add_gbook($con){
    $u = @$_POST['username'];
    if (isset($u)) {
        $c = @$_POST['content'];
        $i = @$_SERVER['REMOTE_ADDR'];
        $ua = @$_SERVER['HTTP_USER_AGENT'];
        $sql = "insert into gbook(`username`, `content`,`ipaddr`,`uagent`) value('$u', '$c','$i','$ua');";
        if (mysqli_query($con, $sql)) {
            echo "<script>alert('留言成功！')</script>";
        }
    }
}

function show_gbook($con,$del){
    $sql1="select * from gbook";
    $data=mysqli_query($con,$sql1);
    while ($row=mysqli_fetch_row($data)) {
        echo '<hr>';
        echo '用户名：'.$row[0].'<br>';
        echo '内容：'.$row[1].'<br>';
        echo 'IP地址：'.$row[2].'<br>';
        echo 'UA浏览器：'.$row[3].'<br>';
        if($del=='del'){
            echo "<a href='gbook-admin.php?del=$row[0]'>删除</a>";
        }
    }
}

add_gbook($con);
show_gbook($con,'x');


//if (!$con)
//{
//    die("连接错误: " . mysqli_connect_error());
//}else{
//    $u=@$_POST['username'];
//    if(isset($u)){
//        $c=@$_POST['content'];
//        $i=@$_SERVER['REMOTE_ADDR'];
//        $ua=@$_SERVER['HTTP_USER_AGENT'];
//        $sql="insert into gbook(`username`, `content`,`ipaddr`,`uagent`) value('$u', '$c','$i','$ua');";
//        if(mysqli_query($con,$sql)){
//            echo "<script>alert('留言成功！')</script>";
//            $sql1="select * from gbook";
//            $data=mysqli_query($con,$sql1);
//            while ($row=mysqli_fetch_row($data))
//            {
//                echo '<hr>';
//                echo '用户名：'.$row[0].'<br>';
//                echo '内容：'.$row[1].'<br>';
//                echo 'IP地址：'.$row[2].'<br>';
//                echo 'UA浏览器：'.$row[3].'<br>';
//            }
//
//        }else{
//            echo "<script>alert('留言失败！')</script>";
//        }
//
//    }
//
//}


?>