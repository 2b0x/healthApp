<?php


$adminAccount = $_POST[adminAccount];
$adminPSW = $_POST[adminPSW];

include('conn.php');  
//检测用户名及密码是否正确  
$check_query = mysql_query("select * from admin where name='$adminAccount' and password='$adminPSW' limit 1");  
if($result = mysql_fetch_array($check_query)){  
    //登录成功  
    session_start();  
    $_SESSION['adminName'] = $result['name'];  
	echo '1';
	exit;  
} else {
    exit('0');  
}  

?>