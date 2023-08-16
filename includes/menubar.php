<?php 
if (isset($_POST['logout_btn'])) {
  //Insert Log History
  $queryInsertLog = "INSERT INTO login_history(Username, DateLogin, StatusID) 
                     VALUES ('$myUsername', CURRENT_TIMESTAMP,0)";
                     mysqli_query($db, $queryInsertLog);
//Update Online Status
  $queryInsertLog = "UPDATE userslist SET OnlineStatus=0 WHERE username = '$myUsername' ";
  mysqli_query($db, $queryInsertLog);
                     header('location: log-in.php');
  }
?>
<head>
<style>


.skin-blue .main-header .navbar .nav .open>a, .skin-blue .main-header .navbar .nav .open>a:focus, .skin-blue .main-header .navbar .nav .open>a:hover, .skin-blue .main-header .navbar .nav>.active>a, .skin-blue .main-header .navbar .nav>li>a:active, .skin-blue .main-header .navbar .nav>li>a:focus, .skin-blue .main-header .navbar .nav>li>a:hover, .skin-blue .main-header .navbar .sidebar-toggle:hover {
    background: rgba(0,0,0,.1);
    color: #f6f6f6;
}

.skin-blue .main-header .navbar .nav>li>a {
    color: #fff;
}
.nav .open>a, .nav .open>a:focus, .nav .open>a:hover {
    background-color: #eee;
    border-color: #337ab7;
}
/* @media (min-width: 768px) */
.navbar-nav>li>a {
    padding-top: 15px;
    padding-bottom: 15px;
}
.navbar-nav>li>a {
    padding-top: 10px;
    padding-bottom: 10px;
    line-height: 20px;
}
.nav>li>a {
    position: relative;
    display: block;
    padding: 10px 15px;
}
a:link {
    color: var(--link);
}
.open>a {
    outline: 0;
}
a { 
    color: #3c8dbc;
}
a {
    color: #337ab7;
    text-decoration: none;
}
a {
    background-color: transparent;
}
* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
user agent stylesheet
a:-webkit-any-link {
    color: -webkit-link;
    cursor: pointer;
    text-decoration: underline;
}
user agent stylesheet
li {
    text-align: -webkit-match-parent;
}
.nav {
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}
user agent stylesheet
ul {
    list-style-type: disc;
}



.navbar-custom-menu>.navbar-nav>li {
    position: relative;
}

.navbar-nav>li {
    float: left;
}
.nav>li {
    position: relative;
    display: block;
}
.dropdown, .dropup {
    position: relative;
}

.navbar-nav>.user-menu .user-image {
    border-radius: 50%;
    float: left;
    height: 25px;
    margin-right: 10px;
    margin-top: -2px;
    width: 25px;
}

.nav>li>a>img {
    max-width: none;
}
img {
    vertical-align: middle;
}
img {
    border: 0;
}
</style>
</head>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form method="POST" action="index.php">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>

            <button type="submit" name="logout_btn" class="btn btn-success">Logout</button>

        </div>
        </form>
      </div>
    </div>
  </div>

<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
      
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
            <label id="menulabel1">Dashboard</label>
            </li>
          </ol>
          
          <label id="menulabel2"><h6 class="font-weight-bolder mb-0">Dashboard</h6></label>
          
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <!-- <label class="form-label">Type here...</label>
              <input type="text" class="form-control"> -->
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end" style="margin-right:40px;">
            <li class="dropdown user user-menu">
                 <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color: #232324;font-weight:bold;">
                 <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                   <span class="hidden-xs"><?php echo $_SESSION['SESS_USERNAME'] ?><strong class="caret"></strong></span>
                 </a>
                 <ul class="dropdown-menu" >
                   <!-- User image -->  
                     <li>
                          <a href="./profile.php" style="color: #232324;font-weight:normal;">
                             <i class="fas fa-user fa-fw" aria-hidden="true"></i>
                              View Your Profile
                         </a>
                     </li>
                     <li>
                         <a href="./changepassword.php" style="color: #232324;font-weight:normal;">
                             <i class="fas fa-asterisk fa-fw" aria-hidden="true"></i>
                              Change Password
                         </a>
                     </li>
                      <li class="divider"></li>

                     <li>
                      <a href="#" data-bs-toggle="modal" style="color: #232324;font-weight:normal;" data-bs-target="#logoutModal">
                          <i class="fas fa-user fa-fw" ></i> Log out
                      </a>
                     </li>
                 </ul>
               </li>

            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <!-- <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
