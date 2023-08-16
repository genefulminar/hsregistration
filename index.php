<?php
	//Start session
	session_start();

	if(session_status()== PHP_SESSION_NONE)
	{

	header('Location: login.php');
	exit;
	}
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>

<!DOCTYPE html>

<html>

<head>

<meta charset="utf-8" />
<title>HS Registration</title>
<link rel="icon" type="image/x-icon" href="./images/kiosk.ico">
<!-- Our CSS stylesheet file -->
<!-- <link rel="stylesheet" href="css/login.css" /> -->

  <!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
<!-- Nucleo Icons -->
<link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
<!-- CSS Files -->
<link id="pagestyle" href="./css/material-dashboard.css?v=3.0.4" rel="stylesheet" />

<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="css/material-dashboard.min.js?v=3.0.4"></script>


</head>

<body>

  <main class="main-content  mt-0">

  <div class="page-header align-items-start min-vh-100" style="position: relative; background-image: url('./images/welcomescreen.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;">
    <span class="mask bg-gradient-dark opacity-0"></span>

    

    <div class="container my-auto" style="margin-left:-350px;">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="shadow-primary border-radius-lg py-3 pe-1" style='background-color: #3a8e15;!important'>
				<!-- <img src="./images/Logo PV Inventory V1.png" alt="image" style='position:absolute; left:85px;top:50%;transform:translateY(-50%);width:15%!important'> -->
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">HS-Registration</h4>
                 
                </div>
              </div>
              <div class="card-body"> 

                <form method="post" action="login.php" class="text-start">

                  <div class="input-group input-group-outline my-3">
                    <input id="username" name="username" type="text" class="form-control">
					<i class="material-icons opacity-10" style='position:absolute; left:10px;top:50%;transform:translateY(-50%)!important'>person</i>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <input id="password" name="password" type="password" class="form-control">
					<i class="material-icons opacity-10" style='position:absolute; left:10px;top:50%;transform:translateY(-50%)!important'>lock</i>
                  </div>
                 
                  <div class="text-center">
                    <button type="submit" class="btn w-100 my-4 mb-2" style='background-color: #3a8e15;color:white!important' name="submit">Log in</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

  </div>



  </main>

</body>

</html>