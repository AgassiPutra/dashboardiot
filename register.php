<?php 
 
include 'koneksi/koneksi.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
 
        $sql = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO user (username, email, password)
                    VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                header("Location:login.php");
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
}
 
?><!doctype html>
<html lang="en">
  <head>
  	<title>Pet Feeder Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Sign In</h3>
						<form action="register.php" class="login-form" method="POST">
		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left" name ="username" placeholder="Username" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="text" class="form-control rounded-left" name="email" placeholder="Email" required>
	            </div>
                <div class="form-group d-flex">
	              <input type="password" class="form-control rounded-left" name="password" placeholder="Password" required>
	            </div>
	            <div class="form-group">
	            	<button type="submit" name="submit" class="form-control btn btn-primary rounded submit px-3">Register</button>
	            </div>
	            <div class="form-group d-md-flex">
                <div class="w-50">
								</div>
					<div class="w-50 text-md-right">
						<a href="login.php">Login</a>
					</div>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

