<?php

  function checkInVisitor($guestcode, $typeOfVisitor){
    @include('../../library-process/connection.php');
    $lastName = null;
    $firstName = null;

    if($typeOfVisitor == 'guest'){
      $query = 'SELECT * FROM guest_register WHERE guestcode = ?';
      $pStatement = $conn->prepare($query);
      $pStatement->bind_param('s', $guestcode);
      $pStatement->execute();
      $result = $pStatement->get_result();
      if($row = $result->fetch_assoc()){
        $lastName = $row['lastname'];
        $firstName = $row['firstname'];
      }
      $pStatement->close();

      $query = 'UPDATE guest_register SET status = ?';
      $statement = $conn->prepare($query);
      $param = 'checkedIn';
      $statement->bind_param('s', $param);
      $statement->execute();
      $statement->close();
    }else {
      $query = 'SELECT * FROM user_school_visit WHERE guestcode = ?';
      $pStatement = $conn->prepare($query);
      $pStatement->bind_param('s', $guestcode);
      $pStatement->execute();
      $result = $pStatement->get_result();
      if($row = $result->fetch_assoc()){
        $lastName = $row['lastName'];
        $firstName = $row['firstName'];
      }
      $pStatement->close();

      $query = 'UPDATE user_school_visit SET status = ?';
      $statement = $conn->prepare($query);
      $param = 'checkedIn';
      $statement->bind_param('s', $param);
      $statement->execute();
      $statement->close();
    }

    $query = 'INSERT INTO check_in_lobby (guestcode, lastName, firstName, typeOfVisitor) VALUES (?,?,?,?)';
    $pStatement = $conn->prepare($query);
    $pStatement->bind_param('ssss', $guestcode, $lastName, $firstName, $typeOfVisitor);
    $pStatement->execute();
    $pStatement->close();

    $query = 'SELECT * FROM check_in_lobby WHERE guestcode = ?';
    $pStatement = $conn->prepare($query);
    $pStatement->bind_param('s', $guestcode);
    $pStatement->execute();
    $result = $pStatement->get_result();
    if($row = $result->fetch_assoc()){
      logCheck('On CheckIn, '.$guestcode.', '.$row['lastName'].', '.$row['firstName']);
    }
    $pStatement->close();

    redirect('admin-security-dashboard.php');
  }

  function checkOutVisitor($guestcode){
    @include('../../library-process/connection.php');

    $query = 'SELECT * FROM check_in_lobby WHERE guestcode = ?';
    $pStatement = $conn->prepare($query);
    $pStatement->bind_param('s', $guestcode);
    $pStatement->execute();
    $result = $pStatement->get_result();
    if($row = $result->fetch_assoc()){
      logCheck('On Checkout, '.$guestcode.', '.$row['lastName'].', '.$row['firstName']);
    }
    $pStatement->close();

    $query = 'DELETE FROM check_in_lobby WHERE guestcode = ?';
    $pStatement = $conn->prepare($query);
    $pStatement->bind_param('s', $guestcode);
    $pStatement->execute();
    $pStatement->close();

    $query = 'UPDATE user_school_visit SET status = ? WHERE guestcode = ?';
    $pStatement = $conn->prepare($query);
    $paramComplete = 'complete';
    $pStatement->bind_param('ss', $paramComplete, $guestcode);
    $pStatement->execute();
    $pStatement->close();

    $query = 'UPDATE guest_register SET status = ? WHERE guestcode = ?';
    $pStatement = $conn->prepare($query);
    $paramComplete = 'complete';
    $pStatement->bind_param('ss', $paramComplete, $guestcode);
    $pStatement->execute();
    $pStatement->close();

    redirect('admin-security-dashboard.php');
  }

  function searchCheckedInListing($searchInput){
    @include('../../library-process/connection.php');

    $query = 'SELECT * FROM check_in_lobby WHERE firstName LIKE ? OR lastName LIKE ? OR guestcode LIKE ?';
    $pStatement = $conn->prepare($query);
    $searchInput = '%'.$searchInput.'%';
    $pStatement->bind_param('sss', $searchInput, $searchInput,$searchInput);
    $pStatement->execute();
    $result = $pStatement->get_result();
    if($result->num_rows == 0)
      return "no result";
    while($row = $result->fetch_assoc()){
      if ($row['typeOfVisitor'] == 'guest') {
        $color = 'style=\'color:#fa9a00\'';
      }else {
        $color = 'style=\'color:#008efa\'';
      }
      echo '<div class="alert alert-shadow flex-column align-items-start shadow" role="alert">
              <div class="row">
                <div class="col-4">
                  <h5 class="mb-1" '.$color.'>'.$row['lastName'].' '.$row['firstName'].'</h5>
                </div>
                <div class="col-2">
                   <h6 '.$color.'>'.$row['guestcode'].'</h6>
                </div>
                <div class="col-2">
                    <h6 '.$color.'>'.$row['typeOfVisitor'].'</h6>
                </div>
                <div class="col-2">
                  <a href="admin-security-dashboard.php?onCheckOut='.$row['guestcode'].'" class="btn btn-secondary" style="margin-right:5px ">Check-Out</a>
                </div>
                <div class="col-1">

                </div>
              </div>
            </div>';
    }
    $pStatement->close();
  }

  function getCheckedInListing(){
    @include('../../library-process/connection.php');

    $query = 'SELECT * FROM check_in_lobby';
    $pStatement = $conn->prepare($query);
    $pStatement->execute();
    $result = $pStatement->get_result();
    if($result->num_rows == 0)
      return "no result";
    while($row = $result->fetch_assoc()){
      $color = null;
      if ($row['typeOfVisitor'] == 'guest') {
        $color = 'style=\'color:#fa9a00\'';
      }else {
        $color = 'style=\'color:#008efa\'';
      }
      echo '<div class="alert alert-shadow flex-column align-items-start shadow" role="alert">
              <div class="row">
                <div class="col-4">
                  <h5 class="mb-1" '.$color.'>'.$row['lastName'].' '.$row['firstName'].'</h5>
                </div>
                <div class="col-2">
                   <h6 '.$color.'>'.$row['guestcode'].'</h6>
                </div>
                <div class="col-2">
                    <h6 '.$color.'>'.$row['typeOfVisitor'].'</h6>
                </div>
                <div class="col-2">
                  <a href="admin-security-dashboard.php?onCheckOut='.$row['guestcode'].'" class="btn btn-secondary" style="margin-right:5px ">Check-Out</a>
                </div>
                <div class="col-1">

                </div>
              </div>
            </div>';
    }
    $pStatement->close();
  }

  function getPendingListing(){
    @include('../../library-process/connection.php');

    $query = 'SELECT * FROM user_school_visit WHERE status = ? AND dateOfVisit = ?';
    $pStatement = $conn->prepare($query);
    $dateNow = date('Y-m-d');
    $param = 'pending';
    $pStatement->bind_param('ss', $param, $dateNow);
    $pStatement->execute();
    $result = $pStatement->get_result();
    while($row = $result->fetch_assoc()){
      echo '<div class="alert alert-shadow flex-column align-items-start shadow" role="alert">
              <div class="row">
                <div class="col-4">
                  <h5 class="mb-1">'.$row['lastName'].' '.$row['firstName'].'</h5>
                </div>
                <div class="col-2">
                   <h6>'.$row['guestcode'].'</h6>
                </div>
                <div class="col-2">
                    <h6>Student</h6>
                </div>
                <div class="col-2">
                  <a href="admin-security-dashboard.php?onCheckIn='.$row['guestcode'].'&type=student" class="btn btn-secondary" style="margin-right:5px ">Check-In</a>
                </div>
                <div class="col-1">

                </div>
              </div>
            </div>';
    }
    $pStatement->close();

    $query = 'SELECT * FROM guest_register WHERE status = ? AND date = ?';
    $pStatement = $conn->prepare($query);
    $dateNow = date('Y-m-d');
    $param = 'pending';
    $pStatement->bind_param('ss', $param, $dateNow);
    $pStatement->execute();
    $result = $pStatement->get_result();
    while($row = $result->fetch_assoc()){
      echo '<div class="alert alert-shadow flex-column align-items-start shadow" role="alert">
              <div class="row">
                <div class="col-4">
                  <h5 class="mb-1">'.$row['lastname'].' '.$row['firstname'].'</h5>
                </div>
                <div class="col-2">
                   <h6>'.$row['guestcode'].'</h6>
                </div>
                <div class="col-2">
                    <h6>Guest</h6>
                </div>
                <div class="col-2">
                  <a href="admin-security-dashboard.php?onCheckIn='.$row['guestcode'].'&type=guest" class="btn btn-secondary" style="margin-right:5px ">Check-In</a>
                </div>
                <div class="col-1">

                </div>
              </div>
            </div>';
    }
    $pStatement->close();
  }

  function logCheck($message){
    $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
    error_log(date('H:i jS F Y').': '.$message.PHP_EOL,3,$DOCUMENT_ROOT.'/../apache/logs/eve-lobby.log');
  }

  function redirect($link){
    echo "  <script type=\"text/javascript\">
              window.location.href = ".$link.";
            </script>";
  }

?>
