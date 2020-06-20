<?php
  @($username = $_SESSION['username']);
  @($sql = "SELECT permission,firstName,middleName,lastName FROM users WHERE username ='$username'");
  @($result = mysqli_query($conn,$sql));
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
<!-- PAGE WRAPPER -->
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#"><i class="fas fa-bars"></i></a>
  <nav id="sidebar" class="sidebar-wrapper">

    <!-- SIDEBAR TITLE -->
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#" class="text-center">DASHBOARD</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>

      <!-- SIDEBAR HEADER  -->
      <div class="sidebar-header">
        <div class="user-pic">

        </div>
        <div class="user-info">
          <span class="user-name"><strong><?php echo @($_SESSION['fullName']) ?></strong></span>
          <span class="user-role">

            <?php if ($_SESSION['permission'] == 2) {
            echo "Administrator";
           } else {
            echo "Student";
          }; ?></span>
          <!-- <span class="user-status">
              <i class="fa fa-circle"></i>
              <span>Online</span>
          </span> -->
          <span class="user-status"><i class="fa fa-circle"></i><span>Online</span></span>
        </div>
      </div>

      <!-- SIDEBAR SEARCH  -->
      <!-- <div class="sidebar-search">
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
      </div> -->

      <!-- SIDEBAR GENERAL  -->
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>
          <!-- <li>
            <a href="admin-security-home.php">
              <i class="fa fa-home"></i>
              <span>Home</span>
            </a>
          </li> -->

          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-book"></i>
              <span>Dashboard</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="admin-security-dashboard.php">View Checked-in Visitors</a>
                </li>
                <li>
                  <a href="admin-security-dashboard-pending.php">View Pending Visitors</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-book"></i>
              <span>Visitors</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="admin-security-visitors-student.php">View Student Visitors</a>
                </li>
                <li>
                  <a href="admin-security-visitors-guest.php">View Guest Visitors</a>
                </li>
                <li>
                  <a href="admin-view-all-visitors.php">View All Visitors</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-book"></i>
              <span>History</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="admin-security-visitors-history.php">View Past Visitors</a>
                </li>
                <li>
                  <a href="admin-security-activity-log.php">Activity Log</a>
                </li>
              </ul>
            </div>
          </li>

          <!-- SIDEBAR EXTRA -->
          <li class="header-menu">
            <span>Extra</span>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-question-circle"></i>
              <span>About</span>
            </a>
          </li>

        </ul>
      </div>

    </div>
  </nav>
