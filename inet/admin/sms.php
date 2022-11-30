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
                     <h1 class="m-0" style="color: rgb(31,108,163);"><span class="fa fa-envelope"></span><span class="fa fa-comments"></span> Email and SMS Settings</h1>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
               <div class="card card-success">
                  <!-- /.card-header -->
                  <div class="card-header">
                     <h3 class="card-title">SMS Option</h3>
                  </div>
                  <!-- form start -->
                  <form>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="card card-warning">
                                 <div class="card-header">
                                    <p><span class="fa fa-info"></span> To enable SMS Support please insert API code and API Password. <a href="" style="color:#fff">Click here to add.</a> If you don't have one, please obtain trial Api code or Buy ApiCode Package and get your personal api code and api password <a style="color:#fff" href="">here</a>.</p>
                                 </div>
                              </div>
                           </div>
                        </div>

                     </div>
                  </form>
               </div>
            </div>
            <!-- /.container-fluid -->
         </section>
         <section class="content">
            <div class="container-fluid">
               <div class="card card-info">
                  <!-- /.card-header -->
                  <div class="card-header">
                     <h3 class="card-title">Email Option</h3>
                  </div>
                  <!-- form start -->
                  <form>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="card card-warning">
                                 <div class="card-header">
                                    <p><span class="fa fa-info"></span> This Email Support is powered by PHP Mailer. In order to send email using gmail account, please enable POP and IMAP <a style="color:#fff" href="">here</a>, and turn ON the Less Secuer apps <a style="color:#fff" href="">here</a>. For more documentation of PHPMailer please visit <a style="color:#fff" href="">github.com/PHPMailer</a>. </p>
                                 </div>
                              </div>
                              <table id="example1" class="table table-hover">
                     <thead>
                        <tr>
                           <th></th>
                           <th>Username</th>
                           <th>Password</th>
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>
                              <a class="btn btn-sm btn-success" href="#"><i class="fa fa-edit"></i></a></td>
                           <td>admin@gmail.com</td>
                           <td>admin_12345</td>
                           <td>Enabled</td>
                        </tr>
                        </tbody>
                  </table>
                           </div>
                        </div>

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