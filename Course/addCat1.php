<?php

  session_start();
   $user = $_SESSION['user'];
   if($user['role'] == 'admin'){
      require_once 'assets/checkAdmin.php';
   }

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['title'];
    if(empty($title)){
      $errors['title'] = 'title is empty';
    }
    if($errors){
      $_SESSION['status'] = 'error';
          $_SESSION['errors'] = $errors;
         header("Location: addCat.php");
    }else{
         require_once 'assets/conn.php';
         $_SESSION['status'] = 'success';
         $_SESSION['message'] = 'Added';
         $result = addCat($title);
         if($result)
            header("Location: addCat.php");
      }
  }
?>



               <!-- Footer -->
              
               </div>
            <?php require_once "assets/footer.php"; ?>
            <script src="js/jquery-3.2.1.min.js"></script>
            <script src="styles/bootstrap4/popper.js"></script>
            <script src="styles/bootstrap4/bootstrap.min.js"></script>
            <script src="plugins/greensock/TweenMax.min.js"></script>
            <script src="plugins/greensock/TimelineMax.min.js"></script>
            <script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
            <script src="plugins/greensock/animation.gsap.min.js"></script>
            <script src="plugins/greensock/ScrollToPlugin.min.js"></script>
            <script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
            <script src="plugins/easing/easing.js"></script>
            <script src="js/courses_custom.js"></script>

</body>

</body>
</html>
