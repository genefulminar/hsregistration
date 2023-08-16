<?php
session_start();

if(session_status()== PHP_SESSION_NONE)
{

  header('Location: login.php');
  exit;
}

?>
<head>
<script src="ajax/hsusersmgmt_ajax.js"></script>



</head>

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



