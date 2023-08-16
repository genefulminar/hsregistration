<?php 
session_start();
include 'backend/database.php';
require('config.php');
include_once 'server.php';

$myUsername =  $_SESSION['SESS_USERNAME'];
$myPassword =  $_SESSION['SESS_PASSSWORD'];

$CurrentPassword = $_POST['currentpassword'];

if($myPassword == $CurrentPassword)
{

}

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
        $(document).ready(function()
        {
        $('#menulabel1').text("Change Password");

        $('#menulabel2').html("<h6>" + "Change Password" + "</h6>");
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
      <div class="card card-body mx-3 mx-md-4 mt-n0">
     
          <div class="row">
            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-body p-3">
                  
                  <ul class="list-group">
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Current Password:</strong> &nbsp; 
                        <div style="margin-left:40%;margin-top:-35px;width:300px;" class="form-group">
                            <input type="password" name="currentpassword" id="currentpassword" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter Current Password">
                        </div>
                    </li>
                    <li class="list-group-item border-0 ps-0 pt-1 text-sm"><strong class="text-dark">New Password:</strong> &nbsp; 
                        <div style="margin-left:40%;margin-top:-35px;width:300px;" class="form-group">
                            <input type="password" name="newpassword" id="newpassword" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter New Password">
                        </div>
                    </li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Confirm Password:</strong> &nbsp;
                        <div style="margin-left:40%;margin-top:-35px;width:300px;" class="form-group">
                            <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter Confirm Password">
                        </div>
                    </li>

                    <li class="list-group-item border-0 ps-0 text-sm" style="margin-top:-15px;"> &nbsp;
                        <div class="text-center">
                        <button type="submit" class="btn w-100 my-4 mb-2" style='margin-left:120px;background-color: #3a8e15;color:white;width:250px!important' id="changepassword" name="changepassword">Save</button>
                        </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>


      </div>

    </div>
  </main>
  
</body>

</html>