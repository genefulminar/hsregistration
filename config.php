<?php
require_once 'backend/database.php';
error_reporting(0);


class db
{

    public function getNavParent($group)
    {
        $query = "SELECT * FROM `hsnavigationlist` nav
        INNER JOIN user_navlist p1 ON p1.navid = nav.ID
        WHERE p1.groupid= ".$group. " AND nav.NavType=0
        ORDER BY nav.ID ASC";
        $DbObj = new DbConnection();
        $result = mysqli_query($DbObj->getdbconnect(), $query);
        return $result;
    }

    public function getNavList($group, $parentid)
    {
        $query = "SELECT * FROM `hsnavigationlist` nav
        INNER JOIN user_navlist p1 ON p1.navid = nav.ID
        WHERE p1.groupid=".$group. " AND nav.NavType=1 AND nav.ParentID = ".$parentid. "
        ORDER BY nav.ID ASC";
        $DbObj = new DbConnection();
        $result = mysqli_query($DbObj->getdbconnect(), $query);
        return $result;
    }

    public function getIPAddress()
    {
        $query = "SELECT ipaddress FROM area_ip_info WHERE AssignArea=1";
    
        $DbObj = new DbConnection();
        $result = mysqli_query($DbObj->getdbconnect(), $query);
    
        if ($row = mysqli_fetch_assoc($result)) {
            return $row['ipaddress'];
        }
    
        return null; // or any default value you want to return if no row is found
    }
    
    public function updateIPAddress($newIPAddress)
    {
        $DbObj = new DbConnection();
        $connection = $DbObj->getdbconnect();

        $query = "UPDATE area_ip_info SET ipaddress = '$newIPAddress'";

        if (mysqli_query($connection, $query)) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }

    public function getIPAddressesWithAreaNames()
    {
        $query = "SELECT a1.ipaddress, a2.area_name FROM area_ip_info a1
                INNER JOIN area_name_info a2 ON a2.id = a1.AssignArea";
        
        $DbObj = new DbConnection();
        $result = mysqli_query($DbObj->getdbconnect(), $query);
        
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        
        return $data;
    }


    public function getGuestResult()
    {
        // $query= "SELECT ID, CONCAT(Firstname,' ', Lastname) As Name, Firstname, Lastname, Age, District, Locale, DateCreated FROM guestinfo 
        // WHERE guesttype = 1";

        $query= "SELECT ginfo.ID, CONCAT(ginfo.Firstname,' ', ginfo.Lastname) As Name, ginfo.Firstname, 
        ginfo.Lastname, ginfo.Age, ginfo.District, ginfo.Locale, ginfo.DateCreated, hinfo.Image, ginfo.guesttype
        FROM guestinfo ginfo
        LEFT OUTER JOIN heromaininfo hinfo on hinfo.GuestID = ginfo.ID
        WHERE guesttype = 1";

       //echo $query;
        $DbObj = new DbConnection();
        $result = mysqli_query($DbObj->getdbconnect(), $query);
        return $result;
    }

    
   
    public function getUsers($myUsername){

        if($myUsername == null || $myUsername == ""){
            $query = "SELECT * FROM users ";
        }
        else{
            $query = "SELECT * FROM users WHERE username='$myUsername' ";
        }
        //echo  $query;
        $DbObj = new DbConnection();
        $result = mysqli_query($DbObj->getdbconnect(), $query);
        return $result;
    }
}


?>