<?php
	require ('conn.php');
	
	if (!empty($_FILES['photo']['tmp_name'])) {
		$nameTag = time();
		$filename = $nameTag . '0' . substr($_FILES['photo']['name'], strrpos($_FILES['photo']['name'], '.'));
		$path = "img/food/" . $filename;
		$site = $_POST['site'];
		$type = explode("_", $site)[0];
		$ziduan = "foodPic_" . explode("_", $site)[1];
		if(move_uploaded_file($_FILES['photo']['tmp_name'], $path) ){
			$sqlstr = "UPDATE food SET " . $ziduan . "='" . $path . "' where type =" . $type ."" ;
			@mysql_query($sqlstr) or die(mysql_error());
//			echo '1'
		}
		exit();
	} else {
		echo '0';
		exit();
	}			
?>

