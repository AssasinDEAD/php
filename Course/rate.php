<?php 
 
    session_start(); 
    require_once 'assets/checkAuth.php'; 
    require_once 'assets/conn.php'; 
 
 $rating = $_POST['rating'] ?? ''; 
 $post_id = $_POST['post_id'] ?? ''; 
 $user_id = $user['id']; 
 
 $result = ratePost($user_id, $post_id, $rating); 
 
 if($result){ 
  header("Location: uniqBook.php?post_id=$post_id"); 
 } 
  
 
?>