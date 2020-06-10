<?php
//connection settings
//we use the "$conn variable from connection.php"
include_once '../library-process/connection.php';
include_once '../library-process/login.php';
require_once 'module-guest-view/header/header-register.php';
require_once 'module-guest-view/navbar/nav-main.php';



 ?>

<script type="text/javascript">
$(function () {
  $("#purpose").change (function() {
    if($(this).val() == "Meeting"){
      $("#personToMeet").removeAttr("disabled");
      $("#personToMeet").focus();
    } else {
      $("#personToMeet").attr("disabled", "disabled");
    }
  });
});
</script>



    <!-- nav -->

    <div class="jumbotron jumbotron-fluid mt-5">
      <div class="container pt-5 shadow jumbocontatiner">
        <h1 class="display-4 text-center">.Guest Visit Registration</h1>
        <h5 class="card-subtitle mb-2 purple text-center">EVE</h5>

        <p class="lead text-center">Please fill up the following.</p>

        <div class="register-border" id="logindiv">

          <div class="login-text p-5">
            <form class="regform" action="guest-visit-confirm.php" method="post">

                  <div class="form-group">
                    <label for="formGroupExampleInput">First Name</label>
                    <input type="text" class="form-control" name="firstname" placeholder="Tim" value="" required>
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Middle Name</label>
                    <input type="text" class="form-control"  name="middlename"placeholder="Berners" required>
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Last Name</label>
                    <input type="text" class="form-control" name="lastname" placeholder="Lee" required>
                  </div>
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
                      <!-- <option value="Event">Event</option> -->
                      <option value="Meeting">Meeting</option>
                    </select>
                  </div>

                  <!-- to appear if meeting is selected -->
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Person to Meet</label>
                    <input type = "text"  class = "form-control" id ="personToMeet" disabled ="disabled" placeholder="Person to meet" required/>
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
                    <label for="formGroupExampleInput2">Contanct Number</label>
                    <input type="text" class="form-control" name="contactnum" placeholder="optional">
                  </div>


                          <div class="container mt-4">
                            <div class="row">
                              <div class="col text-center">
                                <input class="btn btn-outline-warning shadow" id="submit" type="submit" name="register" value="Confirm"style="width: 100px;">
                              </div>
                            </div>
                          </div>

            </form>

<?php
if(isset($_POST['register'])){
  $_SESSION['isRegistered'] = 1;
      }

?>

                    </div>
          </div>

        </div>
      </div>
    </div>



    <?php
    //MODAL BLOCK
    require_once 'module-guest-view/modal/login-modal.php';
    //FOOTER BLOCK
    require_once 'module-guest-view/footer/footer-main.php';

    ?>
