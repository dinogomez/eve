<?php
require_once '../../library-process/connection.php';

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="icon" href="../../library-resource/img/pol_thumbnail.png">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
    <div class="container maindiv">

      <div class="card shadow mt-5 ">
        <div class="card-header">
          <img src="../../library-resource/img/pol_thumbnail.png" alt="404" class="img-thumbnail rounded float-left mr-2" style="width:100px; height:100px;">

          <div class="card-title ml-5 mt-3">
            <h2 class="d-inline mt-5"><span style="color:red">DEBUG</span> - Reset Password </h2>


            <a class="d-inline float-right font-weight-bold btn btn-primary mt-3" href="../index.php">Return</a>

          </div>

          <h6 class="card-subtitle mb-2 ml-3 text-muted small fontsub">@POL - use this reset a password</h6>

         </div>
         <div class="jumbotron">
           <h6 style="color:Red">DEBUG</h6>
           <hr>

           <h6 class="small "style="color:Red">Please edit connections.php N-Var to change connection.</h6>

           <span >Connection Used: </span><br>
             <span class="ml-3">- <span style="color:green"><?php echo $_SERVER['SERVER_ADDR']; ?></span></span><br>
             <span class="ml-3">- <span style="color:green"><?php echo $dbuser; ?></span></span><br>
             <span class="ml-3">- <span style="color:green"><?php echo $dbpass; ?></span></span><br>
             <span class="ml-3">- <span style="color:green"><?php echo $dbname; ?></span></span><br>
         </div>
        <div class="card-body">
          <!-- <div class="row">
              <div class="col-sm-3">
                <p class="mt-1" style="color:red">Use Default Connection:</p>
              </div>
              <div class="" style="margin-left: -50px; margin-bottom: 5px;">
                <input class="btn btn-danger mb-1"type="submit" name="connectnormal" value="connect">

              </div>
          </div>
          <div class="row">
              <div class="col-sm-3">
                <p class="mt-1" style="color:red">Adjust Connection Settings:</p>
              </div>
              <div class="" style="margin-left: -50px; margin-bottom: 5px;">
                  <input type="text" name="" value="" placeholder="db_name">
                  <input type="text" name="" value="" placeholder="db_user">
                  <input type="text" name="" value="" placeholder="db_pass">
                  <input type="text" name="" value="" placeholder="table_name">
                  <input class="btn btn-danger mb-1"type="submit" name="submitdebug" value="connect">
              </div>
          </div> -->

          <div class="">


              <table class="table" style="margin-top:-50px;">
                <thead class="thead-dark">
                  <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Password</th>
                    <th>Operation</th>
                  </tr>
                </thead>

                <tbody>
                  <?php

                  $sql = "SELECT * FROM users";
                  $result = mysqli_query($conn,$sql);
                  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                  $visitCount = mysqli_num_rows($result);
                  $rownum = 1;
                  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

                    echo "<tr>
                        <td>".$rownum."</td>
                        <td>".$row['username']."</td>
                        <td>".$row['password']."</td>
                        <td>"."<form method='GET'>
                              <input type='hidden' name='resetid' value=".$row['username'].">
                              <input class='btn btn-outline-danger' type='submit' id='confirm' name='resetbtn' value='Select'>

                            </form>"."</td></tr>";
                    $rownum++;
                  }



                   ?>

                </tbody>
              </table>
              <hr>
              <br>

              <div class="jumbotron">
                <h6 style="color:Red">DEBUG-USER: <span><?php echo $_GET['resetid']; ?></span></h6>
                <hr>
                <form method="post">
            <div class="form-group">
              <label for="formGroupExampleInput">Enter New Password</label>
              <input type="text" name="newpass" class="form-control" >
              <input class='btn btn-warning mt-4' type='submit' id='reset' name='reset' value='Reset'>

            </div>

          </form>

          <?php
            $user=$_GET['resetid'];
            if (isset($_POST['reset'])) {
              $new_password = $_POST['newpass'];
              $hash = password_hash($new_password, PASSWORD_DEFAULT);

              $sql= "UPDATE users SET password = '$hash' WHERE username = '$user'";

              $result = mysqli_query($conn,$sql);
              echo "<meta http-equiv='refresh' content='0'>";

              if ($result) {
                  echo "<span class='font-weight-bold' style='color:green'>Password chaned for".$user."</span>";
              } else {
                  echo "<span class='font-weight-bold' style='color:red'>Insertion Failed: </span>"."<span class='small' >".mysqli_error($conn)."</span>";
              }
            }




           ?>


              </div>







          </div>




      </div>

     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>

</html>
