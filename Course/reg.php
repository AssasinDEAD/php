<?php

	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name = $_POST['name'] ?? '';
		$email = $_POST['email'] ?? '';
		$password = $_POST['password'] ?? '';
		$confirm_password = $_POST['confirm_password'] ?? '';

		$errors = [];

		if(empty($name)){
			$errors['name'] = 'Name is empty';
		}

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
			if(strlen($password) < 6 || !preg_match('/[a-z]/', $password) || !preg_match('/[A-Z]/', $password)){
				$errors['password'] = 'Password length should be at least 6 symbols';
			}
		}

		if(empty($confirm_password)){
			$errors['confirm_password'] = 'Password is empty';
		}
		else{
			if(strlen($confirm_password) < 6|| !preg_match('/[a-z]/', $confirm_password) || !preg_match('/[A-Z]/', $confirm_password)){
				$errors['confirm_password'] = 'Password length should be at least 6 symbols';
			}
		}

		if($confirm_password != $password){
			$errors['confirm_password'] = 'Passwords does not match';
		}
		$avatar = $_FILES['avatar'];
		$time = time();
		$avatar_name = $time . $avatar['name'];
		$avatar_tmp_name = $avatar['tmp_name'];
		$avatar_destination_path = 'img/avatar/' . $avatar_name;

		$allowed_files = ['png','jpg','jpeg','webp'];
		$extention = explode('.', $avatar_name);
		$extention = end($extention);

		if(in_array($extention, $allowed_files)){
			if($avatar['size'] <1000000){
			move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
			}else{
			$errors['avatar'] = "File Size Too Big. Chose Less Than 1mb File..!";
			}
			}else{
			$errors['avatar'] = "File Should Be PNG, JPG, JPEG or WEBP";
			}
		


		if($errors){
			$_SESSION['status'] = 'error';
        	$_SESSION['errors'] = $errors;
        	header('Location:regIn.php');
		}
		else {
			require_once 'assets/conn.php';
			
		$result = registerUser($email, $password, $name, $avatar_name);

		if ($result) {
			$_SESSION['status'] = 'success';
			$_SESSION['message'] = 'You have registered';
			header('Location: logIn.php');
		} 
		else if($_SESSION['user']['email']==$email){
			$_SESSION['status'] = 'error';
			$_SESSION['errors'] = ['email' => 'This email is in use'];
			header('Location: regIn.php');
		}

		}
	}

?>