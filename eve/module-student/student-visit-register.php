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
    $("#register").hide();

    $("#register").fadeIn("slow");


});
</script>
 <div class="container mt-5" id="register">





     <div class="container jumbocontatiner shadow p-5 visit" id="visit">
     <h2 class="blog-post-title text-center">Visit Registration</h2>
     <p class="blog-post-meta text-center">Please fill up the following</p>
     <form class="regform" id="visit-form" action="student-visit-confirm.php"  method="post">



           <div class="form-group">
             <label for="formGroupExampleInput2">Date of Visit</label>
             <input type="date" class="form-control" name="date" placeholder=""/>
           </div>
           <div class="form-group">
             <label for="formGroupExampleInput2">Purpose of Visit</label>
             <select class="custom-select" name="purpose">
               <option selected>Purpose of Visit</option>
               <option value="School Tour">School Tour</option>
               <option value="Registrar">Registrar</option>
               <option value="Event">Event</option>
               <option value="Event">Person to Visit</option>

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
             <label for="formGroupExampleInput2">Email</label>
             <input type="email" class="form-control"  name="email"placeholder="Optional"/>
           </div>
           <div class="form-group">
             <label for="formGroupExampleInput2">Contanct Number</label>
             <input type="text" class="form-control" name="contactnum" placeholder="Optional"/>
           </div>


                   <div class="container mt-4">
                     <div class="row">
                       <div class="col text-center">
                         <input class="btn btn-warning shadow" id="submit-visit" type="submit" name="register" value="Confirm"style="width: 100px;"/>
                       </div>
                     </div>
                   </div>

     </form>

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
