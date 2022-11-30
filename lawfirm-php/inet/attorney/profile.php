<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $phone_no = $email = $role = $password = $cpassword = $employee_id = $licence ="";
$username_err = $phone_no_err = $email_err = $role = $password_err = $cpassword_err = $employee_id_err = $licence_err ="";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    // Validate name
    $input_username = trim($_POST["username"]);
     if(empty($input_username)){
         $username_err = "Please enter a username.";
     } else{
         $username = $input_username;
     }

     $input_phone_no = trim($_POST["phone_no"]);
     if(empty($input_phone_no)){
         $phone_no_err = "Please enter your licence.";
     } else{
         $phone_no = $input_phone_no;
     }

    // Validate address address
    $input_email = trim($_POST["email"]);
     if(empty($input_email)){
         $email_err = "Please enter an email.";
     } else{
         $email = $input_email;
     }

     $input_role = trim($_POST["role"]);
     if(empty($input_role)){
         $role_err = "Please enter an email.";
     } else{
         $role= $input_role;
     }
    // Validate salary
    $input_password = trim($_POST["password"]);
   if(empty($input_password)){
       $password_err = "Please enter your Staff id.";
   } else{
       $password = $input_password;
   }

   $input_cpassword = trim($_POST["cpassword"]);
   if(empty($input_cpassword)){
       $cpassword_err = "Please confirm password";
   } else {
       $cpassword= $input_cpassword;
   }
   $input_employee_id = trim($_POST["employee_id"]);
   if(empty($input_employee_id)){
       $employee_id_err = "Please enter your licence.";
   } else{
       $employee_id = $input_employee_id;
   }

   $input_licence = trim($_POST["licence"]);
   if(empty($input_licence)){
       $licence_err = "Please enter your licence.";
   } else{
       $licence = $input_licence;
   }


    // Check input errors before inserting in database
    if(empty($username_err) && empty($phone_no_err) && empty($email_err) && empty($password_err) && empty($cpassword_err)&& empty($employee_id_err) && empty($licence_err)){
        // Prepare an update statement

        $sql = "UPDATE lawyers SET username=?, phone_no=?, email=?, role=?, password=?, employee_id=?, licence=? WHERE id=?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssi", $param_username, $param_phone_no, $param_email, $param_role, $param_password, $param_employee_id, $param_licence, $param_id);

            // Set parameters
            $param_username = $username;
            $param_phone_no = $phone_no;
            $param_email = $email;
            $param_role=$role;
            $param_password = md5($password);
            $param_employee_id = $employee_id;
            $param_licence = $licence;
            $param_id = $id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM lawyers WHERE id = ?";
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
