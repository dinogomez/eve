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
  }
});
</script>
 <div class="container mt-5" id="register">
     <div class="container jumbocontatiner shadow p-5 visit tableVisit" id="visit">
     <h2 class="blog-post-title text-center" style="color:#038cfc">Active Visit Registration</h2>
     <p class="blog-post-meta text-center">School Visitations you have lined up.</p>
     <table class="table table-bordered">
       <thead>
         <tr>
           <th>#</th>
           <th>Visit Purpose</th>
           <th>Date of Visit</th>
           <th>ID Type</th>
           <th>Visit Code</th>
           <th style='text-align: center'>Operation</th>

         </tr>
       </thead>
       <tbody>
         <?php
         $username = $_SESSION['username'];
         $sql = "SELECT purpose,dateOfVisit,idType,guestcode FROM user_school_visit WHERE username ='$username'";

         //mysqli_query is a mysql function that sends a query request to the database
         //it requires two parameters,
         //@1. the mysqli_connect status which is stored in $conn variable found on "connections.php".
         //@2. the sql statement  which is a string stored on the $sql variable
         $result = mysqli_query($conn,$sql);
         //the query result is stored in the $result variable.

         //The fetch_array() / mysqli_fetch_array() function fetches a result row as an associative array, a numeric array,.
         //it requires the query result status and the MYSQLI_ASSOC "MYSQLI_ASSOC = Array items will use the column name as an index key."
         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
         //after fetching row it returns an integer value in which identifies how many matches were found.
         //a match of "1" means a record that matches the input parameter is present marking a correct login
         $count = mysqli_num_rows($result);

         $rownum = 1;
         //retrieving name from database for session storage
         $result = mysqli_query($conn,$sql);

         if($count == 0){
          echo "<tr>
                  <td colspan = '6'>
                    <br>
                    <h4><center>You don't have any school visitations active yet.</center></h4>
                    <br>
                  </td>";
         }

         while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
           //setting values
           $dateOfVisit = $row['dateOfVisit'];

           if(date("Y-m-d") <= $dateOfVisit){
           echo "<tr>
           <td>" . $rownum . "</td>
           <td>" . $row['purpose'] . "</td>
           <td>" . $dateOfVisit . "</td>
           <td>" . $row['idType'] . "</td>
           <td>" . $row['guestcode'] . "</td>
           <td style='text-align: center'>";
           // echo "<a class='btn btn-danger ml-1'><i class='fas fa-edit black'></i></a>"; //REMOVE EDIT BUTTON
           echo "<a class='btn btn-warning' href='student-process/process-user-visit-delete-row.php?id=".$row['guestcode']."')'>
                    <i class='fas fa-trash-alt black'> </i></a>";
           echo "</td>
              </tr>";
          }
          $rownum++;
        }
          ?>
       </tbody>
     </table>
   </div>
 </div>
 <br>

 <div class="container mt-5" id="register">
     <div class="container jumbocontatiner shadow p-5 visit tableVisit" id="visit">
     <h2 class="blog-post-title text-center" style="color:#038cfc">School Visit History</h2>
     <p class="blog-post-meta text-center">List of your school visitations in the past.</p>
     <table class="table table-bordered">
       <thead>
         <tr>
           <th>#</th>
           <th>Visit Purpose</th>
           <th>Date of Visit</th>
           <th>ID Type</th>
           <th>Visit Code</th>

         </tr>
       </thead>
       <tbody>
         <?php
         $username = $_SESSION['username'];
         $sql = "SELECT purpose,dateOfVisit,idType,guestcode FROM user_school_visit WHERE username ='$username'";
         //mysqli_query is a mysql function that sends a query request to the database
         //it requires two parameters,
         //@1. the mysqli_connect status which is stored in $conn variable found on "connections.php".
         //@2. the sql statement  which is a string stored on the $sql variable
         $result = mysqli_query($conn,$sql);
         //the query result is stored in the $result variable.
         //The fetch_array() / mysqli_fetch_array() function fetches a result row as an associative array, a numeric array,.
         //it requires the query result status and the MYSQLI_ASSOC "MYSQLI_ASSOC = Array items will use the column name as an index key."
         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
         //after fetching row it returns an integer value in which identifies how many matches were found.
         //a match of "1" means a record that matches the input parameter is present marking a correct login
         $count = mysqli_num_rows($result);
         $rownum = 1;
         //retrieving name from database for session storage
         $result = mysqli_query($conn,$sql);
         if($count == 0){
          echo "<tr>
                  <td colspan = '5'>
                    <br>
                    <h4><center>You don't have any history.</center></h4>
                    <br>
                  </td>";
         }
         while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
           //setting values
           $dateOfVisit = $row['dateOfVisit'];
           if($dateOfVisit > date("Y-m-d")){
             echo "<tr>
             <td>" . $rownum . "</td>
             <td>" . $row['purpose'] . "</td>
             <td>" . $dateOfVisit . "</td>
             <td>" . $row['idType'] . "</td>
             <td>" . $row['guestcode'] . "</td>";
             echo "</tr>";
           }
        }
          $rownum++;
          ?>
       </tbody>
     </table>
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
