<?php
	require ('conn.php');
	
	if (!empty($_FILES['photo']['tmp_name'])) {
		$nameTag = time();
		$filename = $nameTag . '0' . substr($_FILES['photo']['name'], strrpos($_FILES['photo']['name'], '.'));
		$path = "img/adver/" . $filename;
		$site = $_POST['site'];
		$type = substr($site, -1, 1);
		if(move_uploaded_file($_FILES['photo']['tmp_name'], $path) ){
			$sqlstr = "UPDATE adver SET path='" . $path . "' where site='" . $type ."'" ;
			@mysql_query($sqlstr) or die(mysql_error());
//			echo '1'
		}
		exit();
	} else {
		echo '0';
		exit();
	}			
?>

