<?php

	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$user = $_SESSION['user'];
		$title = $_POST['title'];
		$category_id = $_POST['category_id'];
		$user_id = $user['id'];
      $errors = [];


		if(empty($title)){
			$errors['title'] = 'title is empty';
		}

		$book = $_FILES['book'];
		$time = time();
		$book_name = $time . $book['name'];
		$book_tmp_name = $book['tmp_name'];
		$book_destination_path = 'img/book/' . $book_name;

		$allowed_files = ['pdf'];
		$extention = explode('.', $book_name);
		$extention = end($extention);

		if(in_array($extention, $allowed_files)){
			move_uploaded_file($book_tmp_name, $book_destination_path);
		}
		else{
			$errors['book'] =  $book['name'];
			}
		
         if($errors){
            $_SESSION['status'] = 'error';
              $_SESSION['errors'] = $errors;
              header('Location:addBook.php');
         }
         else {
            require_once 'assets/conn.php';
            
         $result = addBook($title, $category_id, $user_id, $book_name);
   
         if ($result) {
            $_SESSION['status'] = 'success';
            $_SESSION['message'] = 'You have registered';
            header('Location: addBook.php');
         } 
   
   }
}
?>