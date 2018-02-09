<?php
	require('conn.php');
	
	$type = $_GET['type'];
	$target = ['减肥','增肌','塑形'];
	
	//获取视频封面地址	
	$searchVideoPic = "SELECT * FROM videopic";
	$videoPicRs = mysql_query($searchVideoPic) or die ("查询失败"); 
	$videoPic = array(); 
	while($row = mysql_fetch_array($videoPicRs)){  
	    $videoPic[] = $row;  
	} 
	$videoPics = array();
	$length=count($videoPic);
	for($i=0;$i<$length;$i++){	
		$videoPics[$i][path] = $videoPic[$i][path];
	}
	$videoPics = urldecode(json_encode($videoPics));


	//获取用户关注视频链接
	$searchVideo = "SELECT * FROM video WHERE type='" . $type . "'";
	$videoRs = mysql_query($searchVideo) or die ("查询失败"); 
	$videoData = array(); 
	while($row = mysql_fetch_array($videoRs)){  
	    $videoData[] = $row;  
	} 
	$videoDatas = array();
	$length=count($videoData);
	for($i=0;$i<$length;$i++){	
		$videoDatas[$i][path] = $videoData[$i][path];
	}
	$videoDatas = urldecode(json_encode($videoDatas));



	
	include('video.html');
	
?>