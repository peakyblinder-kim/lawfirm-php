<?php

   include("config.php");
session_start();
$email = $password ="";
$email_err = $password_err ="";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form


//email
$input_email=trim($_POST["email"]);
if (empty($input_email)){
  $email_err = "Please enter your email";
}

//password
$input_password=trim($_POST["password"]);
if (empty($input_password)){
  $password_err = "Please enter your Password";
}

if(empty($email) && empty($password)){
      $email = mysqli_real_escape_string($link,$_POST['email']);
      $password = mysqli_real_escape_string($link,md5($_POST['password']));

      $sql = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
      $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         header("location: /inet/attorney/customer_home.php");
      }else {
         echo "Your Login Name or Password is invalid";
      }
   }
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>User - Login</title>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form action="" class="login" method="POST">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
                    <input type="email" name="email" class="login__input <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>"placeholder="Email">
                    <span class="invalid-feedback"><?php echo $email_err;?></span>
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
                    <input type="password" name="password" class="login__input <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" placeholder="Password">
                            <span class="invalid-feedback"><?php echo $password_err;?></span>
				</div>
				<button class="button login__submit">
					<span class="button__text">Log In Now</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>
                <div class="register">
                    <p>No account?
    <a href="signup.php">Register Here</a>
</p>
  </div>
			</form>
			<div class="social-login">
				<h3>log in via</h3>
				<div class="social-icons">
					<a href="#" class="social-login__icon fab fa-instagram"></a>
					<a href="#" class="social-login__icon fab fa-facebook"></a>
					<a href="#" class="social-login__icon fab fa-twitter"></a>
				</div>
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>
	</div>
</div>
<!-- partial -->

</body>
</html>
