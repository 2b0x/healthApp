<?php
	header("Content-type: text/html; charset=utf-8"); 
	include('conn.php');  
		
	session_start();

	//获取广告封面地址	
		$searchAdvPic = "SELECT * FROM adver";
		$advPicRs = mysql_query($searchAdvPic) or die ("查询失败"); 
		$advPic = array(); 
		while($row = mysql_fetch_array($advPicRs)){  
		    $advPic[] = $row;  
		} 
		$videoPics = array();
		$length=count($advPic);
		for($i=0;$i<$length;$i++){	
			$advPics[$i][path] = $advPic[$i][path];
		}
		$advPics = urldecode(json_encode($advPics));
	
	
	
	
	
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

	//login==true
	if( !empty($_SESSION['username']) ){
		$username = $_SESSION['username']; 
	  //$userid = $_SESSION['userid']; 
		$userpic = $_SESSION['userpic'];	
		$useremail = $_SESSION['email'];
		$userheight = $_SESSION['height'];
		$userweight = $_SESSION['weight'];
		$usertarget = $_SESSION['target'];
		$is_login = 1;
		$target = ['减肥','增肌','塑形'];
		
	
		
		//获取饮食信息
		$searchFood = "SELECT * FROM food WHERE type='" . $usertarget . "'";
		$foodRs = mysql_query($searchFood) or die ("查询失败"); 
		$foodData = array(); 
		while($row = mysql_fetch_array($foodRs)){  
		    $foodData[] = $row;  
		} 
		$foodDatas = array();
		$length=count($foodData);
		for($i=0;$i<$length;$i++){	
			$foodDatas[$i][1] = $foodData[$i][foodPic_1];
			$foodDatas[$i][2] = $foodData[$i][foodPic_2];
			$foodDatas[$i][3] = $foodData[$i][foodPic_3];
			$foodDatas[$i][4] = $foodData[$i][foodPic_4];
			$foodDatas[$i][food_1] = $foodData[$i][food_1];
			$foodDatas[$i][food_2] = $foodData[$i][food_2];
			$foodDatas[$i][food_3] = $foodData[$i][food_3];
		}
		$foodDatas = urldecode(json_encode($foodDatas));
		
		
		//获取用户关注视频链接
		$searchVideo = "SELECT * FROM video WHERE type='" . $usertarget . "'";
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
		
		
		
	}else{
//		echo "用户未登录";
		$is_login = 0;
	}
	

    
	
	include('index.html');
?>