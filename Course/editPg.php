<?php
	session_start();

      $user = $_SESSION['user'] ?? ''; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Course - News Post</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/news_post_styles.css">
<link rel="stylesheet" type="text/css" href="styles/news_post_responsive.css">
</head>
<body>

<div class="super_container">

<?php require_once "assets/nav.php"; 
      require_once "assets/conn.php"; 
      ?>

<?php



    $categories = getGenres();
	$users = getUsers();

    $postId = $_GET['post_id'] ?? null;
	$book = getPosts(); 


    $categories = getGenres();

    $postId = $_GET['post_id'] ?? '';

    if($postId)
        $post = getOnePost($postId);
        
    if($post['user_id'] != $user['id'] and $user['role'] != 'author' and $user['role'] != 'admin'){
      header('Location: index.php');
    }
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
					<li class="menu_item menu_mm"><a href="index.html">Home</a></li>
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
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(images/news_background.jpg)"></div>
		</div>
		<div class="home_content">
			<h1>What do you want to change?</h1>
		</div>
	</div>
    <form action="edit.php" method="post">

<input name="id" value="<?= $post['id'] ?>" type="hidden">

    <div class="form-group">
        <label for="titleInput">Post title</label>
        <input name="title" value="<?= $post['title'] ?>" type="text" class="form-control" id="titleInput">
    </div>
    
    <div class="form-group">
        <label for="categoryInput">Example select</label>
        <select name="category_id" class="form-control" id="categoryInput">
           <?php foreach($categories as $cat): ?>
              <option <?php if($cat['id'] == $post['category_id']) echo 'selected' ?> value="<?= $cat['id'] ?>"> <?= $cat['types'] ?> </option>
           <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group py-3">
        <button type="submit" class="btn btn-primary">Edit</button>
    </div>
</form>



<?php
unset($_SESSION['status']);
unset($_SESSION['errors']);
unset($_SESSION['message']);

?>
    
    
    <?php
    require_once 'assets/footer.php';
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