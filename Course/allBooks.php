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

      <!-- Popular -->
      <div class="popular page_section">
         <div class="container">
            <div class="row">
               <div class="col">
                  <div class="section_title text-center">
                  </div>
               </div>
            </div>
            <div class="newsletter">
               <div class="row">
                  <div class="col text-center">
                     <div class="newsletter_form_container mx-auto">
                        <form action="allBooks.php" method="post">
                           <div
                              class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-center">
                              <input name='search' id="newsletter_email" class="newsletter_email" type="text" placeholder="search"
                              
                                 style="border:solid 1px black">
                              <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300"
                                >Search</button>
                           </div>
                        </form>
                        <ul style="margin-top:50px;" class="list-unstyled mb-0">
                                            <?php foreach($categories as $cat): ?>
                                            <li><a href="allBooks.php?cat_id=<?= $cat['id'] ?>"><?= $cat['types'] ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                     </div>
                  </div>
               </div>

            </div>
            <div class="row course_boxes">
               <?php	if (isset($_SESSION['status']) && $_SESSION['status']=="deleted") :?>
                     <div class="success">
                        <span style="color:lightgreen;"><?= $_SESSION['message']?></span>
                        <i class="fa-regular fa-circle-xmark" onclick="this.parentElement.remove()"></i>
                     </div>
                     <?php	endif; ?>
               <!-- Popular Course Item -->
               <div class="col-lg-10 m-auto course_box">
               <?php foreach($posts as $post): ?>  
                  <?php if($post['status']=='public'):?>
                  <div class="card" >
                     <img  class="card-img-top" src="images/course_1.jpg" alt="https://unsplash.com/@kellybrito">
                     <div class="card-body text-center">
                        <div class="card-title"><span><?= $post['title'] ?></span></div>
                     </div>
                     <div class="price_box d-flex flex-row align-items-center">
                        <div class="course_author_image">
                        </div>
                        <div class="d-flex align-items-center justify-content-around w-100 p-3">
                        <a class="btn btn-info me-2" href="uniqBook.php?post_id=<?= $post['id'] ?>">Read →</a>
                        <?php if($post['user_id'] == $user['id'] or $user['role'] == 'admin' ): ?>

                                             <form onsubmit="return confirm('Really want to delete?')" action="deletePost.php" method="post">
                                                <input type="hidden" name="post_id" value="<?= $post['id']?>">
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                             </form>
                                             <?php endif; ?>
                                             </div>
                                          </div>
                        <div style='margin-bottom:40px;' class="course_price d-flex flex-column align-items-center justify-content-center">
                           <span>$29</span>
                        </div>
                     </div>
                     <?php endif; ?>
                     <?php endforeach;?>
               </div>
               </div>



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

</html>