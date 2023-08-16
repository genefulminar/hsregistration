<?php 
session_start();
include 'backend/database.php';
require('config.php');
include_once 'server.php';
$myUsername =  $_SESSION['SESS_USERNAME'];

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8" />
<title>HS Registration</title>
	<link rel="icon" type="image/x-icon" href="./images/kiosk.ico">
<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/error.css">

	<!-- Font Awesome Icons -->
	<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
	<!-- Material Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
	<!-- CSS Files -->
	<link id="pagestyle" href="css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
	
	<!--   Core JS Files for MODAL   -->
	<script src="./js/core/popper.min.js"></script>
	<script src="./js/core/bootstrap.min.js"></script>
	<script src="./js/plugins/perfect-scrollbar.min.js"></script>
	<script src="./js/plugins/smooth-scrollbar.min.js"></script>
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="ajax/ajax.js"></script>

  <script type="text/javascript">
		$(document).ready(function(){
		$('#menulabel1').text("Profile");

		$('#menulabel2').html("<h6>" + "Profile" + "</h6>");
	});
	</script>
</head>

<body class="g-sidenav-show bg-gray-200">
  
<?php 
include "includes/sidebar.php";
?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <?php 
	include "includes/menubar.php";
	?>
  
    <div class="container-fluid px-2 px-md-4">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('./images/registration.png');">
        <span class="mask  bg-gradient-primary  opacity-1"></span>
      </div>

      <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="./images/imgDash.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
              <?php
                  $db = new db();
                  $resultUsers = $db->getUsers($myUsername);


                  while($row = mysqli_fetch_array($resultUsers)) {
                    ?>
                    <?php echo $row["fullname"]; ?>

                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                    <?php echo $row["Designation"]; ?>
                    </p>
            
            </div>
          </div>
  
        </div>
          <div class="row">
            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-body p-3">
                  
                  <ul class="list-group">
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Department:</strong> &nbsp; 
                    <?php echo $row["Department"]; ?>
                    </li>
                    <li class="list-group-item border-0 ps-0 pt-1 text-sm"><strong class="text-dark">Section:</strong> &nbsp; 
                    <?php echo $row["Section"]; ?>
                    </li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Access Type:</strong> &nbsp;
                        <?php  
                            if ($row["AccessType"] == "1")
                              echo 'Admin';
                              else
                              echo 'User';
                        ?>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <?php
          }?>

      </div>

    </div>
  </main>
  
</body>

</html>