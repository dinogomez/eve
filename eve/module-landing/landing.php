<?php
    //connection settings
    //we use the "$conn variable from connection.php"
   include_once '../library-process/connection.php';
   include_once '../library-process/login.php';

   $_SESSION['isRegistered'] = 0;

    //HEADER BLOCK
    require_once 'module-landing-view/header/header-main.php';
    //NAVBAR BLOCK
    require_once 'module-landing-view/navbar/nav-main.php';


    //CHECK LOGIN
    if ($_SESSION['login'] == 0) {
    }elseif ($_SESSION['login'] == 1 AND $_SESSION['permission'] ==4){
      header('Location:../module-student/student-home.php');
    } elseif ($_SESSION['login'] == 1 AND $_SESSION['permission'] ==2){
      header('Location:../module-admin/admin-security/admin-security-dashboard.php?');
    }

    include_once 'container-what-is-eve.php';
    include_once 'container-our-system.php';

      //MODAL BLOCK
    require_once 'module-landing-view/modal/login-modal.php';
      //FOOTER BLOCK
    require_once 'module-landing-view/footer/footer-main.php';

?>
