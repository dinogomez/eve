<?php
//connection settings
//we use the "$conn variable from connection.php"
include_once '../library-process/connection.php';
include_once '../library-process/login.php';


 //HEADER BLOCK
 require_once 'module-landing-view/header/header-main.php';
 //NAVBAR BLOCK
 require_once 'module-landing-view/navbar/nav-main.php';




 ?>







<!-- <nav class="navbar fixed-bottom navbar-dark  navbar-custom">
  <small class="navbar-brand mx-auto d-block text-center w-100 nav-bottom">©team-osto</small>

</nav> -->

<!-- nav -->

<div class="jumbotron jumbotron-fluid mt-5 ">
  <div class="container p-5 jumbocontatiner shadow ">
    <h1 class="display-4 text-center">.Changelog</h1>
    <h5 class="card-subtitle mb-2 text-muted text-center">v0.1.5</h5>
<div class="">
  <p class="lead text-center "><a class="sublink" href="https://github.com/keanconsolacion/otso-repository">https://github.com/keanconsolacion/otso-repository</a>.</p>
</div>

                    <div class="list-group list-css">
                  <div class="list-group-item list-group-item-action flex-column align-items-start shadow">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Theme and CSS</h5>
                    <small class="text-muted">6:48PM 5/5/20</small>
                  </div>
                  <p class="mb-1 list-text">+ Reworked theme and css from scratch.</p>
                  <small class="text-muted">Dino Paulo R Gomez</small>
                </div >

                <a href="#!" class="list-group-item list-group-item-action flex-column align-items-start shadow">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Student Login Module</h5>
                  <small class="text-muted">9:18PM 4/23/20</small>
                </div>
                <p class="mb-1 list-text">+ added gamechangerVisitSchoolRegister.Php</p>
                <p class="mb-1 list-text">+ added gamechangerVisitSchoolRegisterSuccess.Php</p>
                <p class="mb-1 list-text">+ added student-login-css & student-login-js</p>
                <p class="mb-1 list-text">+ reworked welcome.php</p>

                <small class="text-muted">Kean Consolacion</small>
                </a>

                <a href="#!" class="list-group-item list-group-item-action flex-column align-items-start shadow">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Reworked Backend Functionalities</h5>
                  <small class="text-muted">05:00PM 4/21/20</small>
                </div>
                <p class="mb-1 list-text">+ reworked connection module.</p>
                <p class="mb-1 list-text">+ reworked gamechanger-register.</p>
                <p class="mb-1 list-text">+ reworked gamechanger-login.</p>
                <p class="mb-1 list-text">+ reworked token generation.</p>
                <small class="text-muted">Dino Paulo R Gomez</small>
                </a>
                </div>

  </div>
</div>

<div class="jumbotron jumbotron-fluid ">
  <div class="container p-5 jumbocontatiner shadow ">
    <h1 class="display-4 text-center">.Changelog</h1>
    <h5 class="card-subtitle mb-2 text-muted text-center">v0.1.4</h5>

    <p class="lead text-center"><a class="sublink" href="https://github.com/keanconsolacion/otso-repository">https://github.com/keanconsolacion/otso-repository</a>.</p>

                    <div class="list-group list-css">
                  <div class="list-group-item list-group-item-action flex-column align-items-start shadow">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Guest Registration</h5>
                    <small class="text-muted">10:47AM 4/17/20</small>
                  </div>
                  <p class="mb-1 list-text">+ added register module. </p>
                  <p class="mb-1 list-text">+ added confirmation module. </p>
                  <p class="mb-1 list-text">+ added code generation module. </p>
                  <p class="mb-1 list-text">+ added tokens. </p>
                  <p class="mb-1 list-text">+ added Session </p>

                  <small class="text-muted">Dino Paulo R Gomez</small>
                </div >



  </div>
</div>


<!-- LOGIN MODAL -->
<!-- Button trigger modal -->


<!-- Modal -->








<?php
//MODAL BLOCK
require_once 'module-landing-view/modal/login-modal.php';
//FOOTER BLOCK
require_once 'module-landing-view/footer/footer-main.php';

?>
