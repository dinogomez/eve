<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
    <div class="container maindiv">

      <div class="card shadow mt-5 ">
        <div class="card-header">
          <img src="library-resource/img/pol_thumbnail.png" alt="404" class="img-thumbnail rounded float-left mr-2" style="width:100px; height:100px;">

          <div class="card-title ml-5 mt-3">
            <h2 class="d-inline mt-5"><span style="color:red">DEBUG</span> - insert account w/ hash </h2>


            <a class="d-inline float-right font-weight-bold btn btn-primary mt-3" href="index.php">Return</a>

          </div>
      >
          <h6 class="card-subtitle mb-2 ml-3 text-muted small fontsub">@POL - use this to insert a hashed account to the database</h6>

         </div>
        <div class="card-body">
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
          </div
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
            <?php


            // $N = 1;
            //
            // if ($N == 1) {
            //
            //   $server = "localhost";
            //   $dbuser = "gtech.dp";
            //   $dbpass = "dp";
            //   $dbname = "paulodb";
            //
            //   $conn = mysqli_connect($server, $dbuser, $dbpass, $dbname);
            //
            //   if (!$conn) {
            //    die("Connection failed: " . mysqli_connect_error());
            //   }
            //
            // } elseif ($N == 0) {
            //
            //     $server = "localhost";
            //     $dbuser = "root";
            //     $dbpass = "";
            //
            //     $dbname = "otso";
            //
            //     $conn = mysqli_connect($server, $dbuser, $dbpass, $dbname);
            //
            //     //if connection fails disconnect
            //     if (!$conn) {
            //      die("Connection failed: " . mysqli_connect_error());
            //     }
            //   }

            date_default_timezone_set('Asia/Manila');
            echo "<span style='color:red'>Debug Console</span>";
            echo "<hr>";
            if (isset($_POST['submitdebug'])) {

              print date('h:i').": ";
              echo $_POST['username'];
            }



             ?>
          </div>






      </div>

     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>

</html>
