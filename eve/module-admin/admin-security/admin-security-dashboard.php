<?php
  require_once 'check-security.php';
  require_once('admin-security-process/process-lobby.php');


    //HEADER
  require_once 'admin-view/header/header-welcome-login.php';
  //NAVBAR
  require_once 'admin-view/navbar/navbar-admin.php';
  //SIDEBAR
  require_once 'admin-view/sidebar/sidebar-admin.php';
  //PAGE CONTENT
  require_once 'admin-view/content/content-admin-security-dashboard.php';
  //LOGOUT MODAL
  require_once 'admin-view/modal/logout-modal.php';
  //FOOTER
  require_once 'admin-view/footer/footer-main.php';

  if(@isset($_GET['onCheckOut'])){
    checkOutVisitor($_GET['onCheckOut']);
  }
  if(@isset($_GET['onCheckIn'])){
    checkInVisitor($_GET['onCheckIn'], $_GET['type']);
  }
 ?>
