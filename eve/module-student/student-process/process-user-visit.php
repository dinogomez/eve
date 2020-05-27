<?php

include_once '../../library-process/connection.php';



$username = mysqli_real_escape_string($conn,$_POST['username']);
$firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
$middlename = mysqli_real_escape_string($conn,$_POST['middlename']);
$lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$date = mysqli_real_escape_string($conn,$_POST['date']);
$date=date("Y-m-d",strtotime($date));
$purpose = mysqli_real_escape_string($conn,$_POST['purpose']);
$idgiven = mysqli_real_escape_string($conn,$_POST['idgiven']);
$contactnum = mysqli_real_escape_string($conn,$_POST['contactnum']);
$generatekey=mysqli_real_escape_string($conn,$_POST['generatekey']);

// echo "firstName:".$firstname;
// echo "firstName:".$middlename;
// echo "firstName:".$lastname;
// echo "firstName:".$email;
// echo "firstName:".$date;
// echo "firstName:".$purpose;
// echo "firstName:".$idgiven;
// echo "firstName:".$contactnum;
// echo "firstName:".$generatekey;

$sql = "INSERT INTO user_school_visit (id, username, firstName, middleName, lastName,email, dateOfVisit, purpose, idType, contactNumber, guestcode)
VALUES (NULL,'$username', '$firstname', '$middlename', '$lastname', '$email', '$date', '$purpose', '$idgiven', '$contactnum', '$generatekey')";

$result = mysqli_query($conn,$sql);

header("Location: ../student-home.php ")


 ?>
