<?php 

         session_start();
         $user=$_SESSION['user'];
        if($user['role']=='admin'){
        }
        if($user['role']=='author'){
         require_once 'assets/navAut.php' ;
         require_once 'assets/checkMod.php';
         }
      
         if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['post_id'];
      
            require_once 'assets/conn.php';
            $result = publicPost($id);
            if($result)
               header("Location: check.php");
         }
        ?>