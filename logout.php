<?php 
session_start();
include 'includes/conn.php';
	mysqli_query($con,$query4);
session_destroy();
header('location:index.php');
?>
