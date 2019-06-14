<?php session_start(); ob_start();
include_once "../includes/conn.php"; 
echo $s = $_POST["delId"];
$sql = mysqli_query($con,"DELETE FROM units WHERE unitid = '$s'");
if(mysqli_affected_rows($con)==1){
	$_SESSION['db']="Unit successfully removed";
	header("location: managedb.php");
}
else{
	$_SESSION['db']="Unable to delete unit";
	header("location: managedb.php");
}
?>