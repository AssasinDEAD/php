<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$userId = $_POST['us_id'] ?? '';
      $user = $_SESSION['user'] ?? ''; 

		if($userId){
			require_once 'assets/conn.php';
         if($user['role'] == 'user'){
			   $result = changeToMod($userId);
            $_SESSION['status'] = "changed";
            $_SESSION['message'] = 'Успешно изменен';
            header('Location: addAuthForm.php'); 
         };
         if($user['role'] == 'admin'){
            $result = changeToMod($userId);
            $_SESSION['status'] = "changed";
            $_SESSION['message'] = 'Yспешно изменен';
            header('Location: addAuthForm.php'); 
         }
		}
	}
	?>

