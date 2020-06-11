<?php
    //connection settings
    //we use the "$conn variable from connection.php"
    include_once '../library-process/connection.php';
    include_once '../library-process/login.php';
    include_once '../library-process/gencode.php';

   // registration variables, with mysqli to prevent SQL Attack

         $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
         $middlename = mysqli_real_escape_string($conn,$_POST['middlename']);
         $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
         $email = mysqli_real_escape_string($conn,$_POST['email']);
         $date = mysqli_real_escape_string($conn,$_POST['date']);
         // //we need to cast date variable because MYSQL Date format is YYY-MMM-DDD
         $date=date('Y-m-d',strtotime($date));
         $purpose = mysqli_real_escape_string($conn,$_POST['purpose']);
         $idgiven = mysqli_real_escape_string($conn,$_POST['idgiven']);
         $contactnum = mysqli_real_escape_string($conn,$_POST['contactnum']);
         @ ($personToMeet = mysqli_real_escape_string($conn, $_POST['personToMeet']));
         $generatekey = guest_keygen(6,2);

         // //we need to cast date variable because MYSQL Date format is YYY-MMM-DDD

         if(isset($_POST['register'])){
           $_SESSION['isRegistered'] = 1;
               }


                     if ($_SESSION['isRegistered'] != 1) {
                       header('Location: ../module-landing/landing.php');
                     }
      $_SESSION['isRegistered'] = 0;

      //echo "$generatekey";
      // login Function



 ?>

<?php

require_once 'module-guest-view/header/header-register.php';
require_once 'module-guest-view/navbar/nav-main.php';


?>


    <!-- nav -->

    <div class="jumbotron jumbotron-fluid mt-5 ">
      <div class="container p-5 shadow jumbocontatiner">
        <h1 class="display-4 text-center">WELCOME!</h1>
        <h5 class="card-subtitle mb-2 text-muted text-center">EVE</h5>

        <div class="code-border" id="logindiv">
          <div class="inside-border">
            <div class="login-text p-5 text-center inside-div">
                  <h1 class="header-code"></h1>
                      <h5 class=""><?php echo $firstname.' '.$middlename.' '.$lastname;?></h5>
                      <h5 class="mt-3"><?php echo $date;?></h5>
                      <h5 class="mt-3"><?php echo $purpose;?></h5>
                      <h5 class="mt-3"><?php echo $personToMeet;?></h5>
                      <h5 class="mt-3"><?php echo $email;?></h5>
                </div>
          </div>
          <div class="inside-border shadow border">
            <div class="login-text p-5  text-center inside-div">
                  <h2 class="header-code">YOUR CODE</h2>
            <span class="yellow">   <h1 id="code"><?php echo $generatekey ?></h1></span>
                  <h4>Valid for 1 transaction only</h4>
                </div>
          </div>
          <div class="info p-5 text-center info-note">
              Please save your CODE number and present it at the front desk
          </div>

          <form class="text-center form-code" action="guest-insert-process.php" method="post">
            <div class="hiddenform" id = "hide">
              <input type="hidden" name="firstname" value="<?php echo "$firstname" ?>">
              <input type="hidden" name="middlename" value="<?php echo "$middlename" ?>">
              <input type="hidden" name="lastname" value="<?php echo "$lastname" ?>">
              <input type="hidden" name="email" value="<?php echo "$email" ?>">
              <input type="hidden" name="date" value="<?php echo "$date" ?>">
              <input type="hidden" name="email" value="<?php echo "$email" ?>">
              <input type="hidden" name="purpose" value="<?php echo "$purpose" ?>">
              <input type="hidden" name="personToMeet" value="<?php echo "$personToMeet" ?>">
              <input type="hidden" name="idgiven" value="<?php echo "$idgiven" ?>">
              <input type="hidden" name="contactnum" value="<?php echo "$contactnum" ?>">
              <input type="hidden" name="generatekey" value="<?php echo "$generatekey" ?>">
            </div>
              <a class="btn btn-outline-warning btn-edit " id="confirm" href="javascript:history.go(-1)">Edit</a>

              <input class="btn btn-outline-warning" type="submit" id="confirm" name="confirm" value="Confirm">
          </form>
          <?php



           ?>

        </div>

      </div>
    </div>




    <!-- LOGIN MODAL -->
    <!-- Button trigger modal -->


    <!-- Modal -->
    <?php
    //MODAL BLOCK
    require_once 'module-guest-view/modal/login-modal.php';
    //FOOTER BLOCK
    require_once 'module-guest-view/footer/footer-main.php';

    ?>
