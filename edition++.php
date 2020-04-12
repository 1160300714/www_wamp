<?php

// phpinfo();

// header('Content-type:text/html;charset=utf-8');

$editionID= $_GET["editionID"];
$name = $_GET["name"];
$quantity = $_GET["quantity"];
$volume = $_GET["volume"];
$VIP = $_GET["VIP"];
$date = $_GET["date"];
$singerID = $_GET["singerID"];


//1连接认证
$conn = @mysqli_connect('localhost:3306','root','root');
// var_dump($conn);

//2错误检查
if(!$conn) die( iconv('gbk', 'utf-8', mysqli_connect_error()));

//3其他操作

//设置字符集
mysqli_set_charset($conn,'utf8') or die (mysqli_error($conn));

//选择数据库
mysqli_select_db($conn,'db3') or die (mysqli_error($conn));

//组织sql指令
$sql = "INSERT INTO edition(edition_ID,edition_name,quantity,volume,edition_VIP,edition_date,singer_ID) VALUES('$editionID','$name','$quantity','$volume','$VIP','$date','$singerID')


";

//执行sql查出所有数据
$res = mysqli_query($conn,$sql);
if($res === false) die (mysqli_error($conn));

//解析结果
// $one = mysqli_fetch_assoc($res);

//取出全部 循环


//释放结果资源






//4关闭连接
mysqli_close($conn);


//输出



?>