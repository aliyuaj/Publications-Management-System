<?php session_start(); ob_start();
include_once "../includes/conn.php"; 
echo $s = $_POST["delId"];
$name=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM requests WHERE reqID='$s' LIMIT 1"));
$email=$name['email'];
$sql = mysqli_query($con,"DELETE FROM requests WHERE reqID = '$s'");
if(mysqli_affected_rows($con)==1){
	$_SESSION['request']="Request successfully removed";
	$fname=$_SESSION['name'];
	$id=$_SESSION['id'];
	$qact=mysqli_query($con,"INSERT INTO activities (adminID,adminName,type,activity,date)
	VALUES
	('$id','$fname','Delete','Deleted request sent by <b>$email</b>',NOW())");
	header("location: requests.php");
}
else{
	$_SESSION['request']="Unable to delete request";
	header("location: requests.php");
}
?>