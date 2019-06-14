<?php session_start(); ob_start();
include_once "../includes/conn.php"; 
 $sid = $_POST["editId"];
 $subject = $_POST["editName"];
$sql = mysqli_query($con,"UPDATE subjects SET subjectName='$subject' WHERE subjectID = '$sid'");
if(mysqli_affected_rows($con)==1){
	$_SESSION['db']="Subject successfully updated";
	header("location: managedb.php");
}
else{
	$_SESSION['db']="Unable to update subject";
	header("location: managedb.php");
}
?>