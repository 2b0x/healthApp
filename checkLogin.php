<?php


$userEmail = $_POST[userEmail];
$password = $_POST[password];

include('conn.php');  
//检测用户名及密码是否正确  
$check_query = mysql_query("select * from user where email='$userEmail' and password='$password' limit 1");  
if($result = mysql_fetch_array($check_query)){  
    //登录成功  
    session_start();  
    $_SESSION['username'] = $result['username'];  
    $_SESSION['email'] = $result['email'];  
    $_SESSION['height'] = $result['height'];  
    $_SESSION['weight'] = $result['weight'];  
    $_SESSION['target'] = $result['target'];   
    $_SESSION['userpic'] = $result['photo']; 
	echo '1';
	exit;  
} else {
    exit('0');  
}  

?>