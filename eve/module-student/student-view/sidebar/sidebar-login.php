<?php


      $username = $_SESSION['username'];
      $sql = "SELECT purpose,dateOfVisit,idType,guestcode FROM user_school_visit WHERE username ='$username'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $visitCount = mysqli_num_rows($result);

 ?>
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a  class="text-center" href="#">DASHBOARD</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">

                   <div class="user-info text-center w-100">
                       <span class="user-name"><strong><?php echo $_SESSION['fullName'] ?></strong></span>
                       <span class="user-name"><?php echo $_SESSION['username']; ?></span>
                       <span class="user-role">

                         <?php if ($_SESSION['permission'] == 1) {
                         echo "Administrator";
                        } else {
                         echo "Student";
                       }; ?></span>
                       <span class="user-status">
                           <i class="fa fa-circle"></i>
                           <span>Online</span>
                       </span>
                   </div>
               </div>
               <!-- sidebar-header  -->
               <div class="sidebar-search">
                   <div>
                       <div class="input-group">
                           <input type="text" class="form-control search-menu" placeholder="Search...">
                           <div class="input-group-append">
                               <span class="input-group-text">
                                   <i class="fa fa-search" aria-hidden="true"></i>
                               </span>
                           </div>
                       </div>
                   </div>
               </div>
               <!-- sidebar-search  -->
               <div class="sidebar-menu">

                   <ul class="" >
                       <li class="header-menu">
                           <span>General</span>
                       </li>
                       <li class="active">
                           <a href="student-home.php" id="homelink">
                               <i class="fas fa-home"></i>
                               <span>Home</span>
                           </a>
                       </li>
                       <li class="sidebar-dropdown">
                           <a href="#">
                             <i class="fas fa-walking"></i>
                               <span>Visit</span>
                               <?php

                               if ($visitCount == 0) {

                               } else {
                                 echo '<span class="badge badge-pill badge-warning">'.$visitCount.'</span>';

                               }

                                  ?>

                               <!-- <span class="badge badge-pill badge-danger">New</span> -->
                           </a>
                           <div class="sidebar-submenu">
                               <ul>
                                   <li>
                                       <a href="student-visit-register.php" id="visitlink">Visit School</a>
                                   </li>
                                   <li>
                                     <a href="student-view-visit.php">
                                         My Visits
                                          <?php
                                      if ($visitCount == 0) {
                                      }
                                      else {
                                        echo '<span class="badge badge-pill badge-warning">'.$visitCount.'</span>';
                                      }
                                         ?></a>

                                   </li>

                               </ul>
                           </div>
                       </li>

                       <li class="header-menu">
                           <span>Extra</span>
                       </li>
                       <li>
                           <a href="#">
                              <i class="fas fa-question-circle"></i>
                               <span>About</span>
                           </a>
                       </li>
                   </ul>
               </div>
               <!-- sidebar-menu  -->
           </div>
           <!-- sidebar-content  -->
           <div class="sidebar-footer">

           </div>
       </nav>
