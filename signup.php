<?php
require 'config.php';

if(!empty($_SESSION["id"])){
  header("Location: admin.php");
}
if(isset($_POST["submitlogin"])){
  $email = $_POST["emaillogin"];
  $password = $_POST["passwordlogin"];
  //$confirmation = $_POST["confirmation"];
  $result = mysqli_query($conn, "SELECT * FROM gerente WHERE email_ger = '$email'");
  $row = mysqli_fetch_assoc($result);

///////////////////////condition de confirmation et verifier le mot pass

  if(mysqli_num_rows($result) > 0){
    if($password == $row['pswd_ger']) {
      $_SESSION["login"] = true;
      $_SESSION["id_gerente"] = $row["id_gerente"];
      header("Location: admin.php");
    }
    // if($password == $confirmation){
    //     $_SESSION["login"] = true;
    //     $_SESSION["id"] = $row["id"];
    //     header("Location: signup.php");
    // }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="signup.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2ff52a64bf.js" crossorigin="anonymous"></script>
    <title>Signin and Signup</title>
</head>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#" method="Post">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" />
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<button type="submitsignup" name="submit">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#" method="Post">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type="email" placeholder="Email" name="emaillogin"/>
			<input type="password" placeholder="Password" name="passwordlogin"/>
			<a href="#">Forgot your password?</a>
			<button type="submitlogin" name="submitlogin">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
    <script src="main.js"></script>
</body>
</html>