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
 ?>

 <script type="text/javascript">
 $(document).ready(function(){
     $("#create").hide();

     $("#create").fadeIn("slow");


 });
 </script>
  <div class="container mt-5" id="create">
       <div class="container jumbocontatiner shadow p-5 createEvent" id="createEvent">
            <h2 class="blog-post-title text-center">Event Creation</h2>
            <p class="blog-post-meta text-center">Please fill up the following</p>
             <form class="regform" id="visit-form" action="#"  method="post">

               <div class="form-check">
         				<input type="checkbox" id="workshops" name="workshops" required>
         				<label class="form-check-label my-3 " for="workshops">Workshops</label>
         			</div>


             </form>

       </div>
  </div>
