<?php 
session_start();
if (isset($_SESSION['ID']) && isset($_SESSION['cname'])) {

$myid = $_SESSION['ID'];




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RES-QUEUE</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

  <link rel="apple-touch-icon" href="https://i.pinimg.com/originals/f4/c6/50/f4c650cc8ddd13a933483e3c06bf8be2.jpg">
  <link rel="shortcut icon" href="https://i.pinimg.com/originals/f4/c6/50/f4c650cc8ddd13a933483e3c06bf8be2.jpg">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
     <h4 class="font-weight-bold"><?php echo $_SESSION['cname']; ?></h4> 

      <!-- Messages Dropdown Menu -->
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="admin.php" class="brand-link">
      <img src="dist/img/RQ.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">RES-QUEUE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <?php
        $sname = "localhost";
                                                $uname = "root";
                                                $password = "";
                                                $db_name = "rq";

                                                $conn = mysqli_connect($sname, $uname, $password, $db_name);
           $table = mysqli_query($conn,"SELECT * FROM tbl_register WHERE  id = '".$myid."' ");

               if(mysqli_num_rows($table) > 0)
               { 
                            
                   while ($row = mysqli_fetch_assoc($table)) 
                          {  
                                    
                                  ?>  
        <div class="image">
          <img class="img-circle elevation-2" alt="User Image" src="<?php echo 'img/' . $row['dprofile_image'] ?>" style="height: 9vh; width: 50px;">
        </div>
          
        <div class="info">
          <a href="#" class="d-block text-center mt-3 font-weight-bold"><?php echo $row['abv']; ?></a>
        </div>
      </div>

      
<?php
                                   }
                                
                                  }

                                ?> 
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="admin.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-header">Account Manager</li>

          <li class="nav-item ">
            <a href="company-myacc.php" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                My Account
              </p>
            </a>
          </li>


          <li class="nav-header">Queue</li>

          <li class="nav-item">
            <a href="company-controlscr.php" class="nav-link">
             <i class="fas fa-desktop"></i>
              <p>
                Control Screen
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="company-externalscreen.php" class="nav-link">
              <i class="fas fa-tv"></i>
              <p>
               External Screen
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="logout.php" class="nav-link text-danger">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p class="text-white">
                Sign out
              </p>
            </a>
          </li>
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Control Screen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Control Screen</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php if (isset($_GET['success'])) { ?>
                    <div class="myDiv">
                        <div class="row">
                            <div class="col mt-5">
                                <div class="card bg-success">
                                    <h4 class="text-center text-light"><?php echo $_GET['success']; ?></h4>
                                </div> 
                            </div>
                        </div>
                    </div> 
    <?php } ?>
        
        <div class="container">
          <div class="row">
            <div class="col bg-info">
              <h1 class="text-center">Main Screening</h1>  
            </div>
          </div>
          <div class="row">
            <div class="col bg-dark">
              <div class="container-fluid">
                <div class="row">
                  <div class="col">
                    <p class="text-center">Now Serving:</p>  
                  </div>
                </div> 
                <div class="row">
                  <div class="col">
                    <?php
        $sname = "localhost";
                                                $uname = "root";
                                                $password = "";
                                                $db_name = "rq";

                                                $conn = mysqli_connect($sname, $uname, $password, $db_name);
           $table = mysqli_query($conn,"SELECT current FROM realtimectr WHERE  id = 1 ");

           $currno = "";
               if(mysqli_num_rows($table) > 0)
               { 
                $currno = "";
                            
                   while ($row = mysqli_fetch_assoc($table)) 
                          {  
                            
                                    
                                  ?> 
                    <h1 class="display-1 text-center font-weight-bold"><?php echo $row['current']; ?></h1>

                    <?php
                                  
                                ?> 
                  </div>
                </div>   
              </div>
            </div>
            <div class="col bg-secondary">
              <div class="container-fluid">
                <div class="row">
                  <div class="col">
                    <p class="text-center">Total No:</p>  
                  </div>
                </div> 
                <div class="row">
                  <div class="col">
                    <h1 class="display-1 text-center font-weight-bold">300</h1>
                  </div>
                </div>     
              </div>  
            </div>
          </div>
        </div>


        <div class="container">
          <div class="row">
            <div class="col text-center mt-5 bg-dark">
              <h4 class="font-weight-bold bg-info">Information</h4> 

              <?php
        $sname = "localhost";
                                                $uname = "root";
                                                $password = "";
                                                $db_name = "rq";

                                                $conn = mysqli_connect($sname, $uname, $password, $db_name);

                                                $curno = $row['current'];
           $table = mysqli_query($conn,"SELECT * FROM schoolform WHERE  id = '".$curno."' ");

               if(mysqli_num_rows($table) > 0)
               { 
                            
                   while ($row = mysqli_fetch_assoc($table)) 
                          {  
                                    
                                  ?> 

              <p class="mt-4">Full name: <?php echo $row['firstname'], " " ,$row['midname'], " " , $row['lastname']; ?> </p>
              <p class="">Transaction: <?php echo $row['transaction']; ?></p>


              <?php
                                   }
                                  }

                                   }
                                  }
                                ?> 
            </div>
          </div>
          


        </div>
          <div class="container">
            <div class="row">
              <div class="col text-center mt-5 bg-info form-group p-2">
                <form method="POST" action="code.php">
                  <button class="btn btn-dark form-control" name="prevs" type="submit"><i class="fas fa-arrow-left"></i> Previous</button>  
                </form>    
              </div>
              <div class="col text-center mt-5 bg-info form-group p-2">
                <form method="POST" action="code.php">
                  <button class="btn btn-danger form-control" name="resets" type="submit">Reset</button>  
                </form>
              </div>
              <div class="col text-center mt-5 bg-info form-group p-2">
                <form  method="POST" action="code.php">
                  <button class="btn btn-dark form-control" type="submit" name="nexts">Next <i class="fas fa-arrow-right"></i></button>  
                </form>
              </div>
            </div>  
          </div> 
          
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0-rc
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<script>
             $( ".myDiv" ).show( "slow").delay(3500).fadeOut('slow', function() {
          $(this).remove();
     }); 
    </script>
</body>
</html>
<?php 
}else{
  header("Location:index.php");
  exit();
}
 ?>