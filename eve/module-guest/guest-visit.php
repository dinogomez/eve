<?php
//connection settings
//we use the "$conn variable from connection.php"
include_once '../library-process/connection.php';
include_once '../library-process/login.php';
require_once 'module-guest-view/header/header-register.php';
require_once 'module-guest-view/navbar/nav-main.php';



 ?>

<!-- <link rel="stylesheet" type="text/css" href="jquery-ui.min.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!--  Flatpickr  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>

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

//set minimum date
// $(document).ready(function() {
// 	var today = new Date();
// 	var dd = today.getDate();
// 	var mm = today.getMonth()+1;
// 	var yy = today.getFullYear();
// 	if (dd<10) {
// 		dd = '0' + dd;
// 	}
// 	if (mm<10) {
// 		mm = '0' + mm;
// 	}
// 	var rightnow = yy + '-' + mm + '-' + dd;
// 	$('#calendarDate').attr('min', rightnow);
//
// });

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
                    <input type="text" class="form-control" name="firstname" placeholder="First Name" value="" required>
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Middle Name</label>
                    <input type="text" class="form-control"  name="middlename"placeholder="Middle Name" required>
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Last Name</label>
                    <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Email</label>
                    <input type="email" class="form-control"  name="email"placeholder="optional">
                  </div>
                  <div class="form-group">
                     <label for="formGroupExampleInput2">Date of Visit</label>
                     <input type="date" class="form-control" name="date" placeholder="" min = "<?=date('Y-m-d')?>" max="<?=date('Y-m-d',strtotime(date('Y-m-d').'+20 days'))?>">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Purpose of Visit</label>
                    <select class="custom-select" name="purpose" id = "purpose" required>
                      <option value = "">Purpose of Visit</option>
                      <option value="School Tour">School Tour</option>
                      <option value="Registrar">Registrar</option>
                      <!-- <option value="Event">Event</option> -->
                      <option value="Meeting">Meeting</option>
                    </select>
                  </div>

                  <!-- to appear if meeting is selected -->
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Person to Meet</label>
                    <input type = "text"  class = "form-control" id ="personToMeet" name = "personToMeet" disabled ="disabled" placeholder="Person to meet" value="<?php if(!empty($_POST['personToMeet'])) echo $_POST['quantity'];?>"required/>
                  </div>


                  <div class="form-group">
                    <label for="formGroupExampleInput2">Type of ID</label>
                    <select class="custom-select" name="idgiven" required>
                      <option value = "">Type of ID</option>
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
                                <a class="btn btn-outline-warning btn-edit"  href="../module-landing/landing.php" >Back</a>
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
