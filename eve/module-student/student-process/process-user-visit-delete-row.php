<?php

require_once '../../library-process/connection.php';

$id = $_GET['id'];

echo "$id";
$sql = "DELETE FROM user_school_visit WHERE guestcode='$id'";

$result = mysqli_query($conn,$sql);

header("Location:../student-view-visit.php")

?>
