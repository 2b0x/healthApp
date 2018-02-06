<?php

	require('conn.php');

	$sql = "SELECT * FROM videoPic";   

	$rs = mysql_query($sql) or die ("查询失败"); 
	$data = array(); 
	while($row = mysql_fetch_array($rs)){  
	    $data[] = $row;  
	} 
	$datas = array();
	$length=count($data);
	for($i=0;$i<$length;$i++){	
		$datas[$i][path] = $data[$i][path];
	}
	
	echo urldecode(json_encode($datas));	

	mysql_close();
	


?>