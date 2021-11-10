
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
			if(isset($_POST['update'])){
				//get values

				echo $name = $_POST['name'];
				echo $email= $_POST['email'];
				echo $cell = $_POST['cell'];
				echo $username = $_POST['username'];
				echo $age = $_POST['age'];
				echo $edu = $_POST['edu'];
				echo $gender = $_POST['gender'];
				$login_user_id = $_SESSION['id'];

					if(empty($name) || empty($email) || empty($cell) || empty($username) || empty($gender)){

						echo validate('All fields are needed');
					}else{
						update("UPDATE users SET name='$name', email='$email', cell='$cell', username='$username', gender='$gender', age='$age', edu='$edu' WHERE id='$login_user_id' ");
						
						setMsg('success', 'Data Updated');

						
						
						header("location:edit.php");
					}
				
			}

			getmsg('success', 'hi');
			
		?>		
			
		


		
		
		<div class="card" style="border-radius: 25px; margin: 80px 0; box-shadow: 0 0 10px skyblue;"> 

			<div class="card-body bg-info">
				<form action="" method="POST">

				<div class="form-group">
					<label for="" class="float-left font-weight-bold text-light">Name</label>
						<input name="name" type="text" class="form-control" value="<?php  echo $login_user->name;?>">
					</div>

					
					<div class="form-group">
					<label for="" class="float-left font-weight-bold text-light">Email</label>
						<input name="email" type="text" class="form-control" value="<?php  echo $login_user->email;?>">
					</div>

					<div class="form-group">
					<label for="" class="float-left font-weight-bold text-light">Cell</label>
						<input name="cell" type="text" class="form-control" value="<?php  echo $login_user-> cell;?>">
					</div>

					<div class="form-group">
					<label for="" class="float-left font-weight-bold text-light">Username</label>
						<input name="username" type="text" class="form-control" value="<?php  echo $login_user->username;?>">
					</div>

					
					<div class="form-group">
					<label for="" class="float-left font-weight-bold text-light">Age</label>
						<input name="age" type="text" class="form-control" value="<?php  echo $login_user->age;?>">
					</div>

					<div class="form-group">
					<label for="" class="float-left font-weight-bold text-light">Edu</label>
						<input name="edu" type="text" class="form-control" value="<?php  echo $login_user->edu;?>">
					</div>

					<div class="form-group text-left p-2">
						<label for="" class="float-left font-weight-bold text-light">Gender</label><br>

						
					<input type="radio" name="gender" value="male" <?php echo ($login_user->gender=="male") ? 'checked' : ''; ?> id="male"><label class="text-light" for="male">Male</label>
                    <input type="radio" name="gender" value="female" <?php echo ($login_user->gender=="female") ? 'checked' : ''; ?> id="female"><label class="text-light" for="female">Female</label>

					</div>
					
					<div class="form-group">
						<input name="update" type="submit" class="btn shadow btn-dark mr-3 mb-3 py-1 px-4  font-weight-bold float-right " value="UPDATE" >
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