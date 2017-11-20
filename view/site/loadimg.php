<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/20
 * Time: 13:21
 */
$conn=mysqli_connect("127.0.0.1",'root','root','myblog','3306') or die("连接失败！！！");
$query="SELECT address FROM imgurl WHERE name='1.png'";
$result=mysqli_query($conn,$query) or die("失败");
if($result){
    require("smarty.inc.php");//引入配置文件
//    $title="Smarty";//定义变量
//    $content="OK";
    while($row=$result->fetch_row()){
        $results=$row[0];
    }
//    $tpl->assign("title",$title);//用定义的变量替换模板中的变量
//    $tpl->assign("content",$content);
    $tpl->assign("result",$results);
    $tpl->display('index.html');//显示模板文件
}else
{
    echo "出错啦";
}


