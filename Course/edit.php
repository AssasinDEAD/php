<?php

session_start();
   $user = $_SESSION['user'];


	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$id = $_POST['id'];
		$title = $_POST['title'];
		$category_id = $_POST['category_id'];
		$user_id = $user['id'];
        $status = $_SESSION['status'];
         if($user['role'] == 'admin'){
            require_once 'assets/conn.php';
            $result = editPost($id, $title, $category_id, $status='public');
            if($result)
                    $_SESSION['status'] = "changed";
                    $_SESSION['message'] = 'Успешно изменен';
                    if($user['role'] == 'admin'){
                    header('Location: allBooks.php'); 
                    }
         }
         if($user['role'] == 'author'){
            
            require_once 'assets/conn.php';
            if($result)
         
            $result = editPost($id, $title, $category_id);
            $_SESSION['status'] = "changed";
            $_SESSION['message'] = 'Успешно изменен';
            
         };
        }

?>