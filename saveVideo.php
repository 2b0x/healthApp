<?php
header("Content-Type:text/html;charset=utf-8");
require ('conn.php');

$typeArry = array('video/mp4');//限制文件格式
$videoType = $_FILES['video']['type'];

//限制视频大小为20m
$max_size_file = '20971520';
$max_size_file = intval($max_size_file);
$video_size = 	$_FILES['video']['size'];
$video_size = intval($video_size); 
  
//视频重命名
function getname($exname) {
	$dir = "./video/";
	$i = 1;
	if (!is_dir($dir)) {
		mkdir($dir, 0777);
	}
	while (true) {
		if (!is_file($dir . $i  . $exname)) {
			$name = $i  . $exname;
			break;
		}
		$i++;
	}
	return $dir . $name;
}
$nameTag = time();
$exname = $nameTag . '0' . substr($_FILES['video']['name'], strrpos($_FILES['video']['name'],'.')); 
$a=substr($_FILES['video']['name'], strrpos($_FILES['video']['name'],'.'));
$uploadfile = getname($exname);//存放在本地的文件名

$type = $_POST['type'];//视频类型


//存入服务器文件
if(in_array($videoType,$typeArry)){
	if( $video_size<=$max_size_file ){
		if (move_uploaded_file($_FILES['video']['tmp_name'], $uploadfile)) {			
			$sqlstr = "insert into video(type,path) values('".$type."','".$uploadfile."')"; 
			@mysql_query($sqlstr) or die(mysql_error());
			echo "3";
		} else {
			echo "0";
		}
	}else{
		echo "1";
//echo "视频不得超过20M";
	}	
}else{
	echo "2";
//echo "视频格式应为mp4格式";
}




?>

