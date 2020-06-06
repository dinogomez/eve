<?php

require_once '../../library-process/connection.php';
require_once '../../library-process/authenticate_token_security.php';  // Check user token

 ?>
 <?php

 //HEADER BLOCK
 require_once 'admin-view/header/header-admin-security-login.php';
 //NAVBAR BLOCK
 require_once 'admin-view/navbar/nav-security.php';
 //SIDEBAR BLOCK

 require_once 'admin-view/sidebar/sidebar-login.php';

 ?>

<!--
 <div class="blog-header">
   <div class="container">
     <h1 class="blog-title">The Bootstrap Blog</h1>
     <p class="lead blog-description">An example blog template built with Bootstrap.</p>
   </div>
 </div> -->
<div class="row">
    <div class="col-2">

    </div>
    <div class="col-6">

      <div class="jumbotron mt-5" style="width:500px; ">
        <div class="container p-5 jumbocontatiner shadow">
          <div class="row">
            <div class="col-6 border-right">
              <h1 class="display-4 text-center"><?php echo date('j'); ?></h1>

            </div>
            <div class="col-6 ">

              <h1 class="display-4 text-center"><?php echo strtoupper(date(' M ')); ?></h1>

            </div>

          </div>
        </div>
      </div>

    </div>
    <div class="col-3">

            <div class="jumbotron mt-5" style="width:500px; ">
              <div class="container p-5 jumbocontatiner shadow text-center">
                  <div class="">
                    <h1 class="display-4 resized " id="clock"></h1>
                  </div>

              </div>
            </div>

    </div>
</div>

<div class="row">
  <div class="col-2">
  </div>

  <div class="col-3">
    <div class="jumbotron mt-5" style="width:500px; ">
      <div class="container p-5 jumbocontatiner shadow text-center">
          <div class="">
            <h1 class="display-4 resized " id="clock"></h1>
          </div>

      </div>
    </div>
  </div>
  <div class="col-3">
    <div class="jumbotron mt-5" style="width:500px; ">
      <div class="container p-5 jumbocontatiner shadow text-center">
          <div class="">
            <h1 class="display-4 resized " id="clock"></h1>
          </div>

      </div>
    </div>
  </div>
  <div class="col-3">
    <div class="jumbotron mt-5" style="width:500px; ">
      <div class="container p-5 jumbocontatiner shadow text-center">
          <div class="">
            <h1 class="display-4 resized " id="clock"></h1>
          </div>

      </div>
    </div>
  </div>

</div>

<div class="row">
  <div class="col-2">

  </div>
  <div class="col-5">
    <div class="jumbotron mt-5" style="width:650px; ">
      <div class="container p-5 jumbocontatiner shadow text-center">
          <div class="">
            <h1 class="display-4 resized " id="clock"></h1>
          </div>

      </div>
    </div>
  </div>
  <div class="col-5">
    <div class="jumbotron mt-5" style="width:650px; ">
      <div class="container p-5 jumbocontatiner shadow text-center">
          <div class="">
            <h1 class="display-4 resized " id="clock"></h1>
          </div>

      </div>
    </div>
  </div>

</div>

    <?php
    //MODAL BLOCK

    require_once 'admin-view/modal/logout-modal.php';

    //FOOTER BLOCK
    require_once 'admin-view/footer/footer-main.php';

    ?>
