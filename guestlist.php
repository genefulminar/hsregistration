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
            
			//$("#guest_div").load("guestfilterby.php","");
            $("#pveventname").change(function()
			{
				var selected=$(this).val();
				
				//$("#guest_div").load("guestfilterby.php",{selected_pvid: selected});
			});
			
		});
	</script>
	 <script src="js/qrcode.min.js"></script>
    <script type="text/javascript">
		$(document).ready(function(){
		$('#menulabel1').text("Guest List");

		$('#menulabel2').html("<h6>" + "Guest List" + "</h6>");
    });
    </script>

    <!-- Include Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Include Font Awesome CSS for the edit icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


	<style>
.custom-file-input {
  opacity: 0;
  position: absolute;
  z-index: -1;
}

.custom-file-label {
  background-color: #007bff;
  color: #fff;
  padding: 8px 12px;
  border-radius: 4px;
  cursor: pointer;
}

.custom-file-label::after {
  content: 'Choose File';
}

.custom-file-input:focus + .custom-file-label {
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
  outline: none;
}

.custom-file-input:disabled + .custom-file-label {
  opacity: 0.65;
  cursor: not-allowed;
}
</style>


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

	<div class="form-group ms-sm-n0" style='margin-left:5px;margin-top:2px!important'>
		<a data-bs-toggle="modal" data-bs-target="#addadminguestmgmt">
			<button type="submit" id="btnAddGuest" name="btnAddGuest" class="btn btn-success" style='margin-left:9px;text-align:center;width:135px;height:35px!important'>Add Guest</button>		
		</a>
	</div>

	<div class="form-group" style='max-width:200px;margin-left:15px;margin-top:2px!important'>
		<label class="form-label" id="dateactionlabel"><b>Date Reservation</b></label>
		<input required class="form-control"  id="reservationDate" name="reservationDate" 
			   style='border: 1px solid #ccc;margin-bottom:15px;width:200px!important' 
			min="<?php echo date('Y-m-d');?>" type="date" >
	</div>

	<div class="form-group ms-sm-n0" style='margin-left:12px;margin-top:2px;!important'>
		<form method="post" enctype="multipart/form-data" id="importForm">
			<input type="file" name="file" id="file" accept=".xlsx" disabled>
			<button type="submit" id="btnImport" name="btnImport" class="btn btn-success" style='margin-left:9px;text-align:center;width:135px;height:35px!important' disabled>Import Excel</button>
		</form>
	</div>

	<form method="post" action="guestform">
		<div class="container-fluid py-4">
			<div class="row" id='guest_div'>

			</div>
		</div>
	</form>


	<script>
	document.addEventListener("DOMContentLoaded", function() {
		document.getElementById("reservationDate").addEventListener("change", function() {
			var reservationDate = this.value;
			loadGuestInfo(reservationDate);
		});

		function loadGuestInfo(reservationDate) {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState === 4 && this.status === 200) {
					console.log(this.responseText); // Log the response from the server

					var jsonData = JSON.parse(this.responseText);
					console.log(jsonData); // Log the parsed JSON data

					var table = "<table id='pvreports'>";
					var counter = 1; // Initialize the counter for the Control No. column

					// Add the Registration Date column header
					table += "<tr><th>Control No.</th><th>Firstname</th><th>Secondname</th><th>Middlename</th><th>Lastname</th><th>Age</th><th>Email</th><th>District</th><th>Locale</th><th>Gender</th><th>Reservation Date</th><th>Action</th></tr>";

					for (var i = 0; i < jsonData.length; i++) {
						var row = jsonData[i];

						table += "<tr>";

						for (var j = 0; j < 11; j++) {
								var columnKey = Object.keys(row)[j];
								table += "<td>" + row[columnKey] + "</td>";
						}

						// Add the Action button with an edit icon
						table += "<td style='text-align: center;'><button data-bs-target='#editadminguestmgmt' data-bs-toggle='modal' class='btn btn-primary' style='display: block; margin: 0 auto;'><i class='fas fa-edit'></i></button></td>";
						table += "</tr>";
					}

					table += "</table>";

					document.getElementById('guest_div').innerHTML = table;
				}
			};

			xhttp.open("GET", "load_guestinfo.php?reservationDate=" + encodeURIComponent(reservationDate), true);
			xhttp.send();
		}
	});
</script>








</script>


<script>

	document.getElementById("btnImport").addEventListener("submit", function(event) {
	event.preventDefault(); // Prevent form submission

	var fileInput = document.getElementById("file");
	if (fileInput.files.length === 0) {
		alert("Please select an input file.");
		return;
	}

		// Reset the table
		var table = document.getElementById("pvreports");
	while (table.firstChild) {
		table.removeChild(table.firstChild);
	}

	// Continue with form submission if the input file is not empty
	this.submit();
});

	document.getElementById("file").addEventListener("change", function() {
		var btnImport = document.getElementById("btnImport");
		btnImport.disabled = this.files.length === 0 ? true : false;
	});


    // Function to handle the change event of the reservation date
    function handleDateChange() {
        var reservationDate = document.getElementById('reservationDate');
        var fileInput = document.getElementById('file');
        var importButton = document.getElementById('btnImport');

        if (reservationDate.value !== "") {
            fileInput.disabled = false;
            importButton.disabled = false;
        } else {
            fileInput.disabled = true;
            importButton.disabled = true;
        }
    }

    // Attach the change event listener to the reservation date input
    document.getElementById('reservationDate').addEventListener('change', handleDateChange);
</script>

	<script>

		// Function to read and display the Excel file
		function handleFile(e) {
			e.preventDefault();
			var files = e.target.file.files;
			var f = files[0];
			var reader = new FileReader();

			reader.onload = (function (theFile) {
				return function (e) {
					var data = new Uint8Array(e.target.result);
					var workbook = XLSX.read(data, { type: 'array' });
					var sheetName = workbook.SheetNames[0];
					var worksheet = workbook.Sheets[sheetName];
					var jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1, range: 1 });

					var table = "<table id='pvreports'>";
					var counter = 1; // Initialize the counter for the Control No. column

					// Add the Registration Date column header
					table += "<tr><th>Control No.</th><th>Firstname</th><th>Secondname</th><th>Middlename</th><th>Lastname</th><th>Age</th><th>Email</th><th>District</th><th>Locale</th><th>Gender</th><th>Reservation Date</th></tr>";

					for (var i = 0; i < jsonData.length; i++) {
						var row = jsonData[i];
						table += "<tr>";

						for (var j = 0; j <= row.length; j++) {
							if (i === 0) { // Check for the 2nd row (header row)
							
							} else if (j === 0) { // Check for the 1st column (Column A)
								if (i >= 1) { // Start from the 3rd row
									var controlNo = ("00000" + counter).slice(-5); // Generate Control No. value
									table += "<td>" + controlNo + "</td>"; // Insert Control No. value in the 1st column
									counter++;
								} 
							} else if (j === 10) { // Check for Column J (index 9)
								if (i === 0) {
									table += "<td>Reservation Date</td>"; // Insert column name in the header row
								} else {
									var reservationDate = document.getElementById("reservationDate").value;
									table += "<td>" + reservationDate + "</td>"; // Insert Reservation Date value in the new column\
								}
							} else {
								table += "<td>" + row[j] + "</td>";
							}

							jsonData[i][0] = controlNo;
						}
						jsonData[i][10] = reservationDate;
						table += "</tr>";
					}

					table += "</table>";


					document.getElementById('guest_div').innerHTML = table;

					
                // Call the saveToDatabase function to insert the data into the database
                saveToDatabase(jsonData);
				};
			})(f);
			reader.readAsArrayBuffer(f);
		}

		// Event listener for form submission
		document.getElementById('importForm').addEventListener('submit', handleFile, false);

	   // Function to save data to the database
		   function saveToDatabase(data) {
        // Make an AJAX request to the server to save the data
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                console.log(this.responseText);
            }
        };
        xhttp.open("POST", "saveExcelData.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("data=" + encodeURIComponent(JSON.stringify(data)));
    }

	</script>
	<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
  </main>

   
</body>

</html>