
<?php session_start();
//include config file
require_once "config.php";

//define parameters
$fname = $lname = $email = $phone =  $password = $cpassword= "";
$fname_err = $lname_err = $email_err = $phone_err =  $password_err = $cpassword_err = "";

//form data processing
if($_SERVER["REQUEST_METHOD"] == "POST"){
//first name
$input_fname=trim($_POST["fname"]);
if (empty($input_fname)){
  $fname_err = "Please enter your first name";
}else{
  $fname = $input_fname;
}
//last name
$input_lname=trim($_POST["lname"]);
if (empty($input_lname)){
  $lname_err = "Please enter your second name";
}else{
  $lname = $input_lname;
}
//email
$input_email=trim($_POST["email"]);
if (empty($input_email)){
  $email_err = "Please enter your first name";
}else{
  $email = $input_email;
}
//phone number
$input_phone=trim($_POST["phone"]);
if (empty($input_phone)){
  $phone_err = "Please enter your phone number";
}else{
  $phone = $input_phone;
}
//password
$input_password=trim($_POST["password"]);
if (empty($input_password)){
  $password_err = "Please enter your Password";
}else{
  $password = $input_password;
}
//confirm password
$input_cpassword=trim($_POST["cpassword"]);
if (empty($input_cpassword)){
  $cpassword_err = "Please Confirm Password";
}else{
  $cpassword = $input_cpassword;
}

//password = cpassword
if ($input_password !== $input_cpassword){
  $cpassword_err = "Passwords do not match.";
}

$uppercase = preg_match('@[A-Z]@', $input_password);
$lowercase = preg_match('@[a-z]@', $input_password);
$number    = preg_match('@[0-9]@', $input_password);
$specialChars = preg_match('@[^\w]@', $input_password);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($input_password) < 8) {
$password_err="Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
}



//' and phone_no = '".$_POST['phone_no']."'
// elseif (mysqli_num_rows($select($phone_no=$input_phone_no))) {
//   $phone_no_err="This email address is already used!";
// }

if(empty($fname_err) && empty($lname_err) && empty($email_err) && empty($phone_err) && empty($password_err) && empty($cpassowrd_err)){
// Prepare an insert statement

$sql = "INSERT INTO users (fname, lname, email, phone, password) VALUES (?, ?, ?, ?, ?)";

if($stmt = mysqli_prepare($link, $sql)){
  // Bind variables to the prepared statement as parameters
  mysqli_stmt_bind_param($stmt, "sssss", $param_fname, $param_lname, $param_email, $param_phone, $param_password);

  // Set parameters
  $param_fname = $fname;
  $param_lname = $lname;
  $param_email = $email;
  $param_phone =$phone;
  $param_password = md5($password);
// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
  // Records created successfully. Redirect to landing page
  header("location: login.php");
  exit();
} else{
  echo "Oops! Something went wrong. Please try again later.";
  }
}

// Close statement
mysqli_stmt_close($stmt);
}

// Close connection
mysqli_close($link);
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title>signin</title>
<link rel="stylesheet" href="style1.css">

</head>
<body>
  <form action="" method="POST" id="login-form" class="login-form" autocomplete="off" role="main">
  <h1 class="a11y-hidden">Login Form</h1>
  <div>
    <label class="label-fname">
      <input type="text" class="text" name="fname" placeholder="First Name" tabindex="1" required />
      <span class="required">First Name</span>
    </label>
  </div>
  <div>
    <label class="label-lname">
      <input type="text" class="text" name="lname" placeholder="Second Name" tabindex="1" required />
      <span class="required">Second Name</span>
    </label>
  </div>
  <div>
    <label class="label-email">
      <input type="email" class="text" name="email" placeholder="Email" tabindex="1" required />
      <span class="required">Email</span>
    </label>
  </div>
  <div>
    <label class="label-phone">
      <input type="text" class="text" name="phone" placeholder="Phone Number" tabindex="1" required />
      <span class="required">Phone Number</span>
    </label>
  </div>
  <input type="checkbox" name="show-password" class="show-password a11y-hidden" id="show-password" tabindex="3" />
  <label class="label-show-password" for="show-password">
    <span>Show Password</span>
  </label>
  <div>
  <label class="label-password">
      <input type="password" class="text" name="password" placeholder="Password" tabindex="2" required />
      <span class="required">Password</span>
    </label>
  </div>
  <div>
    <label class="label-cpassword">
      <input type="password" class="text" name="cpassword" placeholder="Confirm Password" tabindex="2" required />
      <span class="required">Confirm Password</span>
    </label>
  </div>
  <input type="submit" value="Sign Up" />
  <div class="login"><p>Have an account?
    <a href="login.php">Login here</a></p>
  </div>
  <figure aria-hidden="true">
    <div class="person-body"></div>
    <div class="neck skin"></div>
    <div class="head skin">
      <div class="eyes"></div>
      <div class="mouth"></div>
    </div>
    <div class="hair"></div>
    <div class="ears"></div>
    <div class="shirt-1"></div>
    <div class="shirt-2"></div>
  </figure>
</form>
</body>
</html>
