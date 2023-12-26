<?php

session_start();

require_once "assets/conn.php";

$categories = getGenres();


$catId = $_GET['cat_id'] ?? null;

$search = $_POST['search'] ?? ''; 

if($search){ 
    $posts = searchPosts($search); 
} 
else { 
    $catId = $_GET['cat_id'] ?? null; 

    if($catId) 
        $posts = getPosts($catId); 
    else 
        $posts = getPosts(); 
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
   <title>Course - Courses</title>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="Course Project">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
   <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
   <link rel="stylesheet" type="text/css" href="styles/courses_styles.css">
   <link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">
</head>

<body>

   <div class="super_container">

      <!-- Header -->

      <?php require_once "assets/nav.php"; ?>

      <!-- Menu -->
      <div class="menu_container menu_mm">

         <!-- Menu Close Button -->
         <div class="menu_close_container">
            <div class="menu_close"></div>
         </div>

         <!-- Menu Items -->
         <div class="menu_inner menu_mm">
            <div class="menu menu_mm">
               <ul class="menu_list menu_mm">
                  <li class="menu_item menu_mm"><a href="index.html">Home</a></li>
                  <li class="menu_item menu_mm"><a href="#">About us</a></li>
                  <li class="menu_item menu_mm"><a href="#">Courses</a></li>
                  <li class="menu_item menu_mm"><a href="elements.html">Elements</a></li>
                  <li class="menu_item menu_mm"><a href="news.html">News</a></li>
                  <li class="menu_item menu_mm"><a href="contact.html">Contact</a></li>
               </ul>

               <!-- Menu Social -->

               <div class="menu_social_container menu_mm">
                  <ul class="menu_social menu_mm">
                     <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                     <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                     <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
                     <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                     <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
                  </ul>
               </div>

               <div class="menu_copyright menu_mm">Colorlib All rights reserved</div>
            </div>

         </div>

      </div>

      <!-- Home -->

      <div class="home">
         <div class="home_background_container prlx_parent">
            <div class="home_background prlx" style="background-image:url(images/courses_background.jpg)"></div>
         </div>
         <div class="home_content">
            <h1>Books</h1>
         </div>
      </div>
      <?php
  $users = getUsers();
  $categories = getGenres();
  ?>
    <?php
  $hasErrors = false; 
  if(isset($_SESSION['status']) && $_SESSION['status'] == 'error')
    $hasErrors = true;
  ?>
<div class="prof" style="border: solid 1px black; display:flex; height:100%; align-items:center;">
   <div style="align-items:center; width: 100px;" class="cat ">
   <?php if(isset($_SESSION['status']) && $_SESSION['status'] == 'success'): ?>
      <div class="success">
        <h1 onclick="this.parentElement.remove()" style="Color:green;"><?= $_SESSION['message']  ?></h1>
        <i style="color:black" class="fa-regular fa-circle-xmark" onclick="this.parentElement.remove()"></i>
      </div>
    <?php endif; ?>
      <ul style=" display:flex; align-items:center;">
      <?php foreach($categories as $cat): ?>
         <li style="margin-right:10px; display:flex;  aling-items:center;"><a href="indexAdmin.php?cat_id=<?= $cat['id'] ?>"><?= $cat['types'] ?></a></li>
         <div class="butt" style=' display:flex; align-items:center; margin-right:20px;' >
         <form onsubmit="return confirm('Really want to delete?')" action="delCat.php" method="post">
            <input type="hidden" name="cat_id" value="<?= $cat['id']?>">
             <button style='color:black;margin-right:10px;' class="btn btn-danger" type="submit">Delete</button>
         </form>
         </div>
         <?php endforeach; ?>
         <form style="margin-top:100px;"action="addCat1.php" method="post">
         <input type="text" name="title">
         <?php if($hasErrors && isset($_SESSION['errors']['title'])): ?>
          <p class="inputError" style="color:red; font-weight:bold;"><?= $_SESSION['errors']['title'] ?></p>
        <?php endif; ?>
         <input type="submit">
         </form>
      </ul>
   </div>
</div>
<?php

unset($_SESSION['status']);
unset($_SESSION['errors']);
unset($_SESSION['message']);

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