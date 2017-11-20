<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/18
 * Time: 10:35
 */



//echo $_SERVER["DOCUMENT_ROOT"];
if ((($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/png"))
    && ($_FILES["file"]["size"] < 2000000))
{
    if ($_FILES["file"]["error"] > 0)
    {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
    else
    {
        echo "Upload: " . $_FILES["file"]["name"] . "<br />";
        echo "Type: " . $_FILES["file"]["type"] . "<br />";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

        if (file_exists(__DIR__ . "/upload/" . $_FILES["file"]["name"]))
        {
            echo $_FILES["file"]["name"] . " already exists. ";
        }
        else
        {
            move_uploaded_file($_FILES["file"]["tmp_name"],
                $_SERVER["DOCUMENT_ROOT"] . "/upload/" . $_FILES["file"]["name"]);
//            echo "Stored in: " .$_SERVER["DOCUMENT_ROOT"]. "/upload/" . $_FILES["file"]["name"]."<br>";
//
//            echo $_FILES["file"]["name"] ."<br>";/* 被上传文件的名称*/
//
//            echo $_FILES["file"]["type"] ."<br>";/* 被上传文件的类型*/
//
//            echo $_FILES["file"]["size"] ."<br>";/* 被上传文件的大小，以字节计*/
//
//            echo $_FILES["file"]["tmp_name"] ."<br>";/* 存储在服务器的文件的临时副本的名称*/
//
//            echo $_FILES["file"]["error"] ."<br>";/*由文件上传导致的错误代码*/
            $conn=mysqli_connect("127.0.0.1",'root','root','myblog','3306') or die("连接失败！！！");
            $name=$_FILES['file']['name'];
            $address="/upload/" . $_FILES["file"]["name"];
            $query = "insert into imgurl(name,address) values ('$name','$address' )";
            echo $query;
            $result = mysqli_query($conn,$query) or die("mysqli_error");
            if($result){
                echo "添加成功";
            }else{
                echo "添加失败";
            }
        }
    }
}
else
{
    echo "Invalid file";
}