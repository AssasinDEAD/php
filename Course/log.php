<?php

	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$email = $_POST['email'] ?? '';
		$password = $_POST['password'] ?? '';
		$delete = $_POST['delete'] ?? '';

		$errors = [];

		if(empty($email)){
			$errors['email'] = 'Email is empty';
		}
		else{
			if (!filter_var($email, FILTER_VALIDATE_EMAIL))
  				$errors['email'] = "Invalid email format";
		}

		if(empty($password)){
			$errors['password'] = 'Password is empty';
		}
		else{
			if(strlen($password) < 6){
				$errors['password'] = 'Password length should be at least 6 symbols';
			}
		}

		if($errors){
			$_SESSION['status'] = 'error';
        	$_SESSION['errors'] = $errors;
        	header('Location:logIn.php');
		}
		else {
			require_once 'assets/conn.php';
			$user = loginUser($email, $password);

			if($user){
				
            if($user['role']=='user'){
               $_SESSION['status'] = 'success';
	        	   $_SESSION['message'] = 'You have logged in';
	        	   $_SESSION['user'] = $user;
				   if($checkbox){
					   setcookie('email',$email,time() + 60, '/');
					} 
	        	   header('Location:index.php');
				exit();
            }if($user['role']=='admin'){
               $_SESSION['status'] = 'success';
	         	$_SESSION['message'] = 'You have logged in';
	        	   $_SESSION['user'] = $user;
				   if($checkbox){
					   setcookie('email',$email,time() + 60, '/');
					} 
	        	header('Location:adminPage.php');
				exit();
            }
         }if($user['role']=='author'){
            $_SESSION['status'] = 'success';
            $_SESSION['message'] = 'You have logged in';
              $_SESSION['user'] = $user;
            if($checkbox){
               setcookie('email',$email,time() + 60, '/');
            } 
           header('Location:autPage.php');
         exit();
         
			}
			else{
				$_SESSION['status'] = 'mainError';
	        	$_SESSION['message'] = 'No user with this email and password';
	        	header('Location:logIn.php');
			}
		}
	}

?>