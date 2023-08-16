<?php

session_start();

require ('database.php');

if(count($_POST)>0){
	if($_POST['type']==1){
		$firstname = $_POST['addfirstname'];
		$lastname = $_POST['addlastname'];
		$age = $_POST['addage'];
		$locale = $_POST['addlocale'];
		$district = $_POST['adddistrict'];
		$guesttype = 1;

		if($firstname!="")
		{
			$DbObj = new DbConnection();
			$sql = "INSERT INTO `guestinfo`(Firstname, Lastname, Age, Locale, District, guesttype) 
					VALUES ('$firstname', '$lastname', '$age', '$locale', '$district', '$guesttype')";
			
			if (mysqli_query($DbObj->getdbconnect(), $sql)) {
				echo json_encode(array("statusCode"=>200));
			} 
			else {
				echo "Error: " . $sql . "<br>" . mysqli_error($DbObj->getdbconnect());
			}
		
			// $DbObj1 = new DbConnection();
			// $DbObj1->InsertActivity($pvid,$userid,$assetid,'add guest','registration',$currentDate,$locationid,$vendorid, $create_at, $update_at);
		}

	}
}

if(count($_POST)>0){
	if($_POST['type']==2){

		$id=$_POST['id'];

		$firstname = $_POST['editfirstname'];
		$lastname = $_POST['editsurname'];
		$age = $_POST['editage'];
		$district = $_POST['editdistrict'];
		$locale = $_POST['editlocale'];
		$guesttype = $_POST['guesttype_edit'];

		$DbObj = new DbConnection();
		$sql = "UPDATE `guestinfo` SET `Firstname`='$firstname',`Lastname`='$lastname',
						`Age`='$age',`District`='$district',
						`Locale`='$locale', guesttype='$guesttype' WHERE ID=$id";
		if (mysqli_query($DbObj->getdbconnect(), $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($DbObj->getdbconnect());
		}
		mysqli_close($DbObj->getdbconnect());

		//$DbObj1 = new DbConnection();
		//$DbObj1->InsertActivity($pvid,$userid,$assetid,'update users list','pvsuguan/usersmgmt',$currentDate,$locationid,$vendorid, $create_at, $update_at);
	}
}

if (count($_POST) > 0) {

    if ($_POST['type'] == 3) {

		$id = $_POST['id'];
		$DbObj = new DbConnection();
		$sql = "DELETE FROM `guestinfo` WHERE ID = $id";
		if (mysqli_query($DbObj->getdbconnect(), $sql)) {
			echo json_encode(array("statusCode" => 200));
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($DbObj->getdbconnect());
		}
		mysqli_close($DbObj->getdbconnect());
	
		$userid = $_SESSION['SESS_MEMBER_ID'];
	
		$currentDate = date("Y-m-d H:i:s");
	
		$DbObj1 = new DbConnection();
		$DbObj1->InsertActivity($pvid, $userid, $assetid, 'delete users list', 'pvsuguan/usersmgmt', $currentDate, $locationid, $vendorid, $create_at, $update_at);
	
    }
}

?>