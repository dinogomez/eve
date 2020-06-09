<?php

  function getListing(){
    @include('../../library-process/connection.php');

    $query = 'SELECT * FROM user_school_visit WHERE dateOfVisit = ?';
    $pStatement = $conn->prepare($query);
    $dateNow = date('Y-m-d');
    $pStatement->bind_param('s', $dateNow);
    $pStatement->execute();
    $result = $pStatement->get_result();

    while($row = $result->fetch_assoc()){
      $action = null;
      if($row['status'] == 'checkedIn' || $row['status'] == 'complete')
        $action = 'CheckedIn/Complete';
      else {
        $action = '<a href="admin-security-dashboard.php?onCheckIn='.$row['guestcode'].'&type=student" class="btn btn-secondary" style="margin-right:5px ">Check-In</a>';
      }
      echo '<div class="alert alert-shadow flex-column align-items-start shadow" role="alert">
              <div class="row">
                <div class="col-4">
                  <h5 class="mb-1">'.$row['lastName'].' '.$row['firstName'].'</h5>
                </div>
                <div class="col-2">
                   <h6>'.$row['guestcode'].'</h6>
                </div>
                <div class="col-2">
                  <h6>'.$row['purpose'].'</h6>
                </div>
                <div class="col-2">
                  <h6>'.$row['dateOfVisit'].'</h6>
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

    $query = 'SELECT * FROM user_school_visit WHERE firstName LIKE ? AND dateOfVisit = ? OR lastName LIKE ? OR guestcode LIKE ? ORDER BY dateOfVisit DESC';
    $pStatement = $conn->prepare($query);
    $searchInput = '%'.$searchInput.'%';
    $dateNow = date('Y-m-d');
    $pStatement->bind_param('ssss', $searchInput, $dateNow, $searchInput,$searchInput);
    $pStatement->execute();
    $result = $pStatement->get_result();
    if($result->num_rows == 0)
      return "no result";
    while($row = $result->fetch_assoc()){
      $action = null;
      if($row['status'] == 'checkedIn' || $row['status'] == 'complete')
        $action = 'CheckedIn/Complete';
      else {
        $action = '<a href="admin-security-dashboard.php?onCheckIn='.$row['guestcode'].'&type=student" class="btn btn-secondary" style="margin-right:5px ">Check-In</a>';
      }
      echo '<div class="alert alert-shadow flex-column align-items-start shadow" role="alert">
              <div class="row">
                <div class="col-4">
                  <h5 class="mb-1">'.$row['lastName'].' '.$row['firstName'].'</h5>
                </div>
                <div class="col-2">
                   <h6>'.$row['guestcode'].'</h6>
                </div>
                <div class="col-2">
                  <h6>'.$row['purpose'].'</h6>
                </div>
                <div class="col-2">
                  <h6>'.$row['dateOfVisit'].'</h6>
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

  function getListingByPurpose($value){
    @include('../../library-process/connection.php');

    $query = 'SELECT * FROM user_school_visit WHERE purpose LIKE ? AND dateOfVisit = ?';
    $pStatement = $conn->prepare($query);
    $searchInput = '%'.$value.'%';
    $dateNow = date('Y-m-d');
    $pStatement->bind_param('ss', $searchInput, $dateNow);
    $pStatement->execute();
    $result = $pStatement->get_result();

    while($row = $result->fetch_assoc()){
      $action = null;
      if($row['status'] == 'checkedIn' || $row['status'] == 'complete')
        $action = 'CheckedIn/Complete';
      else {
        $action = '<a href="admin-security-dashboard.php?onCheckIn='.$row['guestcode'].'&type=student" class="btn btn-secondary" style="margin-right:5px ">Check-In</a>';
      }
      echo '<div class="alert alert-shadow flex-column align-items-start shadow" role="alert">
              <div class="row">
                <div class="col-4">
                  <h5 class="mb-1">'.$row['lastName'].' '.$row['firstName'].'</h5>
                </div>
                <div class="col-2">
                   <h6>'.$row['guestcode'].'</h6>
                </div>
                <div class="col-2">
                  <h6>'.$row['purpose'].'</h6>
                </div>
                <div class="col-2">
                  <h6>'.$row['dateOfVisit'].'</h6>
                </div>
                <div class="col-1">
                  '.$action.'
                </div>
                <div class="col-1">
                </div>
              </div>
            </div>';
    }
    if($result->num_rows == 0)
      return "no result";
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
