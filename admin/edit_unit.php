<?php session_start(); ob_start();
include_once "../includes/conn.php"; 
 $uid = $_POST["editId"];
 $unit = $_POST["editName"];
$sql = mysqli_query($con,"UPDATE units SET unitname='$unit' WHERE unitid = '$uid'");
if(mysqli_affected_rows($con)==1){
	$_SESSION['db']="Unit successfully updated";
	header("location: managedb.php");
}
else{
	$_SESSION['db']="Unable to update unit";
	header("location: managedb.php");
}
?>