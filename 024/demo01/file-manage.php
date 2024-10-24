<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>文件列表</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        li {
            margin-bottom: 10px;
        }
        i {
            margin-right: 10px;
        }
        a {
            text-decoration: none;
            color: #333;
        }
    </style>
</head>
<body>
<h1>当前目录下的文件列表</h1>
<ul>

</ul>
</body>
</html>

<?php
$dir = $_GET['path'] ?? './';

//1.打开目录，读取文件列表 opendir
//2.循环读取文件列表 while readdir
//3.判断是文件还是文件夹 is_dir

//打开目录，读取文件列表 opendir
function filelist($dir){
    if($dh = opendir($dir)){
        //循环读取文件列表 while readdir
        while(($file=readdir($dh) )!== false){
            //判断是文件还是文件夹 is_dir
            if(is_dir($file)){
                echo "<li><i class='fa fa-folder'></i> <a href='?path=$file'>" . $file . '</a></li>';
            }else{
                echo '<li><i class="fa fa-file"></i> <a href="#">' . $file . '</a></li>';
            }
        }
    }
}

filelist($dir);

function del($file){
    if(!is_dir($file)){
        unlink($file);
        echo "<script>alert('删除成功')</script>";
    }
}

if(isset($_GET['del'])){
    del($_GET['del']);
}


function down($filepath){
    $fileName = basename($filepath);
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"" . $fileName . "\"");
    header("Content-Length: " . filesize($filepath));
    readfile($filepath);
}

if(isset($_GET['down'])){
    down($_GET['down']);
}
?>

