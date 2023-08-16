<?php

session_start();

?>

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-faded-success" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="./index.php">
        <img src="images/kiosk.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">HS Registration</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">

      <ul class="navbar-nav">

    <?php
        $db = new db;
        
        $result=$db->getNavParent(1);
        
        while($rowAdmin = mysqli_fetch_array($result)) 
        {
    ?>
            <!-- TRANSACTION -->
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8"><?php echo $rowAdmin['NavigationName']; ?></h6>
            </li>

            <?php
             $resultList =$db->getNavList(1, $rowAdmin['ID'] );

             while($rowItem = mysqli_fetch_array($resultList)) {
                ?>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo $rowItem['PageName']; ?>.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10"><?php echo $rowItem['Icon']; ?></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo $rowItem['NavigationName']; ?></span>
                </a>
            </li>
                
        <?php
        }
        }
        ?>      
    
    </ul>
</div>
  
  </aside>