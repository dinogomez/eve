<?php

  function getListing(){
    @include('../../library-process/connection.php');

    $query = 'SELECT * FROM guest_register WHERE date = ?';
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
    $pStatement->close();
  }

  function searchVisitor($searchInput){
    @include('../../library-process/connection.php');

    $query = 'SELECT * FROM guest_register WHERE firstname LIKE ? OR lastname LIKE ? OR guestcode LIKE ? ORDER BY date DESC';
    $pStatement = $conn->prepare($query);
    $searchInput = '%'.$searchInput.'%';
    $pStatement->bind_param('sss', $searchInput, $searchInput,$searchInput);
    $pStatement->execute();
    $result = $pStatement->get_result();
    if($result->num_rows == 0)
      return "no result";
    while($row = $result->fetch_assoc()){
      $action = null;
      if($row['status'] == 'checkedIn' || $row['status'] == 'complete')
        $action = 'CheckedIn/Complete';
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

  function getListingByPurpose($value){
    @include('../../library-process/connection.php');

    $query = 'SELECT * FROM guest_register WHERE purpose LIKE ? ORDER BY date DESC';
    $pStatement = $conn->prepare($query);
    $searchInput = '%'.$value.'%';
    $pStatement->bind_param('s', $searchInput);
    $pStatement->execute();
    $result = $pStatement->get_result();

    while($row = $result->fetch_assoc()){
      $action = null;
      if($row['status'] == 'checkedIn' || $row['status'] == 'complete')
        $action = 'CheckedIn/Complete';
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
