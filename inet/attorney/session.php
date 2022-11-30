<?php
include('config.php');
session_start();
$user_check=$_SESSION['email'];
$ses_sql=mysqli_query($link,"select id, username, phone_no, email, role, employee_id, licence FROM lawyers WHERE email='$email'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$loggedin_session=$row['email'];
$loggedin_id=$row['id'];
if(!isset($loggedin_session) || $loggedin_session==NULL) {
 echo "Go back";
 header("Location: /opt/lampp/htdocs/kenya/inet/index.php");
}
?>
