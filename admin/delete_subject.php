<?php session_start(); ob_start();
include_once "../includes/conn.php"; 
echo $s = $_POST["delId"];
$sql = mysqli_query($con,"DELETE FROM subjects WHERE subjectID = '$s'");
if(mysqli_affected_rows($con)==1){
	$_SESSION['db']="Subject successfully removed";
	header("location: managedb.php");
}
else{
	$_SESSION['db']="Unable to delete subject";
	header("location: managedb.php");
}
?>