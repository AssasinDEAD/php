

<?php
	session_start();
      require_once 'assets/checkAuth.php';

require_once "assets/checkBan.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Course</title>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="Course Project">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
   <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
   <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
   <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
   <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
   <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
   <link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>

<body>

   <div class="super_container">

      <!-- Header -->

      <?php require_once "assets/nav.php"; 
      require_once "assets/conn.php"; 
      ?>

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
                  <li class="menu_item menu_mm"><a href="#">Home</a></li>
                  <li class="menu_item menu_mm"><a href="#">About us</a></li>
                  <li class="menu_item menu_mm"><a href="courses.html">Courses</a></li>
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

         <!-- Hero Slider -->
         <div class="hero_slider_container">
            <div class="hero_slider owl-carousel">

               <!-- Hero Slide -->
               <div class="hero_slide">
                  <div class="hero_slide_background" style="background-image:url(images/slider_background.jpg)"></div>
                  <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                     <div class="hero_slide_content text-center">
                        <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Get your
                           <span>Education</span> today!
                        </h1>
                     </div>
                  </div>
               </div>

               <!-- Hero Slide -->
               <div class="hero_slide">
                  <div class="hero_slide_background" style="background-image:url(images/slider_background.jpg)"></div>
                  <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                     <div class="hero_slide_content text-center">
                        <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Get your
                           <span>Education</span> today!
                        </h1>
                     </div>
                  </div>
               </div>

               <!-- Hero Slide -->
               <div class="hero_slide">
                  <div class="hero_slide_background" style="background-image:url(images/slider_background.jpg)"></div>
                  <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                     <div class="hero_slide_content text-center">
                        <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Get your
                           <span>Education</span> today!
                        </h1>
                     </div>
                  </div>
               </div>

            </div>

            <div class="hero_slider_left hero_slider_nav trans_200"><span class="trans_200">prev</span></div>
            <div class="hero_slider_right hero_slider_nav trans_200"><span class="trans_200">next</span></div>
         </div>

      </div>

      <div class="hero_boxes">
         <div class="hero_boxes_inner">
            <div class="container">
               <div class="row">

                  <div class="col-lg-6 hero_box_col">
                     <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                        <img src="images/earth-globe.svg" class="svg" alt="">
                        <div class="hero_box_content">
                           <h2 class="hero_box_title">Books</h2>
                           <a href="allBooks.php" class="hero_box_link">view more</a>
                        </div>
                     </div>
                  </div>

                  <div class="col-lg-6 hero_box_col">
                     <div class="hero_box d-flex flex-row align-items-center justify-content-center">
                        <img src="images/professor.svg" class="svg" alt="">
                        <div class="hero_box_content">
                           <h2 class="hero_box_title">Authors</h2>
                           <a href="authors.php" class="hero_box_link">view more</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <?php require_once "assets/footer.php"; ?>

   </div>
   <script src="js/jquery-3.2.1.min.js"></script>
   <script src="styles/bootstrap4/popper.js"></script>
   <script src="styles/bootstrap4/bootstrap.min.js"></script>
   <script src="plugins/greensock/TweenMax.min.js"></script>
   <script src="plugins/greensock/TimelineMax.min.js"></script>
   <script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
   <script src="plugins/greensock/animation.gsap.min.js"></script>
   <script src="plugins/greensock/ScrollToPlugin.min.js"></script>
   <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
   <script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
   <script src="plugins/easing/easing.js"></script>
   <script src="js/custom.js"></script>

</body>

</html>