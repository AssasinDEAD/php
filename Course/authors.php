
<?php
	session_start();

  
require_once "assets/conn.php";

$user = $_SESSION['user'] ?? ''; 
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


$users = getUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Course - Teachers</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/teachers_styles.css">
<link rel="stylesheet" type="text/css" href="styles/teachers_responsive.css">
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
					<li class="menu_item menu_mm"><a href="about.html">About us</a></li>
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
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(images/teachers_background.jpg)"></div>
		</div>
		<div class="home_content">
			<h1>Authors</h1>
		</div>
	</div>

	<!-- Teachers -->

	<div class="teachers page_section">
		<div class="container">
			<div class="row d-flex justify-content-around" style="width:100%">

				<!-- Teacher -->
				<?php	if (isset($_SESSION['status']) && $_SESSION['status']=="deleted") :?>
                     <div class="success">
                        <span style="color:lightgreen;"><?= $_SESSION['message']?></span>
                        <i class="fa-regular fa-circle-xmark" onclick="this.parentElement.remove()"></i>
                     </div>
                     <?php	endif; ?>

				<!-- Teacher -->
				<div class="col-lg-12 teacher d-flex justify-content-around" style="width:100%">
				<?php foreach($users as $us): ?>
					<?php if($us['role'] == 'author'):?>
					<div class="card">
						<div class="card_img">
							<div class="card_plus trans_200 text-center"><a href="#">+</a></div>
							<img style="width:200px; height:auto" class="card-img-top trans_200" src="http://localhost/Course/Course/img/avatar/<?=$us['avatar']?>" alt="https://unsplash.com/@jcpeacock">
						</div>
						<div class="card-body text-center">
							<div class="card-title"><a href="#"><?php if($us['role'] == 'author'){
								echo $us["name"];
							}  ?></a></div>

							<div class="teacher_social">
								<ul class="menu_social">
									<li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
									<li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
									<li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
									<li class="menu_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
									<li class="menu_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
								</ul>
							</div>
                     <?php if( $user['role'] == 'admin' ): ?>
                                             <form onsubmit="return confirm('Really want to delete?')" action="deletePost.php" method="post">
                                                <input type="hidden" name="post_id" value="<?= $post['id']?>">
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                             </form>
                                             <?php endif; ?></div>
						</div>
						<?php endif;?>
						<?php endforeach; ?>
					</div>
					
				</div>

				<!-- Teacher -->

	<!-- Footer -->

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
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/teachers_custom.js"></script>

</body>
</html>