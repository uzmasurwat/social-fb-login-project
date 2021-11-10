<?php
	require_once "autoload.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Social user</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body class="py-5">

	<?php

		/**
		 * reg form isset
		 */

		 
		if(isset($_POST['reg'])){

			//get values

			$name = $_POST['name'];
			$email = $_POST['email'];
			$cell = $_POST['cell'];
			$username = $_POST['username'];
			$pass = $_POST['pass'];
			$cpass = $_POST['cpass'];

			/**
			 * make hash pass
			 */
			$hash_pass = goHash($pass);


			$gender = NULL;
			if(isset($_POST['gender'])){
				$gender = $_POST['gender'];
			}

			//validation
			if(empty($name) || empty($email) || empty($cell) || empty($username) || empty($pass) || empty($gender)){
				$msg = validate('Please sumbit the reqiured fields');
			}else if( emailcheck($email) == false){
				$msg = validate('Please validate your email Address!');
			}else if(cellcheck($cell) == false){
				$msg = validate('Your cell number is incorrect!');
			}else if(passcheck($pass, $cpass) == false){
				$msg = validate('The password is not the same !', 'warning');
			}else if(dataCheck('users', 'email', $email) == false){
				$msg = validate('This email is already used!');
			}else if(dataCheck('users', 'cell', $cell) == false){
				$msg = validate('This cell number is already in list!');
			}else if(dataCheck('users', 'username', $username) == false){
				$msg = validate('Look for a new username!');
			}
			else{
				create("INSERT INTO users (name, email, cell, username, password, gender) VALUES ('$name', '$email', '$cell', '$username', '$hash_pass', '$gender')");

				$msg = validate('You are now REGISTERED', 'primary');
				formClean();
			}
			

		}
	?>
	
	

	<div class="wrap shadow-sm w-50">
		<div class="card px-5">
			<div class="card-body">
				<h2 class="py-2 text-primary font-weight-bold text-center">Create an account</h2>
				
				<?php
					if(isset($msg)){
						echo $msg;
					}
				?>

				<form action="" method="POST" autocomplete="off">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" value="<?php old('name'); ?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" value="<?php old('email'); ?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" value="<?php old('cell'); ?>" type="text">
					</div>

					<div class="form-group">
						<label for="">Username</label>
						<input name="username" class="form-control" value="<?php old('username'); ?>" type="text">
					</div>

					<div class="form-group">
						<label for="">Password</label>
						<input name="pass" class="form-control" type="password">
					</div>

					<div class="form-group">
						<label for="">Confirm Password</label>
						<input name="cpass" class="form-control" type="password">
					</div>

					<div class="form-group">
						<label for="">Gender</label><br>
						<input name="gender" type="radio" value="male" id="Male"><label class="px-3" for="Male">Male</label>
						<input name="gender" type="radio" value="female" id="Female"><label class="px-3" for="Female">Female</label>
					</div>

					<div class="form-group">
						<input name="reg" class="btn btn-primary" type="submit" value="Sign Up">
					</div>
				</form>
				<hr>
				<a href="index.php" class="text-primary">Login Now</a>
			</div>
		</div>
	</div><br><br>
	
 






	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>