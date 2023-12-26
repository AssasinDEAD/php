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

<style>.avatar{
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }
</style>
</head>
<body>

<div class="super_container">

	<!-- Header -->
   <?php require_once "assets/nav.php"; ?>
	<?php require_once "assets/conn.php"; ?>
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
			<h1>Add new author</h1>
		</div>
	</div>

	<!-- Elements -->

	<div class="elements">

      <div class="register">

<?php
$hasErrors = false; 
if(isset($_SESSION['status']) && $_SESSION['status'] == 'error')
   $hasErrors = true;
?>

<div class="centerForm">
   <?php if(isset($_SESSION['status']) && $_SESSION['status'] == 'success'): ?>
      <div class="success">
         <?= $_SESSION['message'] ?>
         <i class="fa-regular fa-circle-xmark" onclick="this.parentElement.remove()"></i>
      </div>
   <?php endif; ?>
   <?php
   $users = getUsers();
  ?>
  <?php foreach($users as $us): ?>
<div class="prof" style="border: solid 1px black; display:flex;">
<h1 style='color:black;margin-right:10px;'> Name:<?= $us['name']?> </h1>
<h1 style='color:black;margin-right:10px;'>Id:<?= $us['id']?></h1>
      <img style='color:black;margin-right:10px; width:80px; height:80px; border-radius:50%;'  src="http://localhost/Course/Course/img/avatar/<?= $us['avatar']?>">
      <?php if($us['role'] == 'admin'):?>
         <h1>ADMIN</h1>
         <?php endif;?>
      <div class="butt" style='display:flex;  align-items:center;'>
      <?php if($us['role'] == 'user'):?>
         <form onsubmit="return confirm('Really want to change?')" action="changeToMod.php" method="post">
            <input type="hidden" name="us_id" value="<?= $us['id']?>">
            <button class="btn btn-danger" type="submit" style='color:black;margin-right:10px;'>To author</button>
         </form>
         <form onsubmit="return confirm('Really want to delete?')" action="delUser.php" method="post">
            <input type="hidden" name="us_id" value="<?= $us['id']?>">
             <button style='color:black;margin-right:10px;' class="btn btn-danger" type="submit">Delete</button>
         </form>
      <?php endif;?>
      <?php if($us['role'] == 'author'):?>
         <form onsubmit="return confirm('Really want to change?')" action="changeToUser.php" method="post">
            <input type="hidden" name="us_id" value="<?= $us['id']?>">
            <button style='color:black;margin-right:10px;' class="btn btn-danger" type="submit">To user</button>
         </form>
         <form onsubmit="return confirm('Really want to delete?')" action="delUser.php" method="post">
            <input type="hidden" name="us_id" value="<?= $us['id']?>">
             <button style='color:black;margin-right:10px;' class="btn btn-danger" type="submit">Delete</button>
         </form>
      <?php endif;?> 
	  <?php if($us['ban'] == 'not' && $us['role'] != 'admin'):?>
	  <form onsubmit="return confirm('Really want to ban?')" action="banUser.php" method="post">
            <input type="hidden" name="us_id" value="<?= $us['id']?>">
             <button style='color:black;margin-right:10px;' class="btn btn-danger" type="submit">Ban</button>
         </form>
		 <?php endif;?>
		 <?php if($us['ban'] == 'yes' && $us['role'] != 'admin'):?>
	  <form onsubmit="return confirm('Really want to unban?')" action="banUser.php" method="post">
            <input type="hidden" name="us_id" value="<?= $us['id']?>">
             <button style='color:black;margin-right:10px;' class="btn btn-warning" type="submit">Unban</button>
         </form>
		 <?php endif;?>
      </div>
      </div>
   <?php endforeach;?>
</div>

<?php
require_once 'assets/conn.php';
unset($_SESSION['status']);
unset($_SESSION['errors']);
unset($_SESSION['message']);
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