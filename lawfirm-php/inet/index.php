<?php

include ("db.php");


$username = $password = $role ="";
$username_err = $password_err = $role ="";

if($_SERVER["REQUEST_METHOD"] == "POST") {

$input_username=trim($_POST["username"]);
if (empty($input_username)){
  $username_err = "Please enter your username";
}

$input_password=trim($_POST["password"]);
if (empty($input_password)){
  $password_err = "Please enter your Password";
}

if(empty($username_err) && empty($password_err)){
   $username = mysqli_real_escape_string($link,$_POST['username']);
   $password = mysqli_real_escape_string($link,($_POST['password']));

   $sql = "SELECT * FROM login WHERE username = '$username' and password = '$password' and role='admin'";
   $result = mysqli_query($link,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

   $count = mysqli_num_rows($result);

       if($count == 1){
   header("location: ./admin/index.php");
   exit();
    }else if($count !== 1){

      $sql = "SELECT * FROM login WHERE username = '$username' and password = '$password' and role='user'";
      $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);
          if($count == 1){
               $_SESSION['user'] = $row['username'];
   header("location: ./attorney/index.php");
   exit();
}else{
   echo"wrong credentials. Please try again.";
}
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
