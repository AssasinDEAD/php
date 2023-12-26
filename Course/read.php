<?php 
 
    session_start(); 
    require_once 'assets/checkAuth.php'; 
    require_once 'assets/conn.php'; 
 $user=$_SESSION['user'];
 $readed = $_POST['readed'] ?? ''; 
 $post_id = $_POST['post_id'] ?? ''; 
 $user_id = $user['id']; 
 
 $result = readCount($user_id, $post_id, $readed); 

 if($result){ 
  header("Location: allBooks.php?post_id=$post_id"); 
 } 
?>