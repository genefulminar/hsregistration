<?php

// $mysqli_hostname = "localhost";
// $mysqli_user = "snipeit";
// $mysqli_password = "M@sunur1n";
// $mysqli_database = "pmd_dashboard";



$mysqli_hostname = "127.0.0.1";
$mysqli_user = "root";
$mysqli_password = "";
$mysqli_database = "herosystem";

$conn = mysqli_connect($mysqli_hostname, $mysqli_user, $mysqli_password,$mysqli_database) 
or die("Opps some thing went wrong");
//mysqli_select_db($mysqli_database, $bd) or die("Opps some thing went wrong");
?>