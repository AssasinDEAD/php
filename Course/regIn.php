<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register form page</title>

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #2e8746;
    margin: 0;
    padding: 0;
}

.centerForm {
    max-width: 400px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.field-group {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    background-color: #F9776F;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    margin-right: 10px;
}

button:hover {
    background-color:#F9776F;
}


.success {
    background-color:#F9776F;
    color:green ;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 4px;
}
.mainError {
    background-color:#F9776F;
    color:red ;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 4px;
}

.inputError {
    color: #ff0000;
    margin-top: 5px;
}

.fa-circle-xmark {
    cursor: pointer;
}

a {
    color: #fff;
    border: 2px solid rgba(255, 255, 255, .5);
    border-radius: 40px;
    padding: 5px;
    margin-top: 20px;
    text-decoration: none;
    display: inline-block;
}

a:hover {
    background-color: #fff;
    color: #333;
}

</style>
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

		<form action="reg.php" method="POST" enctype="multipart/form-data">
			<div class="field-group">
				<label for="name">Name</label>
				<input type="text" name="name" id="name">
				<?php if($hasErrors && isset($_SESSION['errors']['name'])): ?>
					<p class="inputError"><?= $_SESSION['errors']['name'] ?></p>
				<?php endif; ?>
			</div>
			<div class="field-group">
				<label for="email">Email</label>
				<input type="email" name="email" id="email">
				<?php if($hasErrors && isset($_SESSION['errors']['email'])): ?>
					<p class="inputError"><?= $_SESSION['errors']['email'] ?></p>
				<?php endif; ?>
			</div>
			<div class="field-group">
				<label for="password">Password</label>
				<input type="password" name="password" id="password">
				<?php if($hasErrors && isset($_SESSION['errors']['password'])): ?>
					<p class="inputError"><?= $_SESSION['errors']['password'] ?></p>
				<?php endif; ?>
			</div>
			<div class="field-group">
				<label for="confirm_password">Confirm password</label>
				<input type="password" name="confirm_password" id="confirm_password">
				<?php if($hasErrors && isset($_SESSION['errors']['confirm_password'])): ?>
					<p class="inputError"><?= $_SESSION['errors']['confirm_password'] ?></p>
				<?php endif; ?>
                
			</div>
            <div class="field-group">
				<label for="file">Avatar</label>
				<input type="file" name="avatar" id="avatar">
				<?php if($hasErrors && isset($_SESSION['errors']['avatar'])): ?>
					<p class="inputError"><?= $_SESSION['errors']['avatar'] ?></p>
				<?php endif; ?>
			</div>
			<button type="submit">Register</button>
		<button><a style="padding:0;margin:0; border:none;" href="logIn.php">Log In</a></button>
		</form>
	</div>

	<?php
require_once 'assets/conn.php';
	unset($_SESSION['status']);
	unset($_SESSION['errors']);
	unset($_SESSION['message']);
   ?>
</body>
</html>