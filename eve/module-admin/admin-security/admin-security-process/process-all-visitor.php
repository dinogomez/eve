<?php
// ob_start();
// include ('../../../fpdf.php');
// @include('../../library-process/connection.php');
//
// $path = "../../../fpdf.php";
// echo "Path: $path";
//
// class myPDF extends FPDF{
//   function header(){
//     $this->SetFont('Arial', 'B', 14);
//     $this->Cell(276, 5, 'VISITOR LIST', 0, 0, 'C');
//     $this->Ln();
//     $this->SetFont('Times', '', 12);
//     $this->Ln(20);
//   }
//
//   function footer(){
//     $this->SetY(-15);
//     $this->SetFont('Arial', '', 8);
//     $this->Cell(0, 10, 'Page '.$this->PageNo().'/{nb}', 0,0,'C');
//   }
//
//   function headerTable(){
//     $this->SetFont('Times', 'B', 12);
//     $this->Cell(40, 10, 'Name', 1, 0, 'C');
//     $this->Cell(30, 10, 'Guest Code', 1, 0, 'C');
//     $this->Cell(20, 10, 'Purpose', 1, 0, 'C');
//     $this->Cell(20, 10, 'Date', 1, 0, 'C');
//     $this->Ln();
//   }
//
//   function viewTable($)
// }
//
// $pdf = new myPDF();
// $pdf->AliasNbPages();
// $pdf->AddPage('L', 'A4', 0);
// $pdf->headerTable();
// $pdf->Output();
// ob_end_flush();

if( !isset($_POST['submit']) ) {
?>
<form method="post">
  <input type="submit" name="create-pdf" class="btn btn-success" value="Create PDF"/>
</form>
<?php
} else {
ob_start();
@include('../../library-process/connection.php');
require("../../../fpdf.php");
$sql = 'SELECT * FROM user_school_visit WHERE status LIKE "complete" AND MONTH(dateOfVisit) = MONTH(CURRENT_DATE()) AND YEAR(dateOfVisit) = YEAR(CURRENT_DATE())
  UNION ALL FROM guest_register WHERE status LIKE "complete" AND MONTH(dateOfVisit) = MONTH(CURRENT_DATE()) AND YEAR(dateOfVisit) = YEAR(CURRENT_DATE())';
$pStatement = $conn->prepare($sql);
$pStatement->execute();
$result = $pStatement->get_result();

$pdf = new FPDf('p', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(40, 10, 'Last Name', 1, 0, 'C');
$pdf->Cell(40, 10, 'First Name', 1, 0, 'C');
$pdf->Cell(30, 10, 'Guest Code', 1, 0, 'C');
$pdf->Cell(20, 10, 'Purpose', 1, 0, 'C');
$pdf->Cell(20, 10, 'Date', 1, 0, 'C');

$pdf->SetFont('Arial', '', 14);
while($row = $result->fetch_assoc()){
  $pdf->cell(40,10, $row['lastName'], 1, 0, 'C');
  $pdf->cell(40,10, $row['firstName'], 1, 0, 'C');
  $pdf->cell(40,10, $row['guestcode'], 1, 0, 'C');
  $pdf->cell(40,10, $row['purpose'], 1, 0, 'C');
  $pdf->cell(40,10, $row['date'], 1, 0, 'C');

}
ob_end_flush();
$pdf->Output();
}
 ?>

<?php
// ob_start();

  function getListing(){
    @include('../../library-process/connection.php');

    // $output = '';
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

      // $output .= '<div class="alert alert-shadow flex-column align-items-start shadow" role="alert">
      //         <div class="row">
      //           <div class="col-4">
      //             <h5 class="mb-1" style=\'color:#008efa\'>'.$row['lastName'].' '.$row['firstName'].'</h5>
      //           </div>
      //           <div class="col-2">
      //              <h6 style=\'color:#008efa\'>'.$row['guestcode'].'</h6>
      //           </div>
      //           <div class="col-2">
      //             <h6 style=\'color:#008efa\'>'.$row['purpose'].'</h6>
      //           </div>
      //           <div class="col-2">
      //             <h6 style=\'color:#008efa\'>'.$row['dateOfVisit'].'</h6>
      //           </div>
      //           <div class="col-1">
      //             '.$action.'
      //           </div>
      //           <div class="col-1">
      //           </div>
      //         </div>
      //       </div>';
    }

    $pStatement->close();


    // $output = '';
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

            // $output .= '<div class="alert alert-shadow flex-column align-items-start shadow" role="alert">
            //         <div class="row">
            //           <div class="col-4">
            //             <h5 class="mb-1" style=\'color:#008efa\'>'.$row['lastname'].' '.$row['firstname'].'</h5>
            //           </div>
            //           <div class="col-2">
            //              <h6 style=\'color:#008efa\'>'.$row['guestcode'].'</h6>
            //           </div>
            //           <div class="col-2">
            //             <h6 style=\'color:#008efa\'>'.$row['purpose'].'</h6>
            //           </div>
            //           <div class="col-2">
            //             <h6 style=\'color:#008efa\'>'.$row['date'].'</h6>
            //           </div>
            //           <div class="col-1">
            //             '.$action.'
            //           </div>
            //           <div class="col-1">
            //           </div>
            //         </div>
            //       </div>';
    }
  }
  // return $output;
  // if(isset($_POST["create-pdf"])){
  //   require_once("../../tcpdf/tcpdf.php");
  //   $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); //create new pdf docu
  //   $obj_pdf->SetCreator(PDF_CREATOR); //set the information
  //   $obj_pdf->SetTitle("LISTS OF ALL VISITORS"); //title of the document
  //   $obj_pdf->setHeaderData('','', PDF_HEADER_TITLE, PDF_HEADER_STRING);
  //   $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
  //   $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
  //   $obj_pdf->SetDefaultMonospacedFont('helvetica');
  //   $obj_pdf->setFooterMargin(PDF_MARGIN_FOOTER);
  //   $obj_pdf->setMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
  //   $obj_pdf->setPrintHeader(false);
  //   $obj_pdf->setPrintFooter(false);
  //   $obj_pdf->SetAutoPageBreak(TRUE, 10);
  //   $obj_pdf->SetFont('helvetica', '', 12);
  //   $obj_pdf->AddPage();
  //
  //   $content = '';
  //
  //   $content .= '
  //               <h3 align="center">LISTS OF ALL VISITORS</h3>
  //               <table border="1" cellspacing="0" cell_padding="5">
  //               <tr>
  //               <th width="40%">Name</th>
  //               <th width="10%">Code</th>
  //               <th width="15%">Purpose</th>
  //               <th width="10%">Date</th>
  //
  //               </tr>';
  //     $content .= getListing();
  //     $content .= '</table>';
  //
  //     $obj_pdf->writeHTML($content);
  //     ob_end_clean();
  //     $obj_pdf->Output("sample.pdf", "I");
  // }

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

    $query = 'SELECT * FROM guest_register WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE()) ORDER BY date DESC';
    $pStatement = $conn->prepare($query);
    @($pStatement->bind_param('s', $inputDate));
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
