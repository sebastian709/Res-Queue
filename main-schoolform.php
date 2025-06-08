<?php 
session_start();
if (isset($_SESSION['stypecom'])) {

$selecttype = $_SESSION['stypecom'];

$comid = $_SESSION['getanoid'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rq";
    $conn = mysqli_connect($servername,$username,$password,$dbname);


$query = "SELECT transid FROM schoolform ORDER BY transid DESC";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$lastid = $row['transid'];

if(empty($lastid))
{
    $number = "001";
}
else
{
    $idd = str_replace("", "", $lastid);
    $id = str_pad($idd + 1, 1, 0, STR_PAD_LEFT);
    $number = ''.$id;
}
?>

<?php

if($_SERVER["REQUEST_METHOD"]== "POST")
{
    $inv = $_POST['invno'];
    $cname = $_POST['cname'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $sno = $_POST['sno'];
    $transty = $_POST['transty'];

    if(!$conn)
    {
        die("connection failed " . mysqli_connect_error());
    }
    else
    {
        $sql = "insert into schoolform(transid,nameofschool,lastname,firstname,midname,studentid,transaction)VALUES('".$inv."','".$cname."','".$lname."','".$fname."','".$mname."','".$sno."','".$transty."') ";
        if(mysqli_query($conn,$sql))
        {
            $query = "SELECT transid FROM schoolform ORDER BY transid DESC";
            $result = mysqli_query($conn,$query);
            $row = mysqli_fetch_array($result);
            $lastid = $row['transid'];

            $_SESSION['fname'] = $fname;
            $_SESSION['lname'] = $lname;
            $_SESSION['tid'] = $inv;
            header("Location:main-schoolctr.php?success=Welcome ".$fname."!");

            if(empty($lastid))
            {
                $number = "001";
            }
            else
            {
                $idd = str_replace("", "", $lastid);
                $id = str_pad($idd + 1, 1, 0, STR_PAD_LEFT);
                $number = ''.$id;
            }

        }
        else
        {
            echo "Record Faileddd";
        }
    }
}
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
        <h4 class="text-center mb-4">SCHOOL FORM</h4>


        <?php
        $sname = "localhost";
                                                $uname = "root";
                                                $password = "";
                                                $db_name = "rq";

                                                $conn = mysqli_connect($sname, $uname, $password, $db_name);
           $table = mysqli_query($conn,"SELECT * FROM tbl_register WHERE  id = '".$comid."' ");

               if(mysqli_num_rows($table) > 0)
               { 
                            
                   while ($row = mysqli_fetch_assoc($table)) 
                          {  
                                    
                                  ?>  
        <div class="image text-center" >
          <img class="img-circle elevation-2" alt="User Image" src="<?php echo 'img/' . $row['dprofile_image'] ?>" style="height: 9vh; width: 50px;">
        </div>

      
<?php
                                   }
                                
                                  }

                                ?> 
        <?php
                                                $sname = "localhost";
                                                $uname = "root";
                                                $password = "";
                                                $db_name = "rq";

                                                $conn = mysqli_connect($sname, $uname, $password, $db_name);

                                                $table = mysqli_query($conn,'SELECT * FROM tbl_register WHERE id="'.$comid.'" ');

                                                if(mysqli_num_rows($table) > 0)
                                                { 
                                                
                                                  while ($row = mysqli_fetch_assoc($table)) 
                                                  {  
                                                        
                                                  ?>

        <p class="text-center font-weight-bold"><?php echo $row["companyname"];?></p>

        
      </div>
    </div>
    <form method="POST" action="<?php echo($_SERVER["PHP_SELF"]); ?>">
    <div class="row">
      <div class="col form-group">
        <label>Queue No.</label>
        <input type="text" class="form-control text-info" name="invno" value="<?php echo $number; ?>" readonly>
      </div>
      <div class="col form-group">
        <label>Name of School</label>
        <input type="text" class="form-control" name="cname" value="<?php echo $row["companyname"];?>">
      </div>
      <?php
                                                    }
                                                        
                                                    }

                                                    ?>
    </div>
    <div class="row">
      <div class="col form-group">
        <label>Last name</label>
        <input type="text" class="form-control" name="lname">
      </div>
      <div class="col form-group">
        <label>First name</label>
        <input type="text" class="form-control" name="fname">
      </div>
      <div class="col form-group">
        <label>Middlename</label>
        <input type="text" class="form-control" name="mname">
      </div>
    </div>
    <div class="row">
      <div class="col form-group">
        <label>Student ID No.</label>
        <input type="text" class="form-control" name="sno" placeholder="Ex: 0000-000-0000">
      </div>
      <div class="col form-group">
        <label>Transaction</label>
        <select class="form-control" name="transty">
          <option>Select...</option>
          <option>Transaction 1</option>
          <option>Transaction 2</option>
          <option>Transaction 3</option>
          <option>Transaction 4</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col form-group mt-5">
        <button type="submit" class="btn btn-primary form-control">Submit</button>
      </div>
    </div>
    <div class="row">
      <div class="col form-group">
        <a href="main-getano.php" class="btn btn-secondary form-control">Cancel</a>
      </div>
    </div>
    </form>
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