<?php

  function getListing(){
    @include('../../library-process/connection.php');

    $query = 'SELECT * FROM user_school_visit WHERE status = ? AND dateOfVisit = ?';
    $pStatement = $conn->prepare($query);
    $param = 'complete';
    $param2 = date('Y-m-d');
    $pStatement->bind_param('ss', $param, $param2);
    $pStatement->execute();
    $result = $pStatement->get_result();

    while($row = $result->fetch_assoc()){
      $action = null;
      if($row['status'] == 'checkedIn' || $row['status'] == 'complete')
        $action = 'Complete';
      else {
        $action = '<a href="admin-security-dashboard.php?onCheckIn='.$row['guestcode'].'&type=student" class="btn btn-secondary" style="margin-right:5px ">Check-In</a>';
      }
      echo '<div class="alert alert-shadow flex-column align-items-start shadow" role="alert">
              <div class="row">
                <div class="col-4">
                  <h5 class="mb-1" style=\'color:#008efa\'>'.$row['lastName'].' '.$row['firstName'].'</h5>
                </div>
                <div class="col-2">
                   <h6 style=\'color:#008efa\'>'.$row['guestcode'].'</h6>
                </div>
                <div class="col-2">
                  <h6 style=\'color:#008efa\'>'.$row['purpose'].'</h6>
                </div>
                <div class="col-2">
                  <h6 style=\'color:#008efa\'>'.$row['dateOfVisit'].'</h6>
                </div>
                <div class="col-1">
                  '.$action.'
                </div>
                <div class="col-1">
                </div>
              </div>
            </div>';
    }

    $pStatement->close();

    $query = 'SELECT * FROM guest_register WHERE status = ? AND date = ?';
    $pStatement = $conn->prepare($query);
    $param = 'complete';
    $param2 = date('Y-m-d');
    $pStatement->bind_param('ss', $param, $param2);
    $pStatement->execute();
    $result = $pStatement->get_result();

    while($row = $result->fetch_assoc()){
      $action = null;
      if($row['status'] == 'checkedIn' || $row['status'] == 'complete')
        $action = 'Complete';
      else {
        $action = '<a href="admin-security-dashboard.php?onCheckIn='.$row['guestcode'].'&type=guest" class="btn btn-secondary" style="margin-right:5px ">Check-In</a>';
      }
      echo '<div class="alert alert-shadow flex-column align-items-start shadow" role="alert">
              <div class="row">
                <div class="col-4">
                  <h5 class="mb-1" style=\'color:#fa9a00\'>'.$row['lastname'].' '.$row['firstname'].'</h5>
                </div>
                <div class="col-2">
                   <h6 style=\'color:#fa9a00\'>'.$row['guestcode'].'</h6>
                </div>
                <div class="col-2">
                  <h6 style=\'color:#fa9a00\'>'.$row['purpose'].'</h6>
                </div>
                <div class="col-2">
                  <h6 style=\'color:#fa9a00\'>'.$row['date'].'</h6>
                </div>
                <div class="col-1">
                  '.$action.'
                </div>
                <div class="col-1">
                </div>
              </div>
            </div>';
    }
  }

  function getListingByDate($inputDate){
    @include('../../library-process/connection.php');

    $query = 'SELECT * FROM user_school_visit WHERE dateOfVisit = ? ORDER BY dateOfVisit DESC';
    $pStatement = $conn->prepare($query);
    $pStatement->bind_param('s', $inputDate);
    $pStatement->execute();
    $result = $pStatement->get_result();
    if($result->num_rows == 0)
      return "no result";
    while($row = $result->fetch_assoc()){
      $action = 'Complete';

      echo '<div class="alert alert-shadow flex-column align-items-start shadow" role="alert">
              <div class="row">
                <div class="col-4">
                  <h5 class="mb-1" style=\'color:#008efa\'\'>'.$row['lastName'].' '.$row['firstName'].'</h5>
                </div>
                <div class="col-2">
                   <h6 style=\'color:#008efa\'>'.$row['guestcode'].'</h6>
                </div>
                <div class="col-2">
                  <h6 style=\'color:#008efa\'>'.$row['purpose'].'</h6>
                </div>
                <div class="col-2">
                  <h6 style=\'color:#008efa\'>'.$row['dateOfVisit'].'</h6>
                </div>
                <div class="col-1">
                  '.$action.'
                </div>
                <div class="col-1">
                </div>
              </div>
            </div>';
    }

    $query = 'SELECT * FROM guest_register WHERE date = ? ORDER BY date DESC';
    $pStatement = $conn->prepare($query);
    $pStatement->bind_param('s', $inputDate);
    $pStatement->execute();
    $result = $pStatement->get_result();
    if($result->num_rows == 0)
      return "no result";
    while($row = $result->fetch_assoc()){
      $action = 'Complete';

      echo '<div class="alert alert-shadow flex-column align-items-start shadow" role="alert">
              <div class="row">
                <div class="col-4">
                  <h5 class="mb-1" style=\'color:#fa9a00\'\'>'.$row['lastname'].' '.$row['firstname'].'</h5>
                </div>
                <div class="col-2">
                   <h6 style=\'color:#fa9a00\'>'.$row['guestcode'].'</h6>
                </div>
                <div class="col-2">
                  <h6 style=\'color:#fa9a00\'>'.$row['purpose'].'</h6>
                </div>
                <div class="col-2">
                  <h6 style=\'color:#fa9a00\'>'.$row['date'].'</h6>
                </div>
                <div class="col-1">
                  '.$action.'
                </div>
                <div class="col-1">
                </div>
              </div>
            </div>';
    }
  }

  function searchVisitor($searchInput){
    @include('../../library-process/connection.php');

    $query = 'SELECT * FROM user_school_visit WHERE status = ? AND firstName LIKE ? OR lastName LIKE ? OR guestcode LIKE ? ORDER BY dateOfVisit DESC';
    $pStatement = $conn->prepare($query);
    $param = 'complete';
    $pStatement->bind_param('ssss', $param, $searchInput, $searchInput, $searchInput);
    $pStatement->execute();
    $result = $pStatement->get_result();

    while($row = $result->fetch_assoc()){
      $action = null;
      if($row['status'] == 'checkedIn' || $row['status'] == 'complete')
        $action = 'Complete';
      else {
        $action = '<a href="admin-security-dashboard.php?onCheckIn='.$row['guestcode'].'&type=student" class="btn btn-secondary" style="margin-right:5px ">Check-In</a>';
      }
      echo '<div class="alert alert-shadow flex-column align-items-start shadow" role="alert">
              <div class="row">
                <div class="col-4">
                  <h5 class="mb-1" style=\'color:#008efa\'>'.$row['lastName'].' '.$row['firstName'].'</h5>
                </div>
                <div class="col-2">
                   <h6 style=\'color:#008efa\'>'.$row['guestcode'].'</h6>
                </div>
                <div class="col-2">
                  <h6 style=\'color:#008efa\'>'.$row['purpose'].'</h6>
                </div>
                <div class="col-2">
                  <h6 style=\'color:#008efa\'>'.$row['dateOfVisit'].'</h6>
                </div>
                <div class="col-1">
                  '.$action.'
                </div>
                <div class="col-1">
                </div>
              </div>
            </div>';
    }

    $pStatement->close();

    $query = 'SELECT * FROM guest_register WHERE status = ? AND firstname LIKE ? OR lastname LIKE ? OR guestcode LIKE ? ORDER BY date DESC';
    $pStatement = $conn->prepare($query);
    $param = 'complete';
    $pStatement->bind_param('ssss', $param, $searchInput, $searchInput, $searchInput);
    $pStatement->execute();
    $result = $pStatement->get_result();

    while($row = $result->fetch_assoc()){
      $action = null;
      if($row['status'] == 'checkedIn' || $row['status'] == 'complete')
        $action = 'Complete';
      else {
        $action = '<a href="admin-security-dashboard.php?onCheckIn='.$row['guestcode'].'&type=guest" class="btn btn-secondary" style="margin-right:5px ">Check-In</a>';
      }
      echo '<div class="alert alert-shadow flex-column align-items-start shadow" role="alert">
              <div class="row">
                <div class="col-4">
                  <h5 class="mb-1" style=\'color:#fa9a00\'>'.$row['lastname'].' '.$row['firstname'].'</h5>
                </div>
                <div class="col-2">
                   <h6 style=\'color:#fa9a00\'>'.$row['guestcode'].'</h6>
                </div>
                <div class="col-2">
                  <h6 style=\'color:#fa9a00\'>'.$row['purpose'].'</h6>
                </div>
                <div class="col-2">
                  <h6 style=\'color:#fa9a00\'>'.$row['date'].'</h6>
                </div>
                <div class="col-1">
                  '.$action.'
                </div>
                <div class="col-1">
                </div>
              </div>
            </div>';
    }
  }

  function onNullResults(){
    echo '<div class="alert alert-shadow flex-column align-items-start shadow" role="alert">
            <div class="row">
              <div class="col-4">
              </div>
              <div class="col-4">
                <h4>No results found</h4>
              </div>
              <div class="col-4">
              </div>
            </div>
          </div>';
  }

 ?>
