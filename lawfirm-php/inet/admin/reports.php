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
                        <h1 class="m-0" style="color: rgb(31,108,163);"><span class="fa fa-chart-bar"></span> Reports</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                           <li class="breadcrumb-item active">Reports</li>
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
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered mytable">
                              <thead>
                                 <tr>
                                     <th>Month</th>
                                     <th>Number of Appointment</th>
                                 </tr>
                             </thead>
                                    <tbody>
                                       <tr>
                                           <td>January</td>
                                           <td>22</td>
                                       </tr>
                                       <tr>
                                           <td>February</td>
                                           <td>5</td>
                                       </tr>
                                       <tr>
                                           <td>March</td>
                                           <td>10</td>
                                       </tr>
                                       <tr>
                                           <td>April</td>
                                           <td>15</td>
                                       </tr>
                                       <tr>
                                           <td>May</td>
                                           <td>10</td>
                                       </tr>
                                       <tr>
                                           <td>June</td>
                                           <td>8</td>
                                       </tr>
                                       <tr>
                                           <td>July</td>
                                           <td>9</td>
                                       </tr>
                                       <tr>
                                           <td>August</td>
                                           <td>5</td>
                                       </tr>
                                       <tr>
                                           <td>September</td>
                                           <td>7</td>
                                       </tr>
                                       <tr>
                                           <td>October</td>
                                           <td>9</td>
                                       </tr>
                                       <tr>
                                           <td>November</td>
                                           <td>9</td>
                                       </tr>
                                       <tr>
                                           <td>December</td>
                                           <td>9</td>
                                       </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 col-lg-8 col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="bargraph"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                  </div>
                  <!-- /.row -->
                  <!-- /.row (main row) -->
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
    <script src="../asset/js/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            // Bar Chart

            var barChartData = {
                labels: ["January","February","March","April","May","June","July","August","September","October","November","December"],
                datasets: [{
                    label: 'Evacuees',
                    backgroundColor: 'rgb(79,129,189)',
                    borderColor: 'rgba(0, 158, 251, 1)',
                    borderWidth: 1,
                    data: [22,5,10,15,10,8,9,5,7,9,23,12]
                }]
            };

            var ctx = document.getElementById('bargraph').getContext('2d');
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        display: false,
                    }
                }
            });

        });
    </script>
   </body>
</html>
