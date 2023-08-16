<?php
include 'backend/database.php';
require('config.php');
//Start session

session_start();

// Check if the form is submitted
if ($_POST["btnSave"] == "Save") {
    // Update the IP address in the database
    $newIPAddress = $_POST["ipaddress"];
    $db = new db();
    $db->updateIPAddress($newIPAddress);
    
    // Display a success message
    echo '<script>alert("IP address updated successfully!");</script>';
}

?>

<!DOCTYPE html>

<html>

<head>
   <!-- Your head code here -->
   <style>
        /* Styles for the pop-up alert message */
        .alert-popup {
            display: none;
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 300px;
            padding: 15px;
            background-color: #f8f8f8;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 9999;
        }

        .alert-popup .message {
            text-align: center;
            margin-bottom: 10px;
        }

        .alert-popup .close-button {
            position: absolute;
            top: 5px;
            right: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        .modal-body {
    position: absolute;
    width: 35%;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    border-radius: 20px;
    opacity: 1;
    border: 4px solid green;
}

    </style>

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
		$('#menulabel1').text("Settings");

		$('#menulabel2').html("<h6>" + "Settings" + "</h6>");
    });
    </script>
</head>

<?php
// Fetch the IP addresses and area names from the database
$db = new db();
$data = $db->getIPAddressesWithAreaNames();

?>

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
  
  <div class="container-fluid py-4">
    <div class="card-body px-2 pb-2 py-2">
        <form method="POST" action="settings.php" id="settingsmgmtform" name="settingsmgmtform">
            <div class="modal-body" id="modal-body" style="display: none; position: absolute; width: 35%; margin-left:100px; margin-top: 100px; background-color: white; border-radius:20px;opacity: 1;border: 4px solid green;">
                <div class="py-3" style="opacity: 2;">
                    <div style="display: flex; align-items: center; margin-left:10%; width:300px;" class="form-group">
                        <label style="color:gray; margin-right: 10px; white-space: nowrap;"><b>IP Address:</b></label>
                        <input type="text" name="ipaddress" id="edit_ipaddress" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' required>
                    </div>
                    <div style="position: absolute; top: 140%; transform: translateY(-50%); width: 100%;" class="form-group">
                        <div style="display: flex; justify-content: center;">
                            <input type="hidden" value="1" name="type">
                            <button id="btnSave" name="btnSave" style="width:150px;" type="submit" class="btn btn-success">Save</button>
                            <button id="btnCancel" name="btnCancel" style="width:150px; margin-left: 10px;" type="button" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <?php if (!empty($data)) : ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>IP Address</th>
                            <th>Area Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><?php echo $row['ipaddress']; ?></td>
                                <td><?php echo $row['area_name']; ?></td>
                                <td>
                                    <a href="#" class="edit-icon" title="Edit" data-ipaddress="<?php echo $row['ipaddress']; ?>">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" class="delete-icon" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <a href="#" class="add-icon" title="Add">
                                    <i class="fas fa-plus add-icon"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="no-records-found" id="no-records-found">
                <img src="images/no-data.png" alt="No Data Icon">
                No Records Found
            </div>
        <?php endif; ?>

    </div>
</div>



  </main>

  <script>
    // Get the necessary elements
    const modalBody = document.getElementById('modal-body');
    const editIcons = document.getElementsByClassName('edit-icon');
    const editIpAddressInput = document.getElementById('edit_ipaddress');
    const addIcons = document.getElementsByClassName('add-icon');
    const btnCancel = document.getElementById('btnCancel');

    // Show modal when add icon is clicked
    for (let i = 0; i < addIcons.length; i++) {
    addIcons[i].addEventListener('click', function() {
        modalBody.style.display = 'block';
    });
    }

        // Loop through the edit icons and add click event listener
        for (let i = 0; i < editIcons.length; i++) {
        editIcons[i].addEventListener('click', function(e) {
            e.preventDefault();

            // Get the IP address from the data attribute
            const ipAddress = this.getAttribute('data-ipaddress');

            // Set the IP address in the input field
            editIpAddressInput.value = ipAddress;

            // Show the modal body
            modalBody.style.display = 'block';
        });
    }

    // Add click event listener to the cancel button
    btnCancel.addEventListener('click', function() {
        // Hide the modal body
        modalBody.style.display = 'none';
    });
</script>


<!-- <script>
    document.getElementById('btnSave').addEventListener('click', function() {
        // Get the IP address value
        var ipAddress = document.getElementById('ipaddress').value;

        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Set up the request
        xhr.open('POST', 'update_ipaddress.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        // Set up the response handler
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Display a success message
                alert('IP address updated successfully!');
            } else {
                // Display an error message
                alert('An error occurred while updating the IP address.');
            }
        };

        // Send the request with the IP address value
        xhr.send('ipaddress=' + encodeURIComponent(ipAddress));
    });
</script> -->

    <!-- Alert Message Popup -->
    <div id="alertPopup" class="alert-popup">
        <div class="close-button" id="closeButton">X</div>
        <div class="message" id="alertMessage"></div>
    </div>

    <script>
        // Function to display the alert message
        function showAlert(message, type) {
            const alertPopup = document.getElementById('alertPopup');
            const alertMessage = document.getElementById('alertMessage');
            const closeButton = document.getElementById('closeButton');

            alertMessage.innerText = message;
            alertPopup.style.display = 'block';

            closeButton.addEventListener('click', function() {
                alertPopup.style.display = 'none';
            });
        }

        // Check if the IP address was updated
        <?php
        if (isset($_POST["btnUpdate"]) && $_POST["btnUpdate"] == "Update") {
            echo 'showAlert("IP address updated successfully!", "success");';
        }
        ?>
    </script>

</body>

</html>


