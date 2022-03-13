<?php 

include('database/dbconfig.php'); 
include('includes/header.php'); 

session_start();

error_reporting(0);

if (isset($_SESSION['name'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
	$result = mysqli_query($connection, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['name'] = $row['name'];
		header("Location: index.php");
	} else {
		echo "<script>alert('Email or Password is Wrong.')</script>";
	}
}

?>
<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
	<title>Sign Up</title>
</head>
<body>

 <form class="user" action="" method="POST">

                    <div class="form-group">
                   <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                    </div>
                    <div class="form-group">
                   <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                    </div>
            
                    <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Login </button>
                    <hr>
                </form>

	</div>
</body>
</html>

<?php
session_start();
include('includes/header.php'); 
?>


