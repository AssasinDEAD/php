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
        <?php
	$hasErrors = false; 
	if(isset($_SESSION['status']) && $_SESSION['status'] == 'error')
		$hasErrors = true;
	?>
        
        <!-- Page content-->
        <div class="container py-4">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8"> 
    <form action="addAut.php" method="post"  enctype="multipart/form-data">
        <div class="form-group">
            <label for="titleInput">Post title</label>
            <input name="title" type="text" class="form-control" id="titleInput">
            <?php if($hasErrors && isset($_SESSION['errors']['title'])): ?>
					<p class="inputError" style="color:red; font-weight:bold;"><?= $_SESSION['errors']['title'] ?></p>
				<?php endif; ?>
        </div>
    
        <div class="form-group">
            <label for="categoryInput">Example select</label>
            <select name="category_id" class="form-control" id="categoryInput">
                <?php foreach($categories as $cat): ?>
                    <option value="<?= $cat['id'] ?>"> <?= $cat['types'] ?> </option>
                <?php endforeach; ?>
            </select>
        </div>

		<div class="field-group">
				<label for="file">Book</label>
				<input type="file" name="book" id="book">
				<?php if($hasErrors && isset($_SESSION['errors']['book'])): ?>
					<p class="inputError"><?= $_SESSION['errors']['book'] ?></p>
				<?php endif; ?>
			</div>
        <div class="form-group py-3">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
		
    </form>
                </div>
                
                <?php
               unset($_SESSION['status']);
                ?>
			</div>
		</div>

		<?php

unset($_SESSION['status']);
unset($_SESSION['errors']);
unset($_SESSION['message']);

?>
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