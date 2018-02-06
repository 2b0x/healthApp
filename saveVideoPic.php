<?php
	require ('conn.php');
	
	if (!empty($_FILES['photo']['tmp_name'])) {
		$nameTag = time(); 
		$filename = $nameTag . '0' . substr($_FILES['photo']['name'], strrpos($_FILES['photo']['name'], '.'));
		$path = "video/videoPic/" . $filename;
		$type = $_POST['type'];
		if(move_uploaded_file($_FILES['photo']['tmp_name'], $path) ){
			$sqlstr = "UPDATE videoPic SET path='" . $path . "' where type =" . $type ."" ;
			@mysql_query($sqlstr) or die(mysql_error());
//			echo '1'
		}
		exit();
	} else {
		echo '0';
		exit();
	}			
?>

