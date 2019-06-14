<?php 
session_start();
include '../includes/conn.php';
 $query4="UPDATE 	admin SET 	lastSeen=NOW() WHERE id='".$_SESSION['id']."'";
	mysqli_query($con,$query4);		
session_destroy();
header('location:../index.php');	
?>
