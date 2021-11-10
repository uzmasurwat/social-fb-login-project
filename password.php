
<?php
	require_once "autoload.php";

/**
 * check user login
 */
	if(userLogin() == false){
		header('location:index.php');
	}else{
		$login_user = userLoginData('users', $_SESSION['id']);
	}








?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $login_user-> name; ?></title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
	
<nav class="profile_menu bg-light py-3 shadow-sm">
		<div class="container">
			<div class="row">
				<div class="col-md-8 offset-2">
					<ul class="nav nav-tab d-flex justify-content-center">
						<li class="nav nav-item"><a class=" text-secondary text-uppercase font-weight-bold nav-link" href="profile.php">My Profile</a></li>
						<li class="nav nav-item"><a class=" text-secondary text-uppercase font-weight-bold nav-link" href="friends.php">Friends</a></li>
						<li class="nav nav-item"><a class=" text-secondary text-uppercase font-weight-bold nav-link" href="edit.php">Edit Profile</a></li>
						<li class="nav nav-item"><a class=" text-secondary text-uppercase font-weight-bold nav-link" href="photo.php">Profile photo</a></li>
						<li class="nav nav-item"><a class=" text-secondary text-uppercase font-weight-bold nav-link" href="password.php">Change Password</a></li>
						<li class="nav nav-item"><a class=" text-secondary text-uppercase font-weight-bold nav-link" href="logout.php">Logout</a></li>						
					</ul>					
				</div>
			</div>
		</div>s


	</nav>

	<section class="user-profile" style="width:500px; margin: 100px auto 100px; border-radius: 25px; text-align: center;">

		<?php
			if(isset($_POST['cp'])){
				//get values

				$old_pass = $_POST['old'];
				$npass = $_POST['new'];
				$cnew = $_POST['cnew'];


				$hash_pass = goHash($npass);
				

				if(empty($old_pass) || empty($npass) || empty($cnew)){
					echo $msg = validate('All fields are required');
				}else if($npass != $cnew){
					echo $mmsg = validate('Password confirmation failed!', 'warning');

				}
				else if(password_verify($old_pass, $login_user->password) == false){
					echo $mmsg = validate('The old password does not match', 'warning');
				}else{
					update("UPDATE users SET password='$hash_pass' WHERE id='$login_user->id'");
					session_destroy();
					header('location:index.php');
					//check it now
				}
			}
		?>		
			
		


		
		
		<div class="card" style="border-radius: 25px; margin: 80px 0; box-shadow: 0 0 10px skyblue;"> 

			<div class="card-body bg-info">
				<form action="" method="POST">

				<div class="form-group">
						<input name="old" type="password" class="form-control" placeholder="Old Password" >
					</div>

					
				<div class="form-group">
						<input name="new" type="password" class="form-control" placeholder="New Password" >
					</div>

					<div class="form-group">
						<input name="cnew" type="password" class="form-control" placeholder="Confirm Password" >
					</div>
					
					<div class="form-group">
						<input name="cp" type="submit" class="btn shadow btn-dark text-light py-2 font-weight-bold" value="Change Password" >
					</div>
					
				</form>
			
			</div>
		</div>


	</section>
	


	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>