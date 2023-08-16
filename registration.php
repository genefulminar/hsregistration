<?php
    include 'backend/database.php';
    require('config.php');
    //Start session

    session_start();
?>

<!DOCTYPE html>

<html>

<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
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
	<script src="ajax/hsregistermgmt_ajax.js"></script>
    
    <script type="text/javascript">
       	$(document).ready(function()
        {
            $('#menulabel1').text("Registration");

            $('#menulabel2').html("<h6>" + "Registration" + "</h6>");
        });

    
    </script>

</head>

<body>
<?php 
include "includes/sidebar.php";
?>

  <main class="main-content  mt-0">
      <?php 
      include "includes/menubar.php";
      ?>
      <div class="page-header align-items-start min-vh-80" 
           style="width:99%;height:821px;position: relative; background-image: url('./images/registration.PNG');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;">

          <form method="POST" action="registration.php" id="registersmgmtform" name="registersmgmtform">
              <div class="modal-body" style="position: absolute; width: 35%; margin-left:100px; margin-top: 100px; background-color: white; border-radius:20px;opacity: 1;border: 4px solid green;"> 
              <div style="opacity: 2;">
                <div style="margin-left:10%;width:300px;" class="form-group">
                    <label style="color:gray"><b>First Name</b></label>
                    <input type="text" name="addfirstname" id="addfirstname" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter First Name" required>
                </div>

                <div style="margin-left:10%;width:300px;" class="form-group">
                    <label style="color:gray"><b>Surname</b></label>
                    <input type="text" name="addlastname" id="addlastname" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter Lastname" required>
                </div>
                <div style="margin-left:10%;width:300px;" class="form-group">
                    <label style="color:gray"><b>Age</b></label>
                    <input type="text" name="addage" id="addage" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter Age" required>
                </div>
                
                <div style="margin-left:10%;width:300px;" class="form-group">
                    <label style="color:gray"><b>District</b></label>
                    <input type="text" name="adddistrict" id="adddistrict" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter District" required> 
                </div>

                <div style="margin-left:10%;width:300px;" class="form-group">
                    <label style="color:gray"><b>Local Conggregation</b></label>
                    <input type="text" name="addlocale" id="addlocale" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter Locale" required>
                </div>

                <!-- <div style="margin-left:10%;width:300px;" class="form-group">
                      <label style="color:gray"> <b>Guest Status</b></label>
                      <select class="form-control my-2" id="guesttype_add" 
                                name="guesttype_add" required
                                style='background-color: white;text-align:left;width:200px;border: 1px solid #ccc;margin-bottom: 15px;!important'>
                                <option value="0">--Select Guest Status--</option>
                                <option value="1">Active</option>
                                <option value="2">Inactive </option>
                        </select>
                  </div> -->

                <div style="position: absolute; top: 120%; transform: translateY(-50%); width: 100%;"class="form-group" >
                    <div style="display: flex; justify-content: center;">
                        <input type="hidden" value="1" name="type">
                        <button id="btnRegister" name="btnRegister" style="width:150px;" type="submit" class="btn btn-success">REGISTER</button>
                    </div>
                </div>  
                
                </div>
              </div>
          </form>




      </div>
  </main>

</body>

</html>