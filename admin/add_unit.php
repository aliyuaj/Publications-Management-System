<?php session_start(); ob_start();
include_once "../includes/conn.php"; 
 $unit = $_POST["addname"];
$sql = mysqli_query($con,"INSERT INTO units(unitname) VALUES ('$unit')");
if(mysqli_affected_rows($con)==1){
	$_SESSION['db']="Unit successfully added";
	header("location: managedb.php");
}
else{
	$_SESSION['db']="Unable to add unit";
	header("location: managedb.php");
}
?>