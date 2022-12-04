<?php
// Include config files
session_start();
require_once "config.php";

// Define variables and initialize with empty values
$username = $phone_no = $email = $role = $password = $cpassword = $employee_id = $licence ="";
$username_err = $phone_no_err = $email_err = $role = $password_err = $cpassword_err = $employee_id_err = $licence_err ="";

    // Check existence of id parameter before processing further
    // if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    //     // Get URL parameter
    //     $id =  trim($_GET["id"]);
    if (isset($_SESSION['user_role'])) {

        // Prepare a select statement
        $sql = "SELECT * FROM login WHERE  email='" . $_SESSION['user_role'] . "'";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $username = $row["username"];
                    $phone_no = $row["phone_no"];
                    $email = $row["email"];
                    $role = $row["role"];
                    $password = $row["password"];
                    $employee_id = $row["employee_id"];
                    $licence = $row["licence"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">

<?php include 'includes/header.php'?>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">

        <?php include 'includes/topbar.php'?>
        <?php include 'includes/sidebar.php'?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6 animated bounceInRight">
                     <h1 class="m-0" style="color: rgb(31,108,163);"><span class="fa fa-user-tie"></span> Add Attorney</h1>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Add Attorney</li>
                     </ol>
                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
         </div>
         <!-- /.content-header -->
         <!-- Main content -->
         <section class="content">
            <div class="container-fluid">
               <div class="card card-info">
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="row">
                                 <div class="col-md-12">

                                    <div class="form-group">
                                       <label><span class="fa fa-user-tie"></span> Attorney Information</label>
                                    </div>
                                 </div>

                                 <div class="col-md-4">
                                 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <div class="form-group">
                                       <label>Full Name</label>
                                       <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>"placeholder="Full Name">
                                       <span class="invalid-feedback"><?php echo $username_err;?></span>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Contact</label>
                                       <input type="text" name="phone_no"class="form-control <?php echo (!empty($phone_no_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone_no; ?>" placeholder="ex. 09876534764">
                                       <span class="invalid-feedback"><?php echo $phone_no_err;?></span>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Email</label>

                                       <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" placeholder="ex. email@gmail.com">
                                       <span class="invalid-feedback"><?php echo $email_err;?></span>
                                    </div>
                                 </div>
                                 <div class="col-md-8">
                                    <div class="form-group">
                                       <label>Role</label>
                                        <select name="role" class="form-control <?php echo (!empty($role_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $role; ?>" placeholder="Role">
                                        <option value="user">user</option>
                                       <option value="admin">admin</option>
                                       </select>
                                       <span class="invalid-feedback"><?php echo $role_err;?></span>
                                    </div>
                                 </div>
                                 <!-- <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Profile</label>
                                       <input type="file" name="profile" class="form-control <?php echo (!empty($profile_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $profile; ?>" placeholder="Profile">
                                       <span class="invalid-feedback"><?php echo $profile_err;?></span>
                                    </div>
                                 </div> -->
                                 <div class="col-md-4">
                              <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php  '********'; ?>" placeholder="Password">
                            <span class="invalid-feedback"><?php echo $password_err;?></span>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="cpassword" class="form-control <?php echo (!empty($cpassword_err)) ? 'is-invalid' : ''; ?>" value="<?php '********'; ?>" placeholder="Confirm Password">
                            <span class="invalid-feedback"><?php echo $cpassword_err;?></span>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label>Staff ID</label>
                            <input type="text" name="employee_id" class="form-control <?php echo (!empty($employee_id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $employee_id; ?>" placeholder="Staff ID">
                            <span class="invalid-feedback"><?php echo $employee_id_err;?></span>
                        </div>
</div>
<div class="col-md-4">
                        <div class="form-group">
                            <label>LSK licence</label>
                            <input type="text" name="licence" class="form-control <?php echo (!empty($licence_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $licence; ?>" placeholder="LSK licence">
                            <span class="invalid-feedback"><?php echo $licence_err;?></span>
                        </div>
</div>
                                 </div>
                              </div>
                           </div>
                        </div>

                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                     <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                     </div>
                  </form>
               </div>
            </div>
            <!-- /.container-fluid -->
         </section>
         <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
   </div>
   <!-- ./wrapper -->
   <!-- jQuery -->
   <script src="../asset/jquery/jquery.min.js"></script>
   <script src="../asset/js/adminlte.js"></script>

</body>

</html>
