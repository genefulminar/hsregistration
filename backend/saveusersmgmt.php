<?php

session_start();

require ('database.php');

if(count($_POST)>0){
	if($_POST['type']==1){
		$firstname = $_POST['addfirstname'];
		$lastname = $_POST['addlastname'];
		$phone = $_POST['addphone'];
		$username = $_POST['addusername'];
		$teamid = $_POST['pvteamid'];

		
		if($firstname!="")
		{
			$DbObj = new DbConnection();
			$sql = "INSERT INTO `users`(firstname, lastname, phone, username, password, team_id) 
								VALUES ('$firstname','$lastname','$phone','$username','12345','$teamid')";
			
			if (mysqli_query($DbObj->getdbconnect(), $sql)) {
				echo json_encode(array("statusCode"=>200));

			} 
			else {
				echo "Error: " . $sql . "<br>" . mysqli_error($DbObj->getdbconnect());
			}
			$last_id = mysqli_insert_id($DbObj->getdbconnect());
			mysqli_close($DbObj->getdbconnect());
		
			$group_id = $_POST['pvusertype'];
			$sqlgroup = "INSERT INTO `users_groups`(user_id, group_id) 
					VALUES ('$last_id','$group_id')";


			$userid =  $_SESSION['SESS_MEMBER_ID'];
				
			$currentDate = date("Y-m-d H:i:s");
		
			$DbObj1 = new DbConnection();
			$DbObj1->InsertActivity($pvid,$userid,$assetid,'add users list','pvsuguan/usersmgmt',$currentDate,$locationid,$vendorid, $create_at, $update_at);
		
		}

	}
}

if(count($_POST)>0)
{
	if($_POST['type']==2){

		$id=$_POST['id'];

		$firstname = $_POST['editfirstname'];
		$lastname = $_POST['editlastname'];
		$phone = $_POST['editphone'];
		$username = $_POST['editusername'];
		$teamid = $_POST['pvteamid'];

		$DbObj = new DbConnection();
		$sql = "UPDATE `users` SET `firstname`='$firstname',`lastname`='$lastname',
									`phone`='$phone',`username`='$username',
									`team_id`='$teamid' WHERE id=$id";
		if (mysqli_query($DbObj->getdbconnect(), $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($DbObj->getdbconnect());
		}
		mysqli_close($DbObj->getdbconnect());

		$userid =  $_SESSION['SESS_MEMBER_ID'];
		$currentDate = date("Y-m-d H:i:s");

		$DbObj1 = new DbConnection();
		$DbObj1->InsertActivity($pvid,$userid,$assetid,'update users list','pvsuguan/usersmgmt',$currentDate,$locationid,$vendorid, $create_at, $update_at);
	}
}


if(count($_POST)>0){
	if($_POST['type']==3){
		$id=$_POST['id'];
		$DbObj = new DbConnection();
		$sql = "DELETE FROM `users` WHERE id=$id ";
		if (mysqli_query($DbObj->getdbconnect(), $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($DbObj->getdbconnect());
		}
		mysqli_close($DbObj->getdbconnect());

		$userid =  $_SESSION['SESS_MEMBER_ID'];
		
		$currentDate = date("Y-m-d H:i:s");
	
		$DbObj1 = new DbConnection();
		$DbObj1->InsertActivity($pvid,$userid,$assetid,'delete users list','pvsuguan/usersmgmt',$currentDate,$locationid,$vendorid, $create_at, $update_at);
	
	}
}
?>