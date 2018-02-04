<?php
		require('conn.php');

		if(empty($_POST)){
			require('register.html');
		}else{
			$nameTag = time();
			$filename = $nameTag . '0' . substr($_FILES['photo']['name'], strrpos($_FILES['photo']['name'],'.'));  
			$response = array();
			$path = "img/personPic/"  . $filename;  
			$user_name = $_POST['username'];
			$user_email = $_POST['email'];
			$user_height = $_POST['height'];
			$user_weight = $_POST['weight'];
			$user_target = $_POST['target'];
			$password = $_POST['password'];
			
			if(move_uploaded_file($_FILES['photo']['tmp_name'], $path) ){
				$sqlstr = "insert into user(email,username,password,height,weight,target,photo) values('".$user_email."','".$user_name."','".$password."','".$user_height."','".$user_weight."','".$user_target."','".$path."')"; 
				@mysql_query($sqlstr) or die(mysql_error());  
			}else{  
			    $response['isSuccess'] = false;  
			}  
			Header("Location: login.html"); 
			exit();  
		}


?>  

