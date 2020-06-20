<?php
require('../../../library-process/connection.php');

require('../../../../pdf/fpdf.php');
date_default_timezone_set('Asia/Manila');

//GETTING STATISTICS;

  // QUERY FOR GUEST COMPLETED VISITS
  $sql = "SELECT * FROM guest_register WHERE MONTH(date) = MONTH(CURRENT_DATE())
  AND YEAR(date) = YEAR(CURRENT_DATE()) AND status = 'complete'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $gcompleted = mysqli_num_rows($result);
  // QUERY FOR ALL GUEST VISIT REGISTRATION
  $sql = "SELECT * FROM guest_register WHERE MONTH(date) = MONTH(CURRENT_DATE())
  AND YEAR(date) = YEAR(CURRENT_DATE())";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $gallVisit = mysqli_num_rows($result);
  // QUERY FOR ALL GUEST PENDING VISIT
  $sql = "SELECT * FROM guest_register WHERE MONTH(date) = MONTH(CURRENT_DATE())
  AND YEAR(date) = YEAR(CURRENT_DATE()) AND status = 'pending'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $gpending = mysqli_num_rows($result);


  // QUERY FOR STUDENT COMPLETED VISITS
  $sql = "SELECT * FROM user_school_visit WHERE MONTH(dateOfVisit) = MONTH(CURRENT_DATE())
  AND YEAR(dateOfVisit) = YEAR(CURRENT_DATE()) AND status = 'complete'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $scompleted = mysqli_num_rows($result);
  // QUERY FOR ALL STUDENT VISIT REGISTRATION
  $sql = "SELECT * FROM user_school_visit WHERE MONTH(dateOfVisit) = MONTH(CURRENT_DATE())
  AND YEAR(dateOfVisit) = YEAR(CURRENT_DATE())";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $sallVisit = mysqli_num_rows($result);
  // QUERY FOR ALL STUDENT PENDING VISIT
  $sql = "SELECT * FROM user_school_visit WHERE MONTH(dateOfVisit) = MONTH(CURRENT_DATE())
  AND YEAR(dateOfVisit) = YEAR(CURRENT_DATE()) AND status = 'pending'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $spending = mysqli_num_rows($result);

$date = date("m-d-y");
//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

//create pdf object
$pdf = new FPDF('P','mm','A4');
//add new page
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130 ,5,'EVE VISITATION SYSTEM REPORT' ,0,0);
$pdf->Cell(59 ,5,$date,0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'evebyotso@gmail.com',0,0);
$pdf->Cell(25 ,5,'',0,0);
$pdf->Cell(34 ,5,'',0,1);//end of line
$pdf->Cell(189 ,10,'',0,1);//end of line
$pdf->Cell(130 ,5,'STATISTICS',0,0);
$pdf->Cell(25 ,5,'',0,0);
$pdf->Cell(34 ,5,'',0,1);

$pdf->Cell(130 ,5,'GUEST',0,0);
$pdf->Cell(25 ,5,'STUDENT',0,0);
$pdf->Cell(34 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,$gcompleted." Visit",0,0);
$pdf->Cell(25 ,5,$scompleted." Visit",0,0);
$pdf->Cell(34 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,$gallVisit." Visit Registrations",0,0);
$pdf->Cell(25 ,5,$sallVisit." Visit Registrations",0,0);
$pdf->Cell(34 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,$gpending." Pending Visit",0,0);
$pdf->Cell(25 ,5,$spending." Pending Visit",0,0);
$pdf->Cell(34 ,5,'',0,1);//end of line

// //make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line
$pdf->Cell(130 ,5,'TOTAL',0,0);
$pdf->Cell(25 ,5,'',0,0);
$pdf->Cell(34 ,5,'',0,1);

$pdf->Cell(130 ,5,$gcompleted+$gcompleted." Visit",0,0);
$pdf->Cell(25 ,5,'',0,0);
$pdf->Cell(34 ,5,'',0,1);

$pdf->Cell(130 ,5,$gallVisit+$sallVisit." Visit Registrations",0,0);
$pdf->Cell(25 ,5,'',0,0);
$pdf->Cell(34 ,5,'',0,1);

$pdf->Cell(130 ,5,$gpending+$spending." Pending Visit",0,0);
$pdf->Cell(25 ,5,'',0,0);
$pdf->Cell(34 ,5,'',0,1);//end of line


$pdf->Cell(10 ,5,'',0,0);
//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);
$pdf->Cell(130 ,5,' COMPLETED GUEST VISITS',0,0);
$pdf->Cell(25 ,5,'',0,0);
$pdf->Cell(34 ,5,'',0,1);
$pdf->Cell(130 ,5,'Name',1,0);
$pdf->Cell(25 ,5,'Date',1,0);
$pdf->Cell(34 ,5,'Purpose',1,1);//end of line

$pdf->SetFont('Arial','',12);
$stat = "complete";
//Numbers are right-aligned so we give 'R' after new line parameter
$query = 'SELECT * FROM guest_register WHERE status LIKE "complete" AND MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())';
$pStatement = $conn->prepare($query);
$param = 'complete';
@($pStatement->bind_param('ss', $param2));
$pStatement->execute();
$result = $pStatement->get_result();


while($row = $result->fetch_assoc()){
  $fullname = $row['firstname']." ".$row['middlename']." ".$row['lastname'];
  $pdf->Cell(130 ,5,$fullname,1,0);
  $pdf->Cell(25 ,5,$row['date'],1,0);
  $pdf->Cell(34 ,5,$row['purpose'],1,1,'R');
}
$pdf->Cell(189 ,10,'',0,1);//end of line

$pdf->SetFont('Arial','B',12);
$pdf->Cell(130 ,5,' COMPLETED STUDENT VISITS',0,0);
$pdf->Cell(25 ,5,'',0,0);
$pdf->Cell(34 ,5,'',0,1);
$pdf->Cell(130 ,5,'Name',1,0);
$pdf->Cell(25 ,5,'Date',1,0);
$pdf->Cell(34 ,5,'Purpose',1,1);//end of line

$pdf->SetFont('Arial','',12);
$stat = "complete";
//Numbers are right-aligned so we give 'R' after new line parameter
$query = 'SELECT * FROM user_school_visit WHERE status LIKE "complete" AND MONTH(dateOfVisit) = MONTH(CURRENT_DATE()) AND YEAR(dateOfVisit) = YEAR(CURRENT_DATE())';
$pStatement = $conn->prepare($query);
$param = 'complete';
@($pStatement->bind_param('ss', $param2));
$pStatement->execute();
$result = $pStatement->get_result();

while($row = $result->fetch_assoc()){
  $fullname = $row['firstName']." ".$row['middleName']." ".$row['lastName'];
  $pdf->Cell(130 ,5,$fullname,1,0);
  $pdf->Cell(25 ,5,$row['dateOfVisit'],1,0);
  $pdf->Cell(34 ,5,$row['purpose'],1,1,'R');
}


//output the result
$pdf->Output();
//set font to arial, bold, 14pt

 ?>
