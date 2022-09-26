<?php
include 'config.php';

$ID  = $_GET['id'];

mysqli_query($con,"DELETE FROM `tblcard` WHERE id = $ID");
header('location: index.php');

?>