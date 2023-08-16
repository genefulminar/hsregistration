<?php
// Include the QR code library
session_start();

if(session_status()== PHP_SESSION_NONE)
{

  header('Location: login.php');
  exit;
}

?>


<div class="card-body px-0 pb-2" >



	<form method="POST" id="guestsform">
		<!-- Search bar -->
		<div class="d-flex justify-content-end mb-3" style="width:250px;">
			<form action="" method="post" class="form-inline">
				<input type="text" name="search" class="form-control mr-sm-2" placeholder="Search by name">
				<button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
			</form>
		</div>
		<table id="pvreports">
					<thead>
						<tr>
							<th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
							<th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
							<th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Card</th>
							<th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Age</th>
							<th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">District</th>
							<th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-0">Locale</th>
							<th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-0">Finished Time</th>
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
							<td class="text-center" id=<?php echo "tdimage". $i; ?> style="display:none">
								<p class="text-xs font-weight-bold mb-0"><?php echo $row['Image']; ?></p>
							</td>
							<td class="text-center" style="width:380px;">
								<button style="height:50px;width:230px" type="button" class="btn btn-info" name="generate_card1" id="generate_card1" onclick="previewCard('/Hero_system/FOR PRINTING/<?php echo $row['Image']; ?>')">
								<div style="display: flex; justify-content: center;">
									<span>Preview Card</span>
									<i class="material-icons">lock_open</i>
								</div>
								</button>
								<a href="#" onclick="showImageModal('/Hero_system/FOR_PRINTING/<?php echo $row['Image']; ?>')">
									<img id="card-image" style="height:50px;margin-top:-15px;margin-left:10px;width:70px;" 
									src="/Hero_system/FOR_PRINTING/<?php echo $row['Image'] ? $row['Image'] : 'noimage.png'; ?>" alt="">
									</a>

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
								
								<a href="#editadminguestmgmt" name="editguest" class="edit" data-bs-toggle="modal" >
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



	<div class="no-records-found" id="no-records-found">
		<img src="images/no-data.png" alt="No Data Icon">
		No Records Found
	</div>
</div>


<script>

function showImageModal(src) {
  // Create modal element
  const modal = document.createElement("div");
  modal.classList.add("modal");

  // Create image element
  const image = document.createElement("img");
  image.src = src;
  image.style.maxWidth = "90%";
  image.style.maxHeight = "90%";
  image.style.display = "block";
  image.style.margin = "auto";

  // Create exit button element
  const exitBtn = document.createElement("button");
  exitBtn.innerText = "X";
  exitBtn.classList.add("modal-exit-btn");
  exitBtn.addEventListener("click", () => {
    document.body.removeChild(modal);
	location.reload();
  });

  // Add image and exit button to modal
  modal.appendChild(image);
  modal.appendChild(exitBtn);

  // Insert CSS rules
  const css = `
    .modal {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
      z-index: 9999;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .modal-exit-btn {
      position: absolute;
      top: 0;
      right: 0;
      padding: 5px;
      font-size: 1.2rem;
      color: white;
      background-color: rgba(0, 0, 0, 0.5);
      border: none;
      cursor: pointer;
    }
  `;

  const style = document.createElement("style");
  style.appendChild(document.createTextNode(css));
  document.head.appendChild(style);

  // Add modal to the body
  document.body.appendChild(modal);
}

</script>

<script>
	function previewCard(imageUrl) 
	{
		var previewImage = document.getElementById('card-image');
		previewImage.src = imageUrl;

		var qrcode = document.getElementById("qrcode");
		var printWindow = window.open();
		printWindow.document.write("<html><head><title>Card Print Preview</title><link rel='icon' type='image/x-icon' href='./images/kiosk.ico'><style>@page { size: landscape; }</style><style>body { background-image: url('" + imageUrl + "'); background-repeat: no-repeat; }</style></head><body>");
		printWindow.document.write("</body></html>");
		printWindow.print();
	}

</script>


<script>
  $(document).ready(function() {
    $("#search").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#pvreports tbody tr").filter(function() {
        $(this).toggle($(this).find("#tdname").text().toLowerCase().indexOf(value) > -1)
      });
    });
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



