<?php
include 'backend/database.php';
require('config.php');
//Start session

session_start();
?>


<!DOCTYPE html>

<html>

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
	<script src="ajax/hsregistermgmt_ajax.js"></script>
	
<script src="js/qrcode.min.js"></script>

    <script type="text/javascript">
		
		$(document).ready(function(){
			$("#completion_div").load("completionfilterby.php","");
            $("#pveventname").change(function()
			{
				var selected=$(this).val();
				
				$("#completion_div").load("completionfilterby.php",{selected_pvid: selected});
			});
		});
	</script>
	 <script src="js/qrcode.min.js"></script>
    <script type="text/javascript">
		$(document).ready(function(){
		$('#menulabel1').text("Completion List");

		$('#menulabel2').html("<h6>" + "Completion List" + "</h6>");
    });
    </script>

</head>

<?php
include 'modals/guestmgmtmodal.php';
?>
<body>
<?php 
include "includes/sidebar.php";
?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
	<?php 
	include "includes/menubar.php";
	?>
	
	<!-- <label for="firstName">First Name:</label>
    <input type="text" id="firstName"><br><br>
    <label for="district">District:</label>
    <input type="text" id="district"><br><br> -->

    <form method="post" action="guestform">
		<div class="container-fluid py-4">
			<div class="row" id='completion_div'>
							
			</div>
		</div>
  	</form>
    
  </main>

</body>

</html>