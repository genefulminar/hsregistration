<?php

class DbConnection
{
    public function getdbconnect(){

        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "HeroSystem";

        // $servername = "localhost";
        // $username = "snipeit";
        // $password = "M@sunur1n";
        // $dbname = "herosystem";

        $conn = mysqli_connect($servername, $username, $password,$dbname) or die("Opps some thing went wrong");

  
        return $conn;

    }
    
    
    public function getusers()
    {
        $query = "SELECT * FROM `users`";
        
        $dbconnect = new DbConnection();
        $myquery = mysqli_query($dbconnect->getdbconnect(), $query);

        $result = mysqli_num_rows($myquery);

        return $result;
    }

    public function getitemscheckinstatus($pvid)
    {

        $query = "SELECT DISTINCT COUNT(checkstatus)as cnt FROM pvitem p1 
                  WHERE p1.checkstatus='checkout' AND p1.pvid = ".$pvid." ";

        $dbconnect = new DbConnection();
        mysqli_autocommit($dbconnect->getdbconnect(),true);
        $myquery = mysqli_query($dbconnect->getdbconnect(), $query);
        $result = mysqli_num_rows($myquery);

        mysqli_commit($dbconnect->getdbconnect());
        
        return $result;

    }

    public function updatecheckinstatus($pvid)
    {

        $query = "UPDATE pvinfo SET checkinstatus = 2
                  WHERE pvid = ".$pvid." ";

        $DbObj1 = new DbConnection();
        mysqli_autocommit($DbObj1->getdbconnect(),true);
        if (mysqli_query($DbObj1->getdbconnect(), $query)) {
            echo json_encode(array("statusCode"=>200));
        } 
        else {
            echo "Error: " . $query . "<br>" . mysqli_error($DbObj1->getdbconnect());
        }
       
        mysqli_close($DbObj1->getdbconnect());

    }

    public function InsertActivity($pvid, $userid, $assetid, $action_type, $item_type, $action_date, $locationid, $vendorid, $create_at, $update_at)
    {
        $sql1 = "INSERT INTO `pvitem_logs`(pvid, userid, assetid, action_type,item_type,action_date,locationid,vendorid,created_at,updated_at)
								  VALUES ('$pvid','$userid','$assetid','$action_type','$item_type','$action_date','$locationid','$vendorid', '$create_at', '$update_at')";
	
		$DbObj1 = new DbConnection();
		if (mysqli_query($DbObj1->getdbconnect(), $sql1)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql1 . "<br>" . mysqli_error($DbObj1->getdbconnect());
		}
		mysqli_close($DbObj1->getdbconnect());

    }

    public function InsertLoginAttempts($username, $logindate, $useragent, $ipaddress, $success)
    {

        $sqlInsertLogin = "INSERT INTO `pvlogin_attempts`(username, created_at, user_agent, remote_ip, successful)
                                          VALUES ('$username', '$logindate', '$useragent', '$ipaddress', '$success') ";
        $DbObj = new DbConnection();
        if (mysqli_query($DbObj->getdbconnect(), $sqlInsertLogin)) {
            echo json_encode(array("statusCode"=>200));
        } 
        else {
            echo "Error: " . $sql1 . "<br>" . mysqli_error($DbObj->getdbconnect());
        }
        mysqli_close($DbObj->getdbconnect());
    }

}

?>