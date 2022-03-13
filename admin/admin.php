<?php 
include('database/dbconfig.php'); 
include('includes/security.php');


error_reporting(0);

session_start();

if (isset($_SESSION['name'])) {
    header("Location: adminlogin.php");
}

if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$position = $_POST['position'];
	$role = $_POST['role'];
	$name = $_POST['name'];
	$cnumber = $_POST['cnumber'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM admin WHERE email='$email'";
		$result = mysqli_query($connection, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO admin (id, position, role, name, cnumber, email, password)
					VALUES ('$id', '$position', '$role', '$name', '$cnumber', '$email', '$password')";
			$result = mysqli_query($connection, $sql);
			if ($result) {
				echo "<script>alert('Registration Completed.')</script>";
				$id = "";
				$position = "";
				$role = "";
				$name = "";
				$cnumber = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="admin.css">

	<title>Sign Up</title>
</head>
<body>
	 <!-- HEADER -->
  <div class="header">
    <nav class="navbar">
         <img class="logo" src="">
        </nav>
  <!-- END OF HEADER -->
  
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 1rem; font-weight: 800;">SIGN UP</p>
			<div class="input-group">
				<input type="text" placeholder="Employee ID" name="id" value="<?php echo $id; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Employee Position" name="position" value="<?php echo $position; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Role" name="role" value="<?php echo $role; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Name" name="name" value="<?php echo $name; ?>" required>
			</div>

			<div class="input-group">
				<input type="text" placeholder="Number" name="cnumber" value="<?php echo $cnumber; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Sign Up</button>
			</div>
			<p class="login-register-text">Have an account? <a href="adminlogin.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>