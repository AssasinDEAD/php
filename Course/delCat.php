<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$cat = $_POST['cat_id'] ?? '';
      
		if($cat){
			require_once 'assets/conn.php';
         $result = delCat($cat);
         $_SESSION['status'] = "success";
         $_SESSION['message'] = 'Пост успешно удален';
         header('Location: addCat.php'); 

      }

	}
?>
