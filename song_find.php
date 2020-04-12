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
$sql = "select * from song where song_ID = '$songID';

";




//执行sql查出所有数据
$res = mysqli_query($conn,$sql);
if($res === false) die (mysqli_error($conn));

//解析结果
// $one = mysqli_fetch_assoc($res);

//取出全部 循环
$lists = [];
while($one = mysqli_fetch_assoc($res)){
	$lists[] = $one;
}

//释放结果资源
mysqli_free_result($res);





//4关闭连接
mysqli_close($conn);


//输出


echo '<div><table>';

	echo '<tr id="head">
		<td>歌曲ID</td>
		<td>歌曲名</td>
		<td>播放量</td>
		<td>风格</td>
		<td>语言</td>
		<td>VIP</td>
		<td>日期</td>
		<td>歌手ID</td>
		<td>专辑ID</td>

		
		</tr>';

	foreach($lists as $one){
		echo"<tr>
				<td>{$one['song_ID']}</td>
				<td>{$one['name']}</td>
				<td>{$one['play_volume']}</td>
				<td>{$one['style']}</td>
				<td>{$one['language']}</td>
				<td>{$one['VIP']}</td>
				<td>{$one['date']}</td>
				<td>{$one['singer_ID']}</td>
				<td>{$one['edition_ID']}</td>
			</tr>";
		}

echo '</table></div>';

echo '<style type="text/css">
		
		button,input{
			border-radius:9px;
		}
		button{
			padding:2px;
			margin: 3px;
		}
		tr{
			display:block;
			margin-left:600px;
		}
		


		#head td{
			color:red;
			font-weight:700;
		}

		#body form{
			float: left;
			margin: 0 30px;
		}

		#body button{
			border: 0px;
			background-color: white;
		}

		td{
			display:inline-block;
			padding-bottom: 3px;
			margin:2px 6px 3px 6px;
			border-bottom: 1px #AAAAAA solid;
		}


	</style>'

?>