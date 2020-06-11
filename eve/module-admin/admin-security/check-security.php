<?php
session_start();
if ($_SESSION['permission'] != 2) {
  header('Location: ../../module-landing/landing.php');
}
 ?>
