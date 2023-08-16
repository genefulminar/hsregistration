<?php
// Include the QR code library
session_start();

if(session_status()== PHP_SESSION_NONE)
{

  header('Location: login.php');
  exit;
}

?>

<script type="text/javascript">

	function generateQRCode(button)
	{
	
	document.getElementById("qrcode").innerHTML = "";

	// Get a reference to the button element
	var printqrBtn = document.getElementById("printqr");

	// Set its display style property to "block"
	printqrBtn.style.display = "block";


	var table = document.getElementById("pvreports");
	for (let i = 1; i < table.rows.length; i++) 
	{

		if(button.id == "generate_qr" + i)
		{
			var tdid = document.getElementById("tdid" + i);
			var tdname = document.getElementById("tdname" + i);
			var tdage = document.getElementById("tdage" + i);
			var tddistrict = document.getElementById("tddistrict" + i);
			var tdlocale = document.getElementById("tdlocale" + i);
			var tdcreateddate = document.getElementById("tdcreateddate" + i);

			var id = tdid.innerText.trim();
			var firstName = tdname.innerText.trim();
			var age = tdage.innerText.trim();
			var district = tddistrict.innerText.trim();
			var locale = tdlocale.innerText.trim();
			var createddate = tdcreateddate.innerText.trim();
			
			let randomText = '';
			const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

			for(let i = 0; i < 10; i++){
			randomText += characters.charAt(Math.floor(Math.random() * characters.length));
			}

			var combinedString = "HS_" + randomText + "_" + id;


			var qrCode = new QRCode(document.getElementById("qrcode"), {
				text: combinedString,
				width: 160,
				height: 160,
				colorDark : "#000000",
				colorLight : "#ffffff",
				correctLevel : QRCode.CorrectLevel.H
			});
		}
	}
	}
	
</script>
    
<div class="card-body px-0 pb-2" >
	<form method="POST" id="guestsform">
		<table id="pvreports">
					<thead>
						<tr>
							<th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
							<th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">First Name</th>
							<th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">QR Code</th>
							<th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Age</th>
							<th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">District</th>
							<th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-0">Locale</th>
							<th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-0">Created Date</th>
							<th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-0" id="thaction">Action</th>
						</tr>
					</thead>
				<tbody>
				
				<?php
					require('config.php');
					$db = new db;
					
					$result=$db->getGuestResult();

					if($result->num_rows > 0)
					{
					$i=1;
					while($row = mysqli_fetch_array($result)) {
					?>
					<tr>
							
							<td class="text-center"><?php echo $i; ?>
							</td>
							
							<td class="text-center" id=<?php echo "tdid" .$i ?> style="display:none">
								<p class="text-xs font-weight-bold mb-0"><?php echo $row['ID']; ?></p>
							</td>

							<td class="text-center" id=<?php echo "tdname" .$i ?>>
								<p class="text-xs font-weight-bold mb-0"><?php echo $row['Name']; ?></p>
							</td>
							<td class="text-center">
								<button type="button" onclick="generateQRCode(this)" class="btn btn-success" name=<?php echo 'generate_qr' . $i ?> id=<?php echo 'generate_qr' . $i ?>>
								
								<span>Generate QR Code</span>
									<i class="material-icons">qr_code_2</i>
								</button>
								
							</td>
							<td class="text-center" id=<?php echo "tdage" .$i ?>>
								<p class="text-xs font-weight-bold mb-0"><?php echo $row['Age']; ?></p>
							</td>
							<td class="text-center" id=<?php echo "tddistrict" .$i ?>>
								<p class="text-xs font-weight-bold mb-0"><?php echo $row['District']; ?></p>
							</td>
							<td class="text-center" id=<?php echo "tdlocale" .$i ?>>
								<p class="text-xs font-weight-bold mb-0"><?php echo $row['Locale']; ?></p>
							</td>
							<td class="text-center" id=<?php echo "tdcreateddate" .$i ?>>
								<p class="text-xs font-weight-bold mb-0"><?php echo $row['DateCreated']; ?></p>
							</td>
							<td style="width:50px" id=<?php echo "tdaction" .$i ?>>
								<div class="d-flex align-items-center justify-content-center">
								
								<a href="#editadminguestmgmt" name="editguest" data-bs-toggle="modal" class="edit"  >
									<i class="material-icons update" 
										data-bs-toggle="tooltip" 
										data-id="<?php echo $row["ID"]; ?>"
										data-firstname="<?php echo $row["Firstname"]; ?>"
										data-lastname="<?php echo $row["Lastname"]; ?>"
										data-Age="<?php echo $row["Age"]; ?>"
										data-Locale="<?php echo $row["Locale"]; ?>"
										data-District="<?php echo $row["District"]; ?>"
										data-guesttype="<?php echo $row["guesttype"]; ?>"
										title="Edit">&#xE254;</i>
								</a>
								
								<a href="#deleteguestModal" class="delete" data-id="<?php echo $row["ID"]; ?>" data-bs-toggle="modal">
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

	<h3>Generated QR Code: </h3>

	<div id="qrcode" style="margin-top:20px;margin-bottom:20px;margin-left:70px"></div>

	<button type="button" style="display:none;margin-left:70px" class="btn btn-info" name="printqr" id="printqr">
									<span>Print QR Code</span>
									<i class="material-icons">qr_code_2</i>
								</button>


	<div class="no-records-found" id="no-records-found">
		<img src="images/no-data.png" alt="No Data Icon">
		No Records Found
	</div>
</div>



<script>
	// Get a reference to the printqr button
	var printqrBtn = document.getElementById("printqr");

	// Add a click event listener to the button
	printqrBtn.addEventListener("click", function() {
	// Get a reference to the QR code element
	var qrcode = document.getElementById("qrcode");

	// Open a new window with the QR code image
	var printWindow = window.open();
	printWindow.document.write("<html><head><title>QR Code Print Preview</title><style>body { background-image: url(./images/card_qr.png);background-repeat: no-repeat; }</style></head><body>");
	printWindow.document.write('<div style="margin-top: 175px;margin-left:60px;">' + qrcode.innerHTML + '</div>');
	//   printWindow.document.write('<img src="./images/card_qr.png" width: 300px; margin: 0 auto; display: block;">');
	printWindow.document.write("</body></html>");

	// Print the preview window
	printWindow.print();
	});

</script>
<script>

	// Get the table body element
	var tableBody = document.getElementById("pvreports");
	//alert(tableBody.rows.length);
	
	// Check if the table has no rows
	if (tableBody.rows.length == 1) 
	{
		// If the table is empty, show the "No Records Found" message
		var noRecordsFound = document.querySelector("#no-records-found");
		noRecordsFound.style.display = "block";
	}
	
</script>



