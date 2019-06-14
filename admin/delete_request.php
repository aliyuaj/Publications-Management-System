<?php session_start(); ob_start();
include_once "../includes/conn.php"; 
echo $s = $_POST["delId"];
$sql = mysqli_query($con,"DELETE FROM requests WHERE reqID = '$s'");
if(mysqli_affected_rows($con)==1){
	$_SESSION['request']="Request successfully removed";
	header("location: requests.php");
}
else{
	$_SESSION['request']="Unable to delete request";
	header("location: requests.php");
}
?>