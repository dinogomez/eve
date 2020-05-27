<?php
require_once '../library-process/connection.php';

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="icon" href="library-resource/img/pol_thumbnail.png">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
    <div class="container maindiv">

      <div class="card shadow mt-5 ">
        <div class="card-header">
          <img src="../library-resource/img/pol_thumbnail.png" alt="404" class="img-thumbnail rounded float-left mr-2" style="width:100px; height:100px;">

          <div class="card-title ml-5 mt-3">
            <h2 class="d-inline mt-5"><span style="color:red">DEBUG</span> - insert account w/ hash </h2>


            <a class="d-inline float-right font-weight-bold btn btn-primary mt-3" href="index.php">Return</a>

          </div>

          <h6 class="card-subtitle mb-2 ml-3 text-muted small fontsub">@POL - use this to insert a hashed account to the database</h6>

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
          <form method="POST">
            <div class="form-group">
              <label for="formGroupExampleInput2">Permission</label>
              <select class="custom-select" name="permission">
                <option selected>Select Permission</option>
                <option value="1">IT</option>
                <option value="2">Security</option>
                <option value="3">Event Manager</option>
                <option value="4">Student</option>

              </select>
            </div>
            <div class="form-group">
            <label for="formGroupExampleInput">username</label>
            <input type="text" class="form-control" name="username"  required >
            </div>
            <div class="form-group">
            <label for="formGroupExampleInput2">password</label>
            <input type="text" class="form-control" name="password"   required>
            </div>
            <div class="form-group">
            <label for="formGroupExampleInput2">first_name</label>
            <input type="text" class="form-control" name="fname"  required >
            </div>
            <div class="form-group">
            <label for="formGroupExampleInput2">middle_name</label>
            <input type="text" class="form-control" name="mname"  required>
            </div>
            <div class="form-group">
            <label for="formGroupExampleInput2">last_name</label>
            <input type="text" class="form-control" name="lname"  required >
            </div>
            <div class="card-footer mb-3 text-center">
              <input class="btn btn-danger"type="submit" name="submitdebug" value="debug-insert">

            </div>
            </form>

                </div>

        </div>

          <div class="jumbotron">

            <form action="" method="POST">
                <input type="submit"  name="checkcon" value="Check Connection">

            </form>

            <br>
            <?php




            date_default_timezone_set('Asia/Manila');
            echo "<span style='color:red'>Debug Console</span>";
            echo "<hr>";

            if (isset($_POST['submitdebug'])) {
              echo "<span style='color:green'>".date('h:i').":</span> "."<strong>debug_permission: </strong> ".$_POST['permission']."<br>";
              echo "<span style='color:green'>".date('h:i').":</span> "."<strong>debug_username: </strong> ".$_POST['username']."<br>";
              echo "<span style='color:green'>".date('h:i').":</span> "."<strong>debug_password: </strong> ".$_POST['password']."<br>";
              echo "<span style='color:green'>".date('h:i').":</span> "."<strong>debug_fname: </strong> ".$_POST['fname']."<br>";
              echo "<span style='color:green'>".date('h:i').":</span> "."<strong>debug_mname: </strong> ".$_POST['mname']."<br>";
              echo "<span style='color:green'>".date('h:i').":</span> "."<strong>debug_lname: </strong> ".$_POST['lname']."<br>"."<br>";

              $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
              echo "<span class='small' style='color:red'>HASHING PASSWORD</span>"."<br>";

              echo "<span style='color:green'>".date('h:i').":</span> "."<strong>debug_password_hashed: </strong> ".$hash."<br><br>";


              $permission = mysqli_real_escape_string($conn,$_POST['permission']);
              $username = mysqli_real_escape_string($conn,$_POST['username']);
              $fname = mysqli_real_escape_string($conn,$_POST['fname']);
              $mname = mysqli_real_escape_string($conn,$_POST['mname']);
              $lname = mysqli_real_escape_string($conn,$_POST['lname']);


              $sql= "INSERT INTO users (permission, username, password, firstName,middleName, lastName)
              VALUES ('$permission', '$username', '$hash', '$fname', '$mname', '$lname')";

              $resulti = mysqli_query($conn,$sql);

              if ($resulti) {
                  echo "<span class='font-weight-bold' style='color:green'>Account Inserted to DB</span>";
              } else {
                  echo "<span class='font-weight-bold' style='color:red'>Insertion Failed: </span>"."<span class='small' >".mysqli_error($conn)."</span>";
              }
            }

            if (isset($_POST["checkcon"]))
              {

                if ($conn) {
                  echo date('h:i').": ";
                  echo "<span style='color:green'>Connected to Server.</span>";

                }

              }



             ?>
          </div>






      </div>

     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>

</html>
