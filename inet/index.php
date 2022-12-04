<?php
// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'law');

$username = $password = $role = "";
// Check if the user has submitted the login form
if (isset($_POST['login'])) {
  // Get the login information from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // Query the database to find the user with the provided username and password
  $query = "SELECT * FROM login WHERE username='$username' AND password='$password'";
  $result = mysqli_query($db, $query);

  // If a user was found, set the session variables and redirect the user
  if (mysqli_num_rows($result) === 1) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION['logged_in'] = true;
   //  $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_role'] = $user['email'];

    // Redirect the user to the appropriate page based on their role
    if ($_SESSION['user_role'] === 'admin') {
      // Redirect the user to the admin dashboard
      header('Location: ./admin/index.php');
      exit;
    } else if ($_SESSION['user_role'] === 'user') {
      // Redirect the user to the customer dashboard
      header('Location: ./attorney/index.php');
      exit;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Law-Office-Management-Information-System</title>
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="asset/css/adminlte.min.css">
   </head>
   <body class="hold-transition login-page">
      <div class="login-box">
         <!-- /.login-logo -->
         <div class="card card-outline card-info">
            <div class="card-header text-center">
               <a href="index.html" class="brand-link">
               <img src="asset/img/logo.png" alt="DSMS Logo" width="200">
               </a>
            </div>
            <div class="card-body" >
               <form action="" class="login" method="POST">
                  <div class="input-group mb-3">
                  <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" placeholder="Username">
                    <span class="invalid-feedback"><?php echo $username_err;?></span>
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-user"></span>
                        </div>
                     </div>
                  </div>
                  <div class="input-group mb-3">

                     <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" placeholder="Password">
                            <span class="invalid-feedback"><?php echo $password_err;?></span>
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-lock"></span>
                        </div>
                     </div>
                  </div>
                  <div class="row">



                     <!--  -->
                  </div>
                  <!-- <div class="col-6">
                        <input name="login" type="submit" class="btn btn-block btn-success" style="color: aliceblue;" value="LOGIN"> -->
                        <!-- <input style="float:right" type="submit" value="LOGIN"> -->
                     <div class="col-6">
                        <input name="login" type="submit" class="btn btn-block btn-warning" style="color: aliceblue;" value="LOGIN">
                     </div>
               </form>
            </div>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->
      </div>
      <!-- /.login-box -->
   </body>
</html>
