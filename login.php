<?php

//Start session
session_start();

if(session_status()== PHP_SESSION_NONE)
{

header('Location: login.php');
exit;
}

//Include database connection details
require('db.php');


if (isset($_POST['submit'])) 
{
    //Array to store validation errors
    $errmsg_arr = array();
    
    //Validation error flag
    $errflag = false;
    
    //Sanitize the POST values
    $username = ($_POST['username']);
    $password = ($_POST['password']);

    //Input Validations
    if($username == '') 
    {
        $errmsg_arr[] = 'Username missing';
        $errflag = true;
    }
    if($password == '') {
        $errmsg_arr[] = 'Password missing';
        $errflag = true;
    }
    
    //If there are input validations, redirect back to the login form
    if($errflag) 
    {
        $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
        session_write_close();
        header("location: index.php");
        exit();
    }

    $mypassword = md5($password);

    //Create query
    $qry="SELECT u.id as userid, u.username, u.password, u.fullname, 
         pg.name, u.groupid FROM users u
        LEFT JOIN permission_groups pg ON pg.id = u.groupid
        WHERE username='$username' AND password='$mypassword' ";
    $result=mysqli_query($conn,$qry);

    echo $qry;
    //Check whether the query was successful or not
    if($result!="") 
    {
        if(mysqli_num_rows($result) > 0) {
            //Login Successful
            session_regenerate_id();

            $member = mysqli_fetch_assoc($result);

            $_SESSION['SESS_MEMBER_ID'] = $member['userid'];
            $_SESSION['SESS_USERNAME'] = $member['username'];
            $_SESSION['SESS_PASSSWORD'] = $member['password'];
            // $_SESSION['SESS_FIRST_NAME'] = $member['firstname'];
            // $_SESSION['SESS_LAST_NAME'] = $member['lastname'];
            $_SESSION['SESS_GROUP_ID'] = $member['groupid'];
            $_SESSION['SESS_GROUP_NAME'] = $member['name'];
            //$_SESSION['SESS_TEAM_ID'] = $member['team_id'];
            
            $_SESSION['USERNAME'] = $username;

            $myUsername = $_SESSION['SESS_USERNAME'];

             //Insert Login attempts
            //  $mysqli_hostname = "localhost";
            //  $mysqli_user = "snipeit";
            //  $mysqli_password = "M@sunur1n";
            //  $mysqli_database = "herosystem";

             $mysqli_hostname = "127.0.0.1";
             $mysqli_user = "root";
             $mysqli_password = "";
             $mysqli_database = "herosystem";

             $conn = mysqli_connect($mysqli_hostname, $mysqli_user, $mysqli_password,$mysqli_database);

             $logindate = date("Y-m-d H:i:s");
             $user_agent = $_SERVER['HTTP_USER_AGENT'];
             $ip_address = getHostByName(getHostName());
             
             $sqlInsertLogin = "INSERT INTO `login_attempts`(username, created_at, user_agent, remote_ip, successful)
                                                     VALUES ('$myUsername', '$logindate', '$user_agent', '$ip_address', 1)";
           
             if (mysqli_query($conn, $sqlInsertLogin)) {
             echo json_encode(array("statusCode"=>200));
             } 
             else {
             echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
             }
             mysqli_close($conn);
             //end

             session_write_close();
             header("location: registration.php");
             exit();

        }else {
            //Login failed
            $errmsg_arr[] = 'user name and password not found' . $qry;;
            $errflag = true;
            
            if($errflag) 
            {
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                session_write_close();
                header("location: index.php");
                exit();
            }
        }
    }
    else {
    die("Query failedasdas");
    }

}
?>
