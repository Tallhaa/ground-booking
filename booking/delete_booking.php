<?php
include 'admin/config.php';

$ID  = $_GET['id'];

mysqli_query($con,"DELETE FROM `booking` WHERE id = $ID");
header('location: view_booking.php');

?>