<?php
include 'config.php';
$query = "SELECT id, name, phone, email, tcase, role, court, description,status FROM cases";
$result = $link->query($query);
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
                  <div class="col-sm-6">
                        <h1 class="m-0" style="color: rgb(31,108,163);"><span class="fa fa-calendar-alt"></span> Appointments</h1>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Office</li>
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

               <div class="col-md-12 table-responsive"><br>
               <?php
                    // Include config file
                    require_once "config.php";

                    // Attempt select query execution
                    $sql = "SELECT * FROM cases";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table id="example1" class="table table-bordered table-hover">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>SN</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Phone No.</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Type of Case</th>";
                                        echo "<th>Role</th>";
                                        echo "<th>Role</th>";
                                        echo "<th>Court</th>";
                                        echo "<th>Description</th>";
                                        echo "<th>Status</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                if ($result->num_rows > 0) {
                                 $sn=1;
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                       echo "<td>" . $sn . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['phone'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['tcase'] . "</td>";
                                        echo "<td>" . $row['role'] . "</td>";
                                        echo "<td>" . $row['court'] . "</td>";
                                        echo "<td>" . $row['description'] . "</td>";
                                        echo "<td>" . $row['status'] . "</td>";
                                        echo "<td>";

                                            echo '<select>
                                            <option><a class="btn btn-sm btn-success" href="status.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><i class="fa fa-edit"></i>In progress</a></option>;
                                            <option><a class="btn btn-sm btn-success" href="status.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><i class="fa fa-edit"></i>New</a></option>;
                                            <option><a class="btn btn-sm btn-success" href="status.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><i class="fa fa-edit"></i>Concluded</a></option>;
                                            <option><a class="btn btn-sm btn-success" href="status.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><i class="fa fa-edit"></i>Dropped</a></option>';
                                          //   echo '<a class="btn btn-sm btn-success" href="update.php"><i class="fa fa-edit"></i> edit</a>';
                                          //   echo '<a class="btn btn-sm btn-danger" data-toggle="modal" href="delete.php?id='. $row['id'] .'" data-target="#delete"  class="fa fa-trash-alt"></i> delete</a>';
                                          // //   <i  ;
                                          echo '<a class="btn btn-sm btn-danger" href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></i> delete</a></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                      $sn++;
                                }
                                echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close connection
                    mysqli_close($link);
                  }
                    ?>
               </div>
            </div>
      </div>

   <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
   </div>
   <!-- ./wrapper -->
   <div id="delete" class="modal animated rubberBand delete-modal" role="dialog">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-body text-center">
               <img src="../asset/img/sent.png" alt="" width="50" height="46">
               <h3>Are you sure want to delete this User?</h3>
               <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                  <button type="submit" class="btn btn-danger">Delete</button>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- jQuery -->
   <script src="../asset/jquery/jquery.min.js"></script>
   <script src="../asset/js/bootstrap.bundle.min.js"></script>
   <script src="../asset/js/adminlte.js"></script>
   <!-- DataTables  & Plugins -->
   <script src="../asset/tables/datatables/jquery.dataTables.min.js"></script>
   <script src="../asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
   <script src="../asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>s
   <script src="../asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
   <script>
      $(function () {
         $("#example1").DataTable();
      });
   </script>
</body>

</html>
