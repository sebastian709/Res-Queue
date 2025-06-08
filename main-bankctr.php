<?php  
session_start();
if (isset($_SESSION['stypecom'])) {

$selecttype = $_SESSION['stypecom'];

$comid = $_SESSION['tid'];
$lname = $_SESSION['lname'];
$fname = $_SESSION['fname'];
$gan = $_SESSION['getanoid'];

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

   <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
</head>
<body class="">
<div class="">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/RQ.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-ms-2 bg-dark pl-5">
        <img src="dist/img/RQ.png" alt="AdminLTE Logo" class="bg-dark text-center brand-image img-circle elevation-3" style="opacity: .8; width:100px;">  
      </div>
      <div class="col bg-dark">
        <h1 class="py-4 ml-1">RES-QUEUE</h1>
      </div>
      <div class="col-sm-2 bg-dark ">
        <p class="text-center pt-3">Your No:</p>
        <h4 class="text-center text-warning font-weight-bold"><?php echo $comid; ?></h4>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 bg-secondary">
        <?php
        $sname = "localhost";
        $uname = "root";
        $password = "";
        $db_name = "rq";
        $conn = mysqli_connect($sname, $uname, $password, $db_name);
        
           $table = mysqli_query($conn,"SELECT * FROM schoolform WHERE  transid = '".$comid."' ");

               if(mysqli_num_rows($table) > 0)
               { 
                            
                   while ($row = mysqli_fetch_assoc($table)) 
                          {  
                                    
                                  ?>  
        <h4 class="bg-dark mt-1 text-center"><?php echo $row['firstname'] ," ", $row['lastname']; ?></h4>

        <?php
                                   }
                                
                                  }

                                ?> 
      </div>
      <div class="col bg-secondary">

      </div>

      <div class="col-sm-2 bg-secondary">
        <h4 class="bg-dark mt-1 text-center"><?php echo $selecttype; ?> Counter</h4>
      </div>
      <div class="col-sm-2 bg-dark">
        <h4 class="bg-danger mt-1 text-center font-weight-bold pointer-hand"><a href="logout.php">Cancel</a></h4>
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
           $table = mysqli_query($conn,"SELECT * FROM tbl_register WHERE  id = '".$gan."' ");

               if(mysqli_num_rows($table) > 0)
               { 
                            
                   while ($row = mysqli_fetch_assoc($table)) 
                          {  
                                    
                                  ?>  
        <div class="image text-center mt-5" >
          <img class="img-circle elevation-2" alt="User Image" src="<?php echo 'img/' . $row['dprofile_image'] ?>" style="height: 13vh; width: 150px;">
        </div>

      
  
      </div>
    </div>
    <div class="row">
      <div class="col text-center mt-3">
        <h4><?php echo $row['companyname']; ?></h4>
      </div>
    </div>
  </div>
  <?php
                                   }
                                
                                  }

                                ?> 

    
        <div class="container">
          <div class="row">
            <div class="col text-center mt-2 bg-info">
              <h1>Customer Counter Screen</h1>
            </div>
          </div>
          <div class="row">
            <div class="col bg-dark">
              <div class="container-fluid">
                <div class="row">
                  <div class="col mt-5 text-center">
                    <p class="">My Queue No:</p>  
                  </div>
                </div> 
                <div class="row">
                  <div class="col mb-5 text-center">
                    <h1 class="display-1 font-weight-bold">100</h1>  
                  </div>
                </div> 
              </div>    
            </div>
            <div class="col bg-secondary">
              <div class="container-fluid">
                <div class="row">
                  <div class="col mt-5 text-center">
                    <p>Current No:</p>  
                  </div>
                </div> 
                <div class="row">
                  <div class="col mb-5 text-center">
                    <h1 class="display-1 font-weight-bold">12</h1>  
                  </div>
                </div>  
              </div>  
            </div>
          </div>
        </div>  

        <div class="container">
          <div class="row">
            <div class="col form-group mt-4">
              <a href="logout.php" class="form-control btn btn-success">Done</a>
            </div>
          </div>
        </div>




  

  
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


 <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
</body>
</html>

<?php 
}else{
  header("Location:index.php");
  exit();
}
 ?>
