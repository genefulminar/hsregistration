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
	<script src="ajax/hsusersmgmt_ajax.js"></script>
	
  
  <script type="text/javascript">
		$(document).ready(function(){
		$('#menulabel1').text("User List");

		$('#menulabel2').html("<h6>" + "User List" + "</h6>");
    });
    </script>

    <script type="text/javascript">
		$(document).ready(function(){
          
      
var table = document.getElementById("pvreports");

for (let i = 1; i < table.rows.length; i++) 
{
	var tdavatar = document.getElementById("tdavatar" + i);
	var tdimage = document.getElementById("tdimage" + i);

	var imageUrl  = tdimage.innerText.trim();

	// Set the background image of the td element
	tdavatar.style.backgroundImage = "url('./images/emptyuser.png')";
    tdavatar.classList.add(tdavatar);

}

		});
	</script>
	
  

</head>
<?php
include 'modals/usersmgmtmodal.php';
?>
<body>

<?php 
include "includes/sidebar.php";
?>

  <main class="main-content  mt-0">
	<?php 
	include "includes/menubar.php";
	?>
  
  <form method="post" action="userform">
		<div class="container-fluid py-4">

    <div class="card-body px-0 pb-2" >
	<form method="POST" action="users.php" id="usersform">
		<table id="pvreports">
					<thead>
						<tr>
							<th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
							<th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
							<th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
							<th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Username</th>
							<th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-0">Password</th>
							<th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-0" id="thaction">Action</th>
						</tr>
					</thead>
				<tbody>
				
				<?php
					$db = new db;
					
					$result=$db->getUsers("");

					if($result->num_rows > 0)
					{
						
					
					$i=1;
					while($row = mysqli_fetch_array($result)) {
					?>
					<tr>
							
							<td class="text-center"><?php echo $i; ?>
							</td>
							

							<td class="text-center" style="width:400px!important">
											<div class="d-flex px-0"  >
											<div style="float:left;width: 100px;height: 100px; background-size: cover; background-repeat: no-repeat;!important">
												<img id=<?php echo "tdavatar". $i; ?> >
											</div>
												<div class="my-auto" style="margin-left:20px;float:left;!important">
													<p class="text-xs font-weight-bold mb-0">
														<h6 class="mb-0 text-sm" style="font-weight: bold;!important"><?php echo $row['fullname'];?></h6>
													</p>
												</div>
											</div>
										</td>
									<td class="text-center" id=<?php echo "tdimage". $i; ?> style="display:none">
										<p class="text-xs font-weight-bold mb-0"><?php echo $row['avatar']; ?></p>
									</td>
							<td class="text-center">
								<p class="text-xs font-weight-bold mb-0"><?php echo $row['email']; ?></p>
							</td>
							<td class="text-center">
								<p class="text-xs font-weight-bold mb-0"><?php echo $row['username']; ?></p>
							</td>
							<td class="text-center">
								<p class="text-xs font-weight-bold mb-0"><?php echo $row['password']; ?></p>
							</td>
							
							<td style="width:50px" id=<?php echo "tdaction" .$i ?>>
								<div class="d-flex align-items-center justify-content-center">
								
								<a href="#editadminusersmgmt" name="editguest" class="edit" data-bs-toggle="modal" >
									<i class="material-icons update" 
										data-bs-toggle="tooltip" 
										data-id="<?php echo $row["ID"]; ?>"
										data-fullname="<?php echo $row["fullname"]; ?>"
										data-email="<?php echo $row["email"]; ?>"
										data-username="<?php echo $row["username"]; ?>"
										data-password="<?php echo $row["password"]; ?>"
										title="Edit">&#xE254;</i>
								</a>
								
								<a href="#delusersmgmt" class="delete" data-id="<?php echo $row["ID"]; ?>" data-bs-toggle="modal">
								<i class="material-icons" data-bs-toggle="tooltip" 
												title="Delete">&#xE872;</i></a>
								</div>
							</td>
						</tr>
							
							<?php
						$i++;
						}
					}
				?>
		</tbody>
		</table>

		
	</form>
	<div class="no-records-found" id="no-records-found">
		<img src="images/no-data.png" alt="No Data Icon">
		No Records Found
	</div>
</div>
		</div>
  	</form>

  </main>

</body>

</html>


