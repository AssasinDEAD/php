<?php
	session_start();

      $user = $_SESSION['user'] ?? ''; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Course - Elements</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/elements_styles.css">
<link rel="stylesheet" type="text/css" href="styles/elements_responsive.css">
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
					<li class="menu_item menu_mm"><a href="courses.html">Courses</a></li>
					<li class="menu_item menu_mm"><a href="#">Elements</a></li>
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

				<div class="menu_copyright menu_mm"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
			</div>

		</div>

	</div>
	
	<!-- Home -->

	<div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(images/contact_background.jpg)"></div>
		</div>
		<div class="home_content">
			<h1>New Password</h1>
		</div>
	</div>

	<!-- Elements -->

	<div class="elements">

      <div class="register">

      <?php
	$herror=false;
	if(isset($_SESSION['status']) && $_SESSION['status'] == 'error')
	$herror=true;


?>
<div class="centerForm">

<?php if(isset($_SESSION['status']) && $_SESSION['status'] == 'success'): ?>
		<div class="success">
			<span><?= $_SESSION['message']?></span>
			<i class="fa-regular fa-circle-xmark" onclick="this.parentElement.remove()"></i>
		</div>
	<?php endif; ?>
   
	<?php if(isset($_SESSION['status']) && $_SESSION['status'] == 'mainError'): ?>
		<div class="mainError">
			<span><?= $_SESSION['message']?></span>
			<i class="fa-regular fa-circle-xmark" onclick="this.parentElement.remove()"></i>
		</div>
	<?php endif; ?>

<form action="update.php" method="POST">
		<h3>Old Password:</h3>
		<div class="field-group">
			<input type="password" name="oldpassword" placeholder="Password" >
		</div>

			<?php if($herror && isset($_SESSION['errors']['oldpassword'])):?>
			<div class="error"><?= $_SESSION['errors']['oldpassword'] ?></div>
			<?php endif; ?>

        
        <h3>New Password:</h3>
		<div class="field-group">
			<input type="password" name="newpassword" placeholder="Password" >
		</div>

			<?php if($herror && isset($_SESSION['errors']['newpassword'])):?>
			<div class="error"><?= $_SESSION['errors']['newpassword'] ?></div>
			<?php endif; ?>


			<h3>Confirm new password:</h3>
		<div class="field-group">
			<input type="password" name="confirm_password" id="confirm_password" placeholder="Password" >
		</div>

			<?php if($herror && isset($_SESSION['errors']['confirm_password'])):?>
			<div class="error"><?= $_SESSION['errors']['confirm_password'] ?></div>
			<?php endif; ?>

		

		<button type="submit" class="bt">Profile</button>
	</form>
</div>

<?php
unset($_SESSION['status']);
unset($_SESSION['errors']);
unset($_SESSION['message']);

?>
    
    
    <?php

$userp=$_SESSION['user']['password'];
    echo "<pre>";
        print_r($userp);
    echo "</pre>";
    ?>
      </div>
   </div>
</div>


<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/elements_custom.js"></script>

</body>
</html>