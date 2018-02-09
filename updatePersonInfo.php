<?php
require ('conn.php');

session_start();

$useremail = $_SESSION['email'];
$usertarget = $_SESSION['target'];
$username = $_POST['username'];
$password = $_POST['password'];
$target = $_POST['target'];
$height = $_POST['height'];
$weight = $_POST['weight'];


if (!empty($_FILES['photo']['tmp_name'])) {
	$nameTag = time();
	$filename = $nameTag . '0' . substr($_FILES['photo']['name'], strrpos($_FILES['photo']['name'], '.'));
	$photo = "img/personPic/" . $filename;
	move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
} else {
	$photo = $_SESSION['userpic'];
//	echo $photo;
}
if($target=='undefined'){
	$target = $usertarget;
}else{
	switch ($target) {
		case '减肥':
			$target = '1';
			break;
		case '增肌':
			$target = '2';
			break;
		case '塑形':
			$target = '3';
			break;
		default:		
			break;
	}
}

if($password==''){
	$sqlstr = "UPDATE user SET username='" . $username . "',height='" . $height . "',weight='" . $weight . "',target='" . $target . "',photo='" . $photo ."' where email='" . $useremail . "'";
}else{
	$sqlstr = "UPDATE user SET username='" . $username . "',password='" . $password . "',height='" . $height . "',weight='" . $weight . "',target='" . $target . "',photo='" . $photo ."' where email='" . $useremail . "'";
}



//echo $sqlstr;
if (!mysql_query($sqlstr)) {
	echo mysql_error();
//		echo "0";
} else {
	//  echo "修改成功";
	$check_query = mysql_query("select * from user where email='$useremail'");
	if ($result = mysql_fetch_array($check_query)) {
		//登录成功
		session_start();
		$_SESSION['username'] = $result['username'];  
	    $_SESSION['email'] = $result['email'];  
	    $_SESSION['height'] = $result['height'];  
	    $_SESSION['weight'] = $result['weight'];  
	    $_SESSION['target'] = $result['target'];   
	    $_SESSION['userpic'] = $result['photo']; 
			echo '1';
//		header("Location:index.php");
		exit ;
	}
	//	echo "1";
}
?>