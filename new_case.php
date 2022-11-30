<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$name = $phone = $email = $tcase  =$role = $court = $location = $description ="";
$name_err = $phone_err = $email_err = $tcase_err  =$role_err = $court_err = $location_err = $description_err ="";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } else{
        $name = $input_name;
    }
//validate phone no
    $input_phone = trim($_POST["phone"]);
    if(empty($input_phone)) {
        $phone_err = "Please enter a valid phone number.";
    }else{
        $phone = $input_phone;
    }

    // Validate email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter your email.";
    } else{
        $email = $input_email;
    }

    // type of case
    $input_tcase = trim($_POST["tcase"]);
    if(empty($input_tcase)){
        $tcase_err = "Please define the type of case.";
    } else{
        $tcase = $input_tcase;
    }
    //role
    $input_role = trim($_POST["role"]);
    if(empty($input_role)){
        $role_err = "Please define your role in this case.";
    } else{
        $role = $input_role;
    }


    // Validate email
    $input_court = trim($_POST["court"]);
    if(empty($input_court)){
    $court_err = "Please state the court where the proceedings will be held.";
    } else{
    $court = $input_court;
    }

    //location
    $input_location = trim($_POST["location"]);
    if(empty($input_location)){
        $location_err = "Please enter location";
    } else{
        $location= $input_location;
    }


//case description
    $input_description = trim($_POST["description"]);
    if(empty($input_description)){
        $description_err = "Please describe the case";
    } else {
        $description= $input_description;
    }

    // $number    = preg_match('@[0-9]@', $input_phone);
    // if(!$number){
    // $phone_err="Invalid phone number provided";
    // }

//     function validating($input_phone){
//         if((preg_match('/^[0-9]{10}+$/', $input_phone)) ==false) {
//     // function validating($input_phone){
//     //     $valid_number = filter_var($input_phone, FILTER_SANITIZE_NUMBER_INT);

//     // }
//     // if($valid_number == false){
//         $phone_error = "Invalid phone number provided";
//     }
// }
// if(preg_match('/^[0-9]{10}+$/', $input_phone)== false){
//     $phone_err = "Please enter a valid phone number.";
// }

function validating($input_phone){
    $valid_number = filter_var($input_phone, FILTER_SANITIZE_NUMBER_INT);
    if ($valid_number == false){
$phone_err="Please enter a valid phone number.";
    }
}
//check error messages
if(empty($name_err) && empty($phone_err) && empty($email_err) && empty($tcase_err) && empty($role_err) && empty($court_err) && empty($location_err) && empty($description_err)){

            // Prepare an insert statement

            $sql = "INSERT INTO cases (name ,phone , email , tcase, role, court, location, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss", $param_name, $param_phone, $param_email, $param_tcase, $param_role, $param_court, $param_location, $param_description);

            // Set parameters
            $param_name = $name;
            $param_phone = $phone;
            $param_email = $email;
            $param_tcase = $tcase;
            $param_role = $role;
            $param_court = $court;
            $param_location = $location;
            $param_description = $description;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: ongoing_case.php");
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Initiate Case</h2>
                    <p>Please fill this form initiate your case</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>"placeholder="Name">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="tel" name="phone"  class="form-control <?php echo(!empty($phone_err)) ? 'is invalid' : ''; ?>" value="<?php echo $phone; ?>" placeholder="Phone Number">
                            <!--   -->
                            <span class="invalid-feedback"><?php echo $phone_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email"  name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" placeholder="Email">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Type of case</label>
                            <input type="text" name="tcase" class="form-control <?php echo (!empty($tcase_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $tcase; ?>" placeholder="Type of case">
                            <span class="invalid-feedback"><?php echo $tcase_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <input type="text" name="role" class="form-control <?php echo (!empty($role_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $role; ?>" placeholder="Describe your position in this case">
                            <span class="invalid-feedback"><?php echo $role_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Court Name</label>
                            <input type="text" name="court" class="form-control <?php echo (!empty($court_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $court; ?>" placeholder="Court Name">
                            <span class="invalid-feedback"><?php echo $court_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Location of the Court</label>
                            <input type="text" name="location" class="form-control <?php echo (!empty($location_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $location; ?>" placeholder="Location of court">
                            <span class="invalid-feedback"><?php echo $location_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Brief description of the Case</label>
                            <input type="text" name="description" class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $description; ?>" placeholder="Description">
                            <span class="invalid-feedback"><?php echo $description_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
