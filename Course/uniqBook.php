
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
<style>
	.rating-area {
            overflow: hidden;
            width: 265px;
            margin: 0 auto;
        }
        .rating-area:not(:checked) > input {
            display: none;
        }
        .rating-area:not(:checked) > label {
            float: right;
            width: 42px;
            padding: 0;
            cursor: pointer;
            font-size: 32px;
            line-height: 32px;
            color: lightgrey;
            text-shadow: 1px 1px #bbb;
        }
        .rating-area:not(:checked) > label:before {
            content: '★';
        }
        .rating-area > input:checked ~ label {
            color: gold;
            text-shadow: 1px 1px #c60;
        }
        .rating-area:not(:checked) > label:hover,
        .rating-area:not(:checked) > label:hover ~ label {
            color: gold;
        }
        .rating-area > input:checked + label:hover,
        .rating-area > input:checked + label:hover ~ label,
        .rating-area > input:checked ~ label:hover,
        .rating-area > input:checked ~ label:hover ~ label,
        .rating-area > label:hover ~ input:checked ~ label {
            color: gold;
            text-shadow: 1px 1px goldenrod;
        }
        .rate-area > label:active {
            position: relative;
        }
</style>
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


    if($postId)
        $post = getOnePost($postId);

    $avg = getRating($postId);
	
    $count = getRead($postId);
	
;
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
			<h1>The News</h1>
		</div>
	</div>

	<!-- News -->

	<div class="news">
		<div class="container">
			<div class="row">
				
				<!-- News Post Column -->

				<div class="col-lg-8">
					
					<div class="news_post_container">
						<!-- News Post -->
						<div class="news_post">
							<div class="news_post_image">
								<img src="images/news_1.jpg" alt="https://unsplash.com/@dsmacinnes">
							</div>
							<div class="news_post_top d-flex flex-column flex-sm-row">
								<div class="news_post_date_container">
			
								</div>
								<div class="news_post_title_container">
									<div class="news_post_title">
										<h1><?= $post['title'] ?></h1>
									</div>
									<h4>
                                <?php

                                    if($avg['rating'])
                                        echo "rating: ".round($avg['rating'], 2);
                                    else
                                        echo "not rated";
                                ?>
                            </h4>
							<?php
													if($count['readed'])
													echo "People read: ". $count['readed'] . " this book";
												else
													echo "no one read this book";
							?>
									<div class="news_post_meta">
										<span class="news_post_author"><a href="#">
											<?php foreach($users as $us){
if($us["id"] == $post['user_id']){
	echo $us['name'];
}else{
	if($us["role"] == 'author'){
		if($us["id"] == $post['user_id']){
			echo $us['name'];
		}else{
			echo 'Mind your own business';
		}
	}
}
}?>
										</a></span>
										<span>|</span>
										
										<span class="news_post_comments"><a href="#">3 Comments</a></span>

									</div>
								</div>
							</div>
						</div>

					</div>
					
				



					<form action="rate.php" method="POST">
                        <div class="rating-area">
                        <input type="hidden" name="post_id" value="<?=$post['id']?>">
                            <input type="radio" id="star-5" name="rating" value="5">
                            <label for="star-5" title="very good"></label>	
                            <input type="radio" id="star-4" name="rating" value="4">
                            <label for="star-4" title="good"></label>    
                            <input type="radio" id="star-3" name="rating" value="3">
                            <label for="star-3" title="normal"></label>  
                            <input type="radio" id="star-2" name="rating" value="2">
                            <label for="star-2" title="bad"></label>    
                            <input type="radio" id="star-1" name="rating" value="1">
                            <label for="star-1" title="very bad"></label>
                        </div>
                        <button type="submit" class="btn btn-info my-3">Rate</button>
                        </form>
						<form action="read.php" method="post">
						<input type="hidden" name="post_id" value="<?=$post['id']?>">
						<input type="hidden" id="re" name="readed" value="1">
                        	<button type="submit" class="btn btn-info my-3">Finish</button>
						</form>
</div>
<iframe class=" col-lg-12 mg-auto" style="width:100; height:100vh; margin:20px 0px 20px 0px;" src= 'http://localhost/Course/Course/img/book/<?=$post['booking']?>'  frameborder="0"></iframe>
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
<script src="js/news_post_custom.js"></script>

</body>
</html>