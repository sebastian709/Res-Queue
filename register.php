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


    <link rel="stylesheet" href="assets/css/prostyle1.css">

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
      <div class="col bg-dark">
        <h1 class="py-4 ml-5">RES-QUEUE</h1>
      </div>
      <div class="col bg-dark">
        <a href="index.php" class="btn btn-secondary float-right mt-5">Home</a>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col bg-light">
        <p class="mt-3 text-center">We offer solutions for any size of organization, covering basic as well complex needs.</p>
      </div>
    </div>
    <div class="row">
      <div class="col mt-4 mb-5">
        
      </div>
    </div>
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
    <div class="row">
      <div class="col">
        <div class="card">
          <h4 class="header-title text-center py-4">Company Register</h4>
          <div class="card-body">
            <div class="container">
              <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group text-center" style="position: relative;" >
                      <span class="img-div">
                        <div class="text-center img-placeholder"  onClick="triggerClick()">
                            <h4>Select Logo</h4>
                        </div>
                        <img src="img/deflogo.png" onClick="triggerClick()" id="profileDisplay">
                      </span>
                      <input type="file" name="sdprofile_image" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
                    </div>
                  </div>
                  <div class="col">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col form-group">
                          <label>Company Name:</label>
                          <input type="text" class="form-control" name="companyname">
                        </div>  
                      </div>
                      <div class="row">
                        <div class="col form-group">
                          <label>Type:</label>
                          <select class="form-control" name="ctype">
                            <option>Choose...</option>
                            <option>School</option>
                            <option>Bank</option>
                            <option>Dental CLinic</option>
                          </select>
                        </div>
                        <div class="col form-group">
                          <label>Company Abreviation_Branch</label>
                          <input type="text" class="form-control" name="abv">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col form-group">
                          <label>Address</label>
                          <input type="text" class="form-control" name="address">
                        </div>
                      </div>
                    </div>  
                  </div>
                </div>
               
                
                <div class="row">
                  <div class="col form-group">
                    <label>Contact No.</label>
                    <input type="text" class="form-control" name="contact">
                  </div>
                  <div class="col form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email">
                  </div>
                </div>
                <div class="row">
                  <div class="col form-group">
                    <label>Password</label>
                    <input type="Password" class="form-control" name="pass">
                  </div>
                  <div class="col form-group">
                    <label>Confirm Password</label>
                    <input type="Password" class="form-control" name="conpass">
                  </div>
                </div>
                <div class="row">
                  <div class="col mt-4 form-group">
                    <button class="btn btn-dark form-control" name="regsub">Submit</button>
                  </div>
                </div>
              </form>
            </div>  
          </div>
        </div>
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

<script src="assets/js/prostyle1.js"></script>


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


    <script>
             $( ".myDiv" ).show( "slow").delay(3500).fadeOut('slow', function() {
          $(this).remove();
     }); 
    </script>
</body>
</html>
