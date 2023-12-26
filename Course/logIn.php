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
<?php session_start(); ?>

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

   <?php if(isset($_SESSION['status']) && $_SESSION['status'] == 'mainError'): ?>
      <div class="mainError">
         <?= $_SESSION['message'] ?>
         <i class="fa-regular fa-circle-xmark" onclick="this.parentElement.remove()"></i>
      </div>
   <?php endif; ?>
   
   <div class="container col-lg-6 mg-auto">
      <!-- Pills navs -->
<ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist" style="padding:30px;">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
      aria-controls="pills-login" aria-selected="true">Login</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="regIn.php" role="tab"
      aria-controls="pills-register" aria-selected="false">Register</a>
  </li>
</ul>
<!-- Pills navs -->

<!-- Pills content -->
<div class="tab-content">
  <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
    <form action="log.php" method="POST">
      <div class="text-center mb-3">
        <p>Sign in with:</p>
        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-facebook-f"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-google"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-twitter"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-github"></i>
        </button>
      </div>

      <p class="text-center">or:</p>

      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="email" name="email" id="email loginName" class="form-control" />
        <label class="form-label" for="loginName" >Email or username</label>
        <?php if($hasErrors && isset($_SESSION['errors']['email'])): ?>
					<p class="inputError"><?= $_SESSION['errors']['email'] ?></p>
				<?php endif; ?>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <input type="password" name="password" id="password loginPassword" class="form-control" />
        <label class="form-label" for="loginPassword">Password</label>
        <?php if($hasErrors && isset($_SESSION['errors']['password'])): ?>
					<p class="inputError"><?= $_SESSION['errors']['password'] ?></p>
				<?php endif; ?>
      </div>

      <!-- 2 column grid layout -->
      <div class="row mb-4">
        <div class="col-md-6 d-flex justify-content-center">
          <!-- Checkbox -->
          <div class="form-check mb-3 mb-md-0">
            <!-- <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked /> -->
            <!-- <label class="form-check-label" for="loginCheck"> Remember me </label> -->
          </div>
        </div>

      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

      <!-- Register buttons -->

    </form>
  </div>
  <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
    <form>
      <div class="text-center mb-3">
        <p>Sign up with:</p>
        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-facebook-f"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-google"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-twitter"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-github"></i>
        </button>
      </div>

      <p class="text-center">or:</p>

      <!-- Name input -->
      <div class="form-outline mb-4">
        <input type="text" id="registerName" class="form-control" />
        <label class="form-label" for="registerName">Name</label>
      </div>

      <!-- Username input -->
      <div class="form-outline mb-4">
        <input type="text" id="registerUsername" class="form-control" />
        <label class="form-label" for="registerUsername">Username</label>
      </div>

      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="email" id="registerEmail" class="form-control" />
        <label class="form-label" for="registerEmail">Email</label>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <input type="password" id="registerPassword" class="form-control" />
        <label class="form-label" for="registerPassword">Password</label>
      </div>

      <!-- Repeat Password input -->
      <div class="form-outline mb-4">
        <input type="password" id="registerRepeatPassword" class="form-control" />
        <label class="form-label" for="registerRepeatPassword">Repeat password</label>
      </div>

      <!-- Checkbox -->
      <div class="form-check d-flex justify-content-center mb-4">
        <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
          aria-describedby="registerCheckHelpText" />
        <label class="form-check-label" for="registerCheck">
          I have read and agree to the terms
        </label>
      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block mb-3">Sign in</button>
    </form>
  </div>
</div>
<!-- Pills content -->
   </div>
   <?php

unset($_SESSION['status']);
unset($_SESSION['errors']);
unset($_SESSION['message']);

?>
</body>
</html>