<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$postId = $_POST['post_id'] ?? '';
      $user = $_SESSION['user'] ?? ''; 

		if($postId){
			require_once 'assets/conn.php';
         if($user['role'] == 'author'){
			   $result = deletePost($postId);
            $_SESSION['status'] = "deleted";
            $_SESSION['message'] = 'Пост успешно удален';
            header('Location: allBooks.php'); 
         };
         if($user['role'] == 'admin'){
            $result = deletePost($postId);
            $_SESSION['status'] = "deleted";
            $_SESSION['message'] = 'Пост успешно удален';
            header('Location: allBooks.php'); 
         }
		}
	}


	?>