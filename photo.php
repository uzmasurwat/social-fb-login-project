
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

		<?php if(isset($login_user -> photo)) :	?>
			<img src="media/users/<?php echo $login_user -> photo;?>" alt="" style="width: 200px; height: 200px; margin: auto; border: 10px solid #fff; display: block; border-radius: 50%; box-shadow: 0 0 10px skyblue;">
			
			<?php elseif($login_user-> gender == 'male') :	?>
			<img src="assets/media/male.jpg" alt="" style="width: 200px; height: 200px; margin: auto; border: 10px solid #fff; display: block; border-radius: 50%; box-shadow: 0 0 10px skyblue;">
			
			<?php elseif($login_user-> gender == 'female') : ?>
			<img src="assets/media/f.jpg" alt="" style="width: 200px; height: 200px; margin: auto; border: 10px solid #fff; display: block; border-radius: 50%; box-shadow: 0 0 10px skyblue;">
			
			<?php endif; ?>
			
		<?php
		
			if(isset($_POST['upload']))
			{
				$user_id = $_SESSION['id'];
				$file = move($_FILES['photo'], 'media/users/');

				update("UPDATE users SET photo='$file' WHERE id='$user_id'");

				header('location:photo.php');
			}
		
		?>


		
		
		<div class="card" style="border-radius: 30px; margin: 80px 0; box-shadow: 0 0 10px skyblue;"> 

			<div class="card-body bg-info">
				<form action="" method="POST" enctype="multipart/form-data">
					<label for="" class="mx-2"><img src="assets/media/img/pp_photo/photo-icon.png" width="50px" height="50px" alt=""></label>
					<input type="file" name="photo" class="bg-dark text-light">
					<input type="submit" class="bg-dark text-light" value="upload" name="upload">
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