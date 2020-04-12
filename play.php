<?php

// phpinfo();

// header('Content-type:text/html;charset=utf-8');

$songID= $_GET["songID"];


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
$sql1 = "UPDATE song SET play_volume = play_volume+1 WHERE song_ID = 1;

";
$sql2 = "UPDATE singer,(SELECT singer_ID FROM myview WHERE song_ID = 1)b SET hot = hot+1 WHERE singer.singer_ID = b.singer_ID;

";




//执行sql查出所有数据
$res = mysqli_query($conn,$sql1);
if($res === false) die (mysqli_error($conn));
$res2 = mysqli_query($conn,$sql2);
if($res2 === false) die (mysqli_error($conn));

//解析结果
// $one = mysqli_fetch_assoc($res);

//取出全部 循环


//释放结果资源






//4关闭连接
mysqli_close($conn);


//输出




?>