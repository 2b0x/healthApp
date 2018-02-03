<?php
header("Content-Type:text/html;charset=utf-8");

//限制文件格式
$typeArry = array('video/mp4');
$type = $_FILES['upfile']['type'];

//限制视频大小为10m
$max_size_file = '10485760';

//视频重命名
function getname($exname) {
	$dir = "./uploadfile/";
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
$exname = $nameTag . '0' . substr($_FILES['upfile']['name'], strrpos($_FILES['upfile']['name'],'.')); 
//$exname = $nameTag . '0' . substr($_FILES['upfile']['name'], strrpos($_FILES['upfile']['name'],'.')); 
$a=substr($_FILES['upfile']['name'], strrpos($_FILES['upfile']['name'],'.'));
$uploadfile = getname($exname);

//存入服务器文件
if(in_array($type,$typeArry)){
	if($_FILES['upfile']['size']<=$max_size_file){
		if (move_uploaded_file($_FILES['upfile']['tmp_name'], $uploadfile)) {
			echo "<h2><font color=#ff0000>文件上传成功！</font></h2><br><br>";
			echo "下面是文件上传的一些信息：<br><br>原文件名：" . $_FILES['upfile']['name'] . "<br><br>类型：" . $_FILES['upfile']['type'] . "<br><br>临时文件名：" . $_FILES['upfile']['tmp_name'] . "<br><br>文件大小：" . $_FILES['upfile']['size'] . "<br><br>错误代码：" . $_FILES['upfile']['error'] . $a ;
		} else {
			echo "<h2><font color=#ff0000>文件上传失败！</font></h2><br><br>";
		}
	}else{
		echo "视频不得超过10M";
	}	
}else{
	echo "视频格式应为mp4格式";
}




?>

