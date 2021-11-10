
<?php
	require_once "autoload.php";

	/**
 * check user login
 */
if(userLogin() == true){
	header('location:profile.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Social User</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>

	<?php
	
	/**
	 * signin isset
	 */

	 if(isset($_POST['signin'])){

		//get value

		$login = $_POST['login'];
		$pass = $_POST['password'];

		if(empty($login) || empty($pass)){
			$msg =validate('**Complete filling of all fields!**');
		}else{

			$login_user_data = authCheck('users', 'email', $login);

			if($login_user_data !== false){
				
				if(passChk($pass, $login_user_data->password)){

					$_SESSION['id'] = $login_user_data->id;
				

					header('location:profile.php');

				}else{
					$msg = validate('Password does not match', 'warning');
				}
			}else{
				$msg = validate('Invalid Login Email', 'warning');
			}
		}


	 }

	?>
	

	<div class="wrap shadow-sm">
		<div class="card">
			<div class="card-body">
				
			<h2 class="py-2 text-primary font-weight-bold text-center">Login Now</h2>
				
					<?php
						if(isset($msg)){
							echo $msg;
						}
					?>

				<form action="" method="POST" autocomplete="off">
					
					<div class="form-group">
						<label for="">login info</label>
						<input name="login" class="form-control" value="<?php old('login')?>" type="text" placeholder="email or cell or username">
					</div>
					
					<div class="form-group">
						<label for="">Password</label>
						<input name="password" class="form-control" type="password"  placeholder="password">
					</div>
					<div class="form-group">
						<input name="signin" class="btn btn-primary my-2" type="submit" value="Sign in">
					</div>
				</form>
				<hr>
				<a href="reg.php" class="text-primary">Create an Account</a>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>