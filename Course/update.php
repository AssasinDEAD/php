<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update</title>
	<?php

   require_once 'assets/conn.php';
?>
</head>
<body>
<?php
 session_start(); 

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$oldpassword=$_POST['oldpassword'] ?? '';
		$newpassword=$_POST['newpassword'] ?? '';
		$confirm_password=$_POST['confirm_password'] ?? '';
      $user=$_SESSION['user']['password'];
	$errors = [];
    if(empty($oldpassword)){
        $errors['oldpassword']='Password is empty';
	}
    else{
		 if (strlen($oldpassword) <= 6 || !preg_match('/[a-z]/', $oldpassword) || !preg_match('/[A-Z]/', $oldpassword)) {
            $errors['oldpassword'] = 'Password does not meet the requirements';
        }
    }
    if(empty($newpassword)){
        $errors['newpassword']='Password is empty';
	}
    else{
		 if (strlen($newpassword) <= 6 || !preg_match('/[a-z]/', $newpassword) || !preg_match('/[A-Z]/', $newpassword)) {
            $errors['newpassword'] = 'Password does not meet the requirements';
        }
    }
	if(empty($confirm_password)){
        $errors['confirm_password']='Password is empty';
	} 
	else{
		 if (strlen($confirm_password) <= 6 || !preg_match('/[a-z]/', $confirm_password) || !preg_match('/[A-Z]/', $confirm_password)) {
            $errors['confirm_password'] = 'Password does not meet the requirements';
        }
    }
	if($confirm_password != $newpassword){
		$errors['confirm_password']='Passwords does not match';
	}

	if($oldpassword == $newpassword){
		$errors['confirm_password']='Passwords match';
	}
    if ($errors) {
        $_SESSION['status'] = 'error';
        $_SESSION['errors'] = $errors;
        header("Location: Profile.php");
    } else {
      require_once 'assets/conn.php';
        $email = $_SESSION['user']['email'];
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword']; 
        $isRegistered = updatePassword($oldpassword, $newpassword, $_SESSION['user']['id']);
    
        if ($isRegistered) {
            $_SESSION['status'] = 'success';
            $_SESSION['message'] = 'You have successfully changed your password';
            header("Location: logIn.php");
            $_SESSION['user']['password'] = md5($newpassword);
        } else {
            $_SESSION['status'] = 'mainError';
            $_SESSION['message'] = 'There are no user with this password';
            header("Location: change.php");
        }
    }
    
}
?>
</body>
</html>