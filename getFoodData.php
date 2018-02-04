<?php

	require('conn.php');

	$sql = "SELECT * FROM food";   

	$rs = mysql_query($sql) or die ("查询失败"); 
	$data = array(); 
	while($row = mysql_fetch_array($rs)){  
	    $data[] = $row;  
	} 
	$datas = array();
	$length=count($data);
	for($i=0;$i<$length;$i++){	
		$datas[$i][foodPic_1] = $data[$i][foodPic_1];
		$datas[$i][foodPic_2] = $data[$i][foodPic_2];
		$datas[$i][foodPic_3] = $data[$i][foodPic_3];
		$datas[$i][foodPic_4] = $data[$i][foodPic_4];
		$datas[$i][food_1] = $data[$i][food_1];
		$datas[$i][food_2] = $data[$i][food_2];
		$datas[$i][food_3] = $data[$i][food_3];
	}
	
//	print_r($datas);
	echo urldecode(json_encode($datas));	

	mysql_close();
	


?>