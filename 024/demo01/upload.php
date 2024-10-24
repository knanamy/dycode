<?php

$name=$_FILES['f']['name'];
$type=$_FILES['f']['type'];
$size=$_FILES['f']['size'];
$tmp_name=$_FILES['f']['tmp_name'];
$error=$_FILES['f']['error'];

//echo $name."<br>";
//echo $type."<br>";
//echo $size."<br>";
//echo $tmp_name."<br>";
//echo $error."<br>";
//if(move_uploaded_file($tmp_name,'upload/'.$name)){
//    echo "文件上传成功!";
//}


//上传文件后缀过滤 黑名单机制
//$black_ext=array('php','asp','jsp','aspx');
////xxx.jpg xxx.png
//$fenge = explode('.',$name);
//$exts = end($fenge);
//if(in_array($exts,$black_ext)){
//    echo '非法后缀文件'.$exts;
//}else{
//    move_uploaded_file($tmp_name,'upload/'.$name);
//    echo '<script>alert("上传成功")</script>';
//}

//上传文件后缀过滤 白名单机制
//$allow_ext=array('png','jpg','gif','jpeg');
////xxx.jpg xxx.png
//$fenge = explode('.',$name);
//$exts = end($fenge);
//if(!in_array($exts,$allow_ext)){
//    echo '非法后缀文件'.$exts;
//}else{
//    move_uploaded_file($tmp_name,'upload/'.$name);
//    echo '<script>alert("上传成功")</script>';
//}

//MIME文件类型过滤
$allow_type=array('image/png','image/jpg','image/jpeg','image/gif');
if(!in_array($type,$allow_type)){
    echo '非法后缀文件';
}else{
    move_uploaded_file($tmp_name,'upload/'.$name);
    echo '<script>alert("上传成功")</script>';

}
?>