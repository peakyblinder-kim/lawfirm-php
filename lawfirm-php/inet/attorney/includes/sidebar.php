        <?php
        include 'config.php';
        session_start();
        if ($_SESSION['user']){
        $query = "SELECT name, phone, email, tcase, role, court, description FROM cases WHERE username ='".$_SESSION['user']."'";
        $result = $link->query($query);
        }else{
           $error="Wrong login Details";
           header("Location: ../kenya/login.php");
        }
        ?>
        session_start();
        $query = "SELECT *FROM lawyers WHERE username = '".$_SESSION['user']."'";
        ?>
        <!-- Main Sidebar Container -->
         <aside class="main-sidebar sidebar-light-primary elevation-1" >
                        <!-- Brand Logo -->
            <a href="index.php" class="brand-link animated swing">
            <img src="../asset/img/logo.png" alt="DSMS Logo" width="200" style="margin-top: -5px;margin-bottom: -60px;">
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
               <!-- Sidebar Menu -->
               <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                     <li class="nav-item">
                        <a href="index.php" class="nav-link">
                           <i class="nav-icon fa fa-tachometer-alt"></i>
                           <p>
                              Dashboard
                           </p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="services.php" class="nav-link">
                           <i class="nav-icon fa fa-hand-holding-heart"></i>
                           <p>
                           Services
                           </p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="appointment.php" class="nav-link">
                           <i class="nav-icon fa fa-calendar-alt"></i>
                           <p>
                           Appointment
                           </p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="feedback.php" class="nav-link">
                           <i class="nav-icon fa fa-comments"></i>
                           <p>
                           Feedback
                           </p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="profile.php?user='. $row['id'] .'" class="nav-link">
                           <i class="nav-icon fa fa-user"></i>
                           <p>
                           Profile
                           </p>
                        </a>
                     </li>
                  </ul>
               </nav>
               <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
         </aside>
