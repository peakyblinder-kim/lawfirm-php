<?php
include('config.php');
session_start();
$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($link,"select email,id from users where email='$email'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$loggedin_session=$row['email'];
$loggedin_id=$row['id'];
if(!isset($loggedin_session) || $loggedin_session==NULL) {
 echo "Go back";
 header("Location: ./inet/attorney/customer_home.php");
}
?>
