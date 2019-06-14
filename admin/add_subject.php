<?php session_start(); ob_start();
include_once "../includes/conn.php"; 
 $subject = $_POST["addname"];
$sql = mysqli_query($con,"INSERT INTO subjects(subjectName) VALUES ('$subject')");
if(mysqli_affected_rows($con)==1){
	$_SESSION['db']="Subject successfully added";
	header("location: managedb.php");
}
else{
	$_SESSION['db']="Unable to add subject";
	header("location: managedb.php");
}
?>