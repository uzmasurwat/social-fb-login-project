
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
		</div>
	</nav>

	

	<section class="users">
		<div class="container">
			<div class="row">

			<?php
				$all_users = all('users');


				while($user = $all_users-> fetch_object()) :
			?>
			<?php
				if($user->id != $_SESSION['id']) :
			?>

				<div class="col-md-3">
					<div class="card bg-transparent mt-4 ml-2 p-2" style="box-shadow: 0 0 10px skyblue; border-radius: 50%;">
						<div class="card-body bg-info text-center"  style="border-radius: 50%;">
							<img src="media/users/<?php echo $user-> photo; ?>" alt="" width="100px" height="100px"  style="border-radius: 50%; object-fit: cover;">
							<h3 class="py-2 text-light font-weight-bold"><?php echo $user-> name; ?></h4>
							<a href="profile.php?user_id=<?php echo $user-> id; ?>" class="btn btn-lg btn-light text-info font-weight-bold p-1 m-2">View Profile</a>
						</div>
					</div>
				</div>
				<?php
					endif ;
				?>

				<?php
					endwhile ;
				?>
				
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