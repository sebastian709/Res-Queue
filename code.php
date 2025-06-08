<?php
session_start();
$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "rq";

$conn = mysqli_connect($sname, $uname, $password, $db_name);


if (isset($_POST['regsub'])) {
    // for the database
    $companyname = stripslashes($_POST['companyname']);
    $ctype = stripslashes($_POST['ctype']);
    $address = stripslashes($_POST['address']);
    $contact = stripslashes($_POST['contact']);
    $email = stripslashes($_POST['email']);
    $abv = stripslashes($_POST['abv']);
    $pass = stripslashes($_POST['pass']);
    $conpass = stripslashes($_POST['conpass']);
   	$profileImageName = time() . '-' . $_FILES["sdprofile_image"]["name"];


    // For image upload
    $target_dir = "img/";
    $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['sdprofile_image']['size'] > 200000) {
      $msg = "Image size should not be greated than 200Kb";
      $msg_class = "alert-danger";
    }
    
    // check if file exists
    if(file_exists($target_file)) {
      header("Location: register.php?error=This photo is already Exist&$user_data");
    }
    if ($pass == $conpass) {
    	 
    
    // Upload image only if no errors
    if (empty($error)) {
      if(move_uploaded_file($_FILES["sdprofile_image"]["tmp_name"], $target_file)) {
      	
        $sql = "INSERT INTO tbl_register SET dprofile_image='$profileImageName', companyname='$companyname', type='$ctype', address='$address', contact='$contact', email='$email', password='$pass', status='Pending', abv = '$abv'";

        #
        if(mysqli_query($conn, $sql)){
          header("Location:register.php?success=Company registered Successfully!");
        } else {
          echo '<script> alert("Please insert your Logo"); </script>';
        }
      } else {
        echo '<script> alert("Please insert your Logo"); </script>';
      }
    }
    }else{
    	echo '<script> alert("Password is not match!"); </script>';
    }
  }


#adminlogin
if (isset($_POST['cname']) && isset($_POST['pass'])) {

	#default password
	$mail = $_POST['cname'];
	$dpass = $_POST['pass'];
	if ($mail == "admin" && $dpass == "admin") {
		$_SESSION['ID'] = 1;
		$_SESSION['NAME'] = "Admin";
		header("location: admin.php?success=Welcome Admin!");
		exit();
	}elseif ($mail == "desk" && $dpass == "desk") {
		$_SESSION['ID'] = 1;
		$_SESSION['NAME'] = "Admin";
		header("location: DO-Dashboard.php?success=Welcome Admin!");
		exit();
	}else{
	
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$uname = validate($_POST['cname']);
	$pass = validate($_POST['pass']);
	if (empty($uname)) {
		header("location: login.php?error=Incorrect username or password");
		exit();
	}elseif (empty($pass)) {
		header("location: login.php?error=Incorrect username or password");
		exit();
		}else{

		//$pass = md5($pass);
		$sql = "SELECT * FROM admin WHERE user = '$uname' AND pass = '$pass'";
		$result = mysqli_query($conn, $sql);

		$sql2 = "SELECT * FROM tbl_register WHERE email = '$uname' AND password = '$pass'";
		$result2 = mysqli_query($conn, $sql2);

		if (mysqli_num_rows($result) ==1) {
			$row = mysqli_fetch_assoc($result);

			if ($row['user']== $uname && $row['pass'] == $pass) {
				$_SESSION['USERNAME'] = $row['user'];
				$_SESSION['NAME'] = $row['fullname'];
				$_SESSION['ID'] = $row['id'];
				header("Location:admin.php?success=Welcome ".$row['fullname']."!");
				exit();
			}else{
				header("Location: login.php?error=Incorrect username or password");
				exit();
			}
		}elseif (mysqli_num_rows($result2) ==1) {
			$row = mysqli_fetch_assoc($result2);

			if ($row['email']== $uname && $row['password'] == $pass) {
				$_SESSION['cname'] = $row['companyname'];
				$_SESSION['ctype'] = $row['type'];
				$_SESSION['ID'] = $row['id'];
				header("Location:company-dashboard.php?success=Welcome ".$row['companyname']."!");
				exit();
			}else{
				header("Location: login.php?error=Incorrect username or password");
				exit();
			}
		}else{
			header("Location: login.php?error=Incorrect username or password");
			exit();
		}


	}
}
}

if (isset($_POST['appdata']))
{
	$id = $_POST['app_id'];


	$query= "UPDATE tbl_register SET status ='Approved' WHERE id='$id'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {
		header("Location:admin-comacc.php");
	}
	else{
		echo '<script type=:"text/javascript"> alert("Not UPDATED")</script>';
	}
}

if (isset($_POST['add']))
{
	$fname = $_POST['fname'];
	$user = $_POST['user'];
	$pass = $_POST['pass'];


	$query= "INSERT INTO admin(fullname,user,pass)VALUES ('$fname','$user','$pass')";

	$query_run = mysqli_query($conn, $query);

	if ($query_run) {
		header("Location:admin-adminacc.php");
	}
	else{
		echo '<script type=:"text/javascript"> alert("Not UPDATED")</script>';
	}
}


if (isset($_POST['delbtnadmin'])) 
{
	$vpid = $_POST['del_idno'];

	$q = "DELETE FROM admin WHERE ID='$vpid'";
	$q_run = mysqli_query($conn, $q);

	if ($q_run) 
	{
		echo '<script> alert("Deleted"); </script>';
		header("Location:admin-adminacc.php?success=Data has been successfully deleted!");
	}
	else
	{
		echo '<script> alert("Failed to delete"); </script>';
	}
}

if (isset($_POST['selecttypebtn'])) 
{
	$stype = $_POST['typeop'];

	$_SESSION['stypecom'] = $stype;
	header("Location:main-getano.php?success=Success!");
}

if (isset($_POST['getano'])) 
{
	$getid = $_POST['getanoid'];
	$stypec = $_POST['getanotype'];

	$_SESSION['getanoid'] = $getid;

	if ($stypec == "School") {
		header("Location:main-schoolform.php?success=Success!");
	}
	elseif ($stypec == "Bank") {
		header("Location:main-bankform.php?success=Success!");
	}
	elseif ($stypec == "Dental CLinic") {
		header("Location:main-dentalform.php?success=Success!");
	}




	
}

# company update
if(isset($_POST['accupdate'])) {

	$id = $_POST['eid'];
	$name = $_POST['ecname'];
	$abv = $_POST['eabv'];
	$ctype = $_POST['ectype'];
	$email = $_POST['eemail'];
	$contact = $_POST['econtact'];
	$add = $_POST['eadd'];


	


		
		$queryy = "UPDATE tbl_register SET companyname='$name', abv='$abv', type='$ctype', email='$email', contact='$contact', address='$add' WHERE id ='$id'";

		$resultq = mysqli_query($conn, $queryy);
		
		

          if ($resultq) {
          	$_SESSION['tid'] = $id;
			header("Location: company-myacc.php");
			 exit();
		     }else {
			     header("Location: company-myacc.php");
				exit();
          }
	}


# company update
if(isset($_POST['nexts'])) {

		$table = mysqli_query($conn,"SELECT current FROM realtimectr WHERE  id = 1 ");

               if(mysqli_num_rows($table) > 0)
               { 
                            
                   while ($row = mysqli_fetch_assoc($table)) 
                   {  
                     $add = $row['current'] + 1;

                     $queryy = "UPDATE realtimectr SET current='$add' WHERE id = 1";

						$resultq = mysqli_query($conn, $queryy);
		
		

				          if ($resultq) {
							header("Location: company-controlscr.php");
							
				          }


                    
                                   }
                                
                                  }


		
		
	}

	# company update
if(isset($_POST['resets'])) {

		$table = mysqli_query($conn,"SELECT current FROM realtimectr WHERE  id = 1 ");

               if(mysqli_num_rows($table) > 0)
               { 
                            
                   while ($row = mysqli_fetch_assoc($table)) 
                   {  
                     $add = 1;

                     $queryy = "UPDATE realtimectr SET current='$add' WHERE id = 1";

						$resultq = mysqli_query($conn, $queryy);
		
		

				          if ($resultq) {
							header("Location: company-controlscr.php");
							
				          }


                    
                                   }
                                
                                  }


		
		
	}


	# company update
if(isset($_POST['prevs'])) {

		$table = mysqli_query($conn,"SELECT current FROM realtimectr WHERE  id = 1 ");

               if(mysqli_num_rows($table) > 0)
               { 
                            
                   while ($row = mysqli_fetch_assoc($table)) 
                   {  
                     $add = $row['current'] - 1;

                     $queryy = "UPDATE realtimectr SET current='$add' WHERE id = 1";

						$resultq = mysqli_query($conn, $queryy);
		
		

				          if ($resultq) {
							header("Location: company-controlscr.php");
							
				          }


                    
                                   }
                                
                                  }


		
		
	}

?>