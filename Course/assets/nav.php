
<?php
      $user = $_SESSION['user'] ?? ''; 
?>
<header class="header d-flex flex-row">
         <div class="header_content d-flex flex-row align-items-center">
            <!-- Logo -->
            <div class="logo_container">
               <div class="logo">
                  <img src="images/logo.png" alt="">
                  <span>course</span>
               </div>
            </div>

            <!-- Main Navigation -->
            <nav class="main_nav_container">
               <div class="main_nav">
                  <ul class="main_nav_list">
                     <?php if($user['role']=='admin'):?>
                     <li class="main_nav_item"><a href="adminPage.php">main</a></li>
                     <?php endif; ?>
                     <?php if($user['role']=='user'):?>
                     <li class="main_nav_item"><a href="index.php">main</a></li>
                     <?php endif; ?>
                     <?php if($user['role']=='author'):?>
                     <li class="main_nav_item"><a href="autPage.php">main</a></li>
                     <?php endif; ?>
                     <li class="main_nav_item"><a href="authors.php">Authors</a></li>
                     <?php if($user['role']=='admin'):?>
                        <li class="main_nav_item"><a href="check.php">check</a></li>
                     <?php endif; ?>
                     <?php if($user['role']=='admin'):?>
                        <li class="main_nav_item"><a href="addAuthForm.php">Add Author</a></li>
                     <?php endif; ?>
                     <?php if($user['role']=='admin'):?>
                        <li class="main_nav_item"><a href="addCat.php">Add types</a></li>
                     <?php endif; ?>
                     <li class="main_nav_item"><a href="allBooks.php">Content</a></li>
                     <li class="main_nav_item"><a href="change.php">change pass</a></li>
                     <li class="main_nav_item"><a href="logout.php">logout</a></li>
                  </ul>
               </div>
            </nav>
         </div>
         <div class="header_side d-flex flex-row justify-content-center align-items-center">
         <img style='color:black;margin-right:10px; width:50px; height:50px; border-radius:50%;'  src="http://localhost/Course/Course/img/avatar/<?=$user['avatar']?>" alt="Avatar" class="avatar">
<span> <?php echo $user['role'];echo" "; echo $user['name']; ?> </span>
		</div>
         <!-- Hamburger -->
         <div class="hamburger_container">
            <i class="fas fa-bars trans_200"></i>
         </div>

      </header>