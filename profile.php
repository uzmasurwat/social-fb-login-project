
<?php
	require_once "autoload.php";

/**
 * check user login
 */
	if(userLogin() == false){



		header('location:index.php');
	}else{


			if(isset($_GET['user_id'])){
				$login_user = userLoginData('users', $_GET['user_id']);
			}else{
				$login_user = userLoginData('users', $_SESSION['id']);
			}

		
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $login_user->name; ?></title>
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
						<li class="nav nav-item"><a class=" text-secondary text-uppercase font-weight-bold nav-link" href="Profile.php">My Profile</a></li>
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
		
				
		


		<h3 class="text-center text-secondary font-wight-bold display-4 py-3 text-calitalize"><?php echo $login_user ->name; ?></h3>
		
		<div class="card" style="border-radius: 25px; box-shadow: 0 0 10px skyblue;"> 

			<div class="card-body bg-info">

				<table class="table table-stripped table-bordered mx-1 table-dark my-auto text-left">

					<tr>
						<td class="text-light">name</td>
						<td class="text-light"><?php echo $login_user->name; ?></td>
					</tr>

					<tr>
						<td class="text-light">email</td>
						<td class="text-light"><?php echo $login_user->email; ?></td>
					</tr>
					
					<tr>
						<td class="text-light">cell</td>
						<td class="text-light"><?php echo $login_user->cell; ?></td>
					</tr>
					
					<tr>
						<td class="text-light">gender</td>
						<td class="text-light"><?php echo $login_user->gender; ?></td>
					</tr>	
					
					<?php
						if($login_user->age != NULL) :
					?>
					
					<tr>
						<td class="text-light">age</td>
						<td class="text-light"><?php echo $login_user->age; ?></td>
					</tr>	

					<?php  endif; ?>

					<?php
						if($login_user->edu != NULL) :
					?>

					<tr>
						<td class="text-light">edu</td>
						<td class="text-light"><?php echo $login_user->edu; ?></td>
					</tr>	

					<?php  endif; ?>
					
				</table>
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