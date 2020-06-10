<?php



require_once '../library-process/connection.php';
require_once '../library-process/authenticate_token.php';  // Check user token
require_once '../library-process/gencode.php';


 ?>
 <?php

 //HEADER BLOCK
 require_once 'student-view/header/header-welcome-login.php';
 //NAVBAR BLOCK
 require_once 'student-view/navbar/nav-student.php';
 //SIDEBAR BLOCK

 require_once 'student-view/sidebar/sidebar-login.php';
/*┬─┬ ノ( ゜-゜ノ)
0 - God / It
1 - Event Manager
2 - Security
3 -User
*/
   // code...


 ?>

<!--
 <div class="blog-header">
   <div class="container">
     <h1 class="blog-title">The Bootstrap Blog</h1>
     <p class="lead blog-description">An example blog template built with Bootstrap.</p>
   </div>
 </div> -->
<script type="text/javascript">
$(document).ready(function(){
    $("#confirm-code-user").hide();

    $("#confirm-code-user").fadeIn("slow");


});
</script>
<div class="jumbotron jumbotron-fluid mt-5" id="confirm-code-user">
   <div class="container p-5 jumbocontatiner shadow ">
 <div class="blog-post text-center">
   <h2 class="blog-post-title ">CONFIRMATION</h2>
   <p class="blog-post-meta">Please verify details</p>
   <hr>
<?php
$username = mysqli_real_escape_string($conn,$_SESSION['username']);
$firstname = mysqli_real_escape_string($conn,$_SESSION['firstName']);
$middlename = mysqli_real_escape_string($conn,$_SESSION['middleName']);
$lastname = mysqli_real_escape_string($conn,$_SESSION['lastName']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$date = mysqli_real_escape_string($conn,$_POST['date']);
// //we need to cast date variable because MYSQL Date format is YYY-MMM-DDD
$date=date('Y-m-d',strtotime($date));
$purpose = mysqli_real_escape_string($conn,$_POST['purpose']);
$idgiven = mysqli_real_escape_string($conn,$_POST['idgiven']);
$contactnum = mysqli_real_escape_string($conn,$_POST['contactnum']);
@ ($personToMeet = mysqli_real_escape_string($conn, $_POST['personToMeet']));
$generatekey = guest_keygen(6,2);



 ?>

   <div class="" id="">
     <div class="">
       <div class="login-text p-5 text-center ">
             <h1 class="header-code"></h1>
                 <h5 class="mt-3"><?php echo $firstname.' '.$middlename.' '.$lastname;?></h5>
                 <h5 class="mt-3"><?php echo $date;?></h5>
                 <h5 class="mt-3"><?php echo $purpose;?></h5>
                 <h5 class="mt-3"><?php echo $personToMeet; ?></h5>
                 <h5 class="mt-3"><?php echo $email;?></h5>
           </div>
     </div>
     <div class=" shadow border">
       <div class="login-text p-5  text-center ">
             <h2 class="header-code">YOUR CODE</h2>
       <span class="yellow">   <h1 id="code"><?php echo $generatekey ?></h1></span>
             <h4>Valid for 1 transaction only</h4>
           </div>
     </div>
     <div class="info p-5 text-center info-note">
         Please save your CODE number and present it at the front desk
     </div>

     <form class="text-center"  action="student-process/process-user-visit.php" method="post">
       <div class="hiddenform" action= "hide">
         <input type="hidden" name="username" value="<?php echo "$username" ?>"/>
         <input type="hidden" name="firstname" value="<?php echo "$firstname" ?>"/>
         <input type="hidden" name="middlename" value="<?php echo "$middlename" ?>"/>
         <input type="hidden" name="lastname" value="<?php echo "$lastname" ?>"/>
         <input type="hidden" name="email" value="<?php echo "$email" ?>"/>
         <input type="hidden" name="date" value="<?php echo "$date" ?>"/>
         <input type="hidden" name="email" value="<?php echo "$email" ?>"/>
         <input type="hidden" name="purpose" value="<?php echo "$purpose" ?>"/>
         <input type="hidden" name="personToMeet" value="<?php echo "$personToMeet" ?>"/>
         <input type="hidden" name="idgiven" value="<?php echo "$idgiven" ?>"/>
         <input type="hidden" name="contactnum" value="<?php echo "$contactnum" ?>"/>
         <input type="hidden" name="generatekey" value="<?php echo "$generatekey" ?>"/>
       </div>


       <a class="btn btn-outline-warning btn-edit"  href="student-visit-register.php" >Edit</a>

         <input class="btn btn-outline-warning ml-1" type="submit" id="confirm-code" name="confirm-visit" value="Confirm">
     </form>

     <?php



      ?>

   </div>


 </div>
 </div>
 </div>


     <!-- <div class="col-sm-3 offset-sm-1 blog-sidebar">
       <div class="sidebar-module sidebar-module-inset">
         <h4>About</h4>
         <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
       </div>
       <div class="sidebar-module">
         <h4>Archives</h4>
         <ol class="list-unstyled">
           <li><a href="https://v4-alpha.getbootstrap.com/examples/blog/#">March 2014</a></li>
           <li><a href="https://v4-alpha.getbootstrap.com/examples/blog/#">February 2014</a></li>
           <li><a href="https://v4-alpha.getbootstrap.com/examples/blog/#">January 2014</a></li>
           <li><a href="https://v4-alpha.getbootstrap.com/examples/blog/#">December 2013</a></li>
           <li><a href="https://v4-alpha.getbootstrap.com/examples/blog/#">November 2013</a></li>
           <li><a href="https://v4-alpha.getbootstrap.com/examples/blog/#">October 2013</a></li>
           <li><a href="https://v4-alpha.getbootstrap.com/examples/blog/#">September 2013</a></li>
           <li><a href="https://v4-alpha.getbootstrap.com/examples/blog/#">August 2013</a></li>
           <li><a href="https://v4-alpha.getbootstrap.com/examples/blog/#">July 2013</a></li>
           <li><a href="https://v4-alpha.getbootstrap.com/examples/blog/#">June 2013</a></li>
           <li><a href="https://v4-alpha.getbootstrap.com/examples/blog/#">May 2013</a></li>
           <li><a href="https://v4-alpha.getbootstrap.com/examples/blog/#">April 2013</a></li>
         </ol>
       </div>
       <div class="sidebar-module">
         <h4>Elsewhere</h4>
         <ol class="list-unstyled">
           <li><a href="https://v4-alpha.getbootstrap.com/examples/blog/#">GitHub</a></li>
           <li><a href="https://v4-alpha.getbootstrap.com/examples/blog/#">Twitter</a></li>
           <li><a href="https://v4-alpha.getbootstrap.com/examples/blog/#">Facebook</a></li>
         </ol>
       </div>
     </div><!-- /.blog-sidebar -->


 <!-- /.container -->
<?php







 ?>


 <!-- <div class="jumbotron jumbotron-fluid mt-5 ">
   <div class="container p-5 jumbocontatiner shadow ">
     <h1 class="display-4 font-weight-bold text-center">What would you like to do<span class="purple">?</span></h1>

     <a href="gamechangerVisitSchoolRegister.php" class="btn btn-info button-shadow" style="width: 250px; height: 50px; text-align:center;">Visit School</a><br><br>


      <div class="display-card float right" style="margin-top: 17.5%; margin-bottom: 15%">
         <a href="gamechangerVisitSchoolRegister.php" class="btn btn-info button-shadow" style="width: 250px; height: 50px; text-align:center;">Visit School</a><br><br>
         <a href="#" class="btn btn-info button-shadow" style="width: 250px; height: 50px; text-align:center;">Events</a>
         <br><br><br><br>

         <form action="index.php">
            <input class="btn btn-danger" style="width: 125px;"type="submit" value="Logout" name="logout">
           </form>
     </div>

   </div>
 </div> -->





    <?php
    //MODAL BLOCK

    require_once 'student-view/modal/logout-modal.php';

    //FOOTER BLOCK
    require_once 'student-view/footer/footer-main.php';

    ?>
