<?php
ob_start();

  function getListing(){
    @include('../../library-process/connection.php');

    $output = '';
    $query = 'SELECT * FROM user_school_visit WHERE status LIKE "complete" AND MONTH(dateOfVisit) = MONTH(CURRENT_DATE()) AND YEAR(dateOfVisit) = YEAR(CURRENT_DATE())';
    $pStatement = $conn->prepare($query);
    $param = 'complete';
    @($pStatement->bind_param('ss', $param2));
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

      $output .= '<div class="alert alert-shadow flex-column align-items-start shadow" role="alert">
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


    $output = '';
    $query = 'SELECT * FROM guest_register WHERE status LIKE "complete" AND MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())';
    $pStatement = $conn->prepare($query);
    $param = 'complete';
    @($pStatement->bind_param('ss', $param2));
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

            $output .= '<div class="alert alert-shadow flex-column align-items-start shadow" role="alert">
                    <div class="row">
                      <div class="col-4">
                        <h5 class="mb-1" style=\'color:#008efa\'>'.$row['lastname'].' '.$row['firstname'].'</h5>
                      </div>
                      <div class="col-2">
                         <h6 style=\'color:#008efa\'>'.$row['guestcode'].'</h6>
                      </div>
                      <div class="col-2">
                        <h6 style=\'color:#008efa\'>'.$row['purpose'].'</h6>
                      </div>
                      <div class="col-2">
                        <h6 style=\'color:#008efa\'>'.$row['date'].'</h6>
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
  return $output;
  if(isset($_POST["create-pdf"])){
    require_once("../../tcpdf/tcpdf.php");
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); //create new pdf docu
    $obj_pdf->SetCreator(PDF_CREATOR); //set the information
    $obj_pdf->SetTitle("LISTS OF ALL VISITORS"); //title of the document
    $obj_pdf->setHeaderData('','', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $obj_pdf->SetDefaultMonospacedFont('helvetica');
    $obj_pdf->setFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf->setMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
    $obj_pdf->setPrintHeader(false);
    $obj_pdf->setPrintFooter(false);
    $obj_pdf->SetAutoPageBreak(TRUE, 10);
    $obj_pdf->SetFont('helvetica', '', 12);
    $obj_pdf->AddPage();

    $content = '';

    $content .= '
                <h3 align="center">LISTS OF ALL VISITORS</h3>
                <table border="1" cellspacing="0" cell_padding="5">
                <tr>
                <th width="40%">Name</th>
                <th width="10%">Code</th>
                <th width="15%">Purpose</th>
                <th width="10%">Date</th>

                </tr>';
      $content .= getListing();
      $content .= '</table>';

      $obj_pdf->writeHTML($content);
      ob_end_clean();
      $obj_pdf->Output("sample.pdf", "I");
  }
?>

<!DOCTYPE>
<html>
<head>
</head>
<body>
<main class="page-content">
  <br><br>
  <div class="container-fluid">
    <h2 style="color:#42daf5">All Visitors</h2>
    <hr>
    <div class="row">
      <div class="form-group col-md-12">
        <div class="row">
          <div id="clock" class="col-2" style="font-size:20px"></div>
          <div id="date" class="col-4" style="font-size:20px"></div>
          <div class="col-2">
            <form method="post">
              <input type="submit" name="create-pdf" class="btn btn-success" value="Create PDF"/>
            </form>
          </div>
          <div class="col-1">
            <a href="admin-security-visitors-history.php" class="btn btn-secondary">Clear Filters</a>
          </div>
          <div class="col-2">
            <form class="" action="admin-security-visitors-history.php" method="get">
              <input type="date" class="form-control" name="date" onchange='if(this.value != 0) { this.form.submit(); }' max="<?php echo date('Y-m-d'); ?>">
            </form>
          </div>
          <div class="col-3">
            <form class="" action="admin-security-visitors-history.php" method="get">
              <input type="search" name="search" class="form-control" placeholder="Search Visitor">
            </form>
          </div>
        </div>
      </div>

      <hr>

      <div class="alert alert-shadow flex-column align-items-start shadow" role="alert" style="width:100%;">
        <div class="row" style="margin-left:px">
          <div class="col-4">
            <h5 class="mb-1">Name</h5>
          </div>
          <div class="col-2">
            <h5 class="mb-1">Code</h5>
          </div>
          <div class="col-2">
            <h5 class="mb-1">Purpose</h5>
          </div>
          <div class="col-2">
            <h5 class="mb-1">Date</h5>
          </div>
          <div class="col-1">
            <h5 class="mb-1">Action</h5>
          </div>
          <div class="col-1">

          </div>
          <<?php echo getListing(); ?>
        </div>
      </div>

      <div class="form-group flex-column align-items-start shadow col-md-12">
        <?php
          if(@isset($_GET['date'])){
            $status = getListingByDate($_GET['date']); //get listing based on purpose
            if($status == "no result"){
              onNullResults();
            }
          }else if(@!isset($_GET['search'])){
            getListing(); //gets actual listings from database with no filters.
          }else if(@isset($_GET['search'])){
            $status = searchVisitor($_GET['search']); //get listing based on search input
            if($status == 'no result'){
              onNullResults();
            }
          }
         ?>


       </div>
    </div>
    <hr>
</main>
</div>
</body>
</html>
