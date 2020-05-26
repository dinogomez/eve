<?php

include '../process/connection.php';
include '../process/authenticate_token.php';  // Check user token

if(!isset($_SESSION['username'])){
  echo "<script type='text/javascript'>alert('Token Error: Incorrect Login');</script>";
  header('Location: ../index.php?authentication=invalid');
}

// logout
if(isset($_POST['logout'])){
 session_destroy();
 header('Location: ../index.php');
}


 ?>
 <?php

 //HEADER BLOCK
 require_once '../view/header-welcome-login.php';
 //NAVBAR BLOCK
 require_once '../view/navbar/nav-student.php';
 //SIDEBAR BLOCK
 require_once '../view/sidebar/sidebar-login.php';

 ?>
 <div class="jumbotron jumbotron-fluid mt-5">
   <div class="container p-5 jumbocontatiner shadow ">
 <div class="blog-post">
   <h2 class="blog-post-title text-center">Visit Registration</h2>
   <p class="blog-post-meta text-center">Please fill up the following up</p>
   <form class="regform" action="confirm-code.php" method="post">


         <div class="form-group">
           <label for="formGroupExampleInput2">Email</label>
           <input type="email" class="form-control"  name="email"placeholder="optional">
         </div>
         <div class="form-group">
           <label for="formGroupExampleInput2">Date of Visit</label>
           <input type="date" class="form-control" name="date" placeholder="">
         </div>
         <div class="form-group">
           <label for="formGroupExampleInput2">Purpose of Visit</label>
           <select class="custom-select" name="purpose">
             <option selected>Purpose of Visit</option>
             <option value="School Tour">School Tour</option>
             <option value="Registrar">Registrar</option>
             <option value="Event">Event</option>

           </select>
         </div>
         <div class="form-group">
           <label for="formGroupExampleInput2">Type of ID</label>
           <select class="custom-select" name="idgiven">
             <option selected>Type of ID</option>
             <option value="Goverment">Goverment</option>
             <option value="School ID">School ID</option>
             <option value="Company ID">Company ID</option>
             <option value="Driver License">Driver License</option>
           </select>
         </div>
         <div class="form-group">
           <label for="formGroupExampleInput2">Contact Number</label>
           <input type="text" class="form-control" name="contactnum" placeholder="optional">
         </div>


                 <div class="container mt-4">
                   <div class="row">
                     <div class="col text-center">
                       <input class="btn btn-custom-purple shadow" id="submit" type="submit" name="register" value="Confirm"style="width: 100px;">
                     </div>
                   </div>
                 </div>

   </form>
 </div>


    <div class="main-div">

    </div>


    <?php
    //MODAL BLOCK

    require_once '../view/modal/logout-modal.php';
    require_once '../process/logout.php';

    //FOOTER BLOCK
    require_once '../view/footer-main.php';

    ?>
