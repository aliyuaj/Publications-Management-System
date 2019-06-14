<?php session_start(); ob_start();
include_once "../includes/conn.php";

$s = $_GET["id"];
$sql = mysqli_query($con,"UPDATE users SET type='main' WHERE id = '$s'");
if($sql){
$_SESSION['change']="Successfully changed to main admin";
	$fname=$_SESSION['name'];
$id=$_SESSION['id'];
$name=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM users WHERE id='$s' LIMIT 1"));
$name=$name['fullName'];
	$qact=mysqli_query($con,"INSERT INTO activities (adminID,adminName,type,activity,date)
	VALUES('$id','$fname','Update Type','Changed Admin type of <b>$name</b> to Main',NOW())");
header("location: manageadmin.php");
}
else{
$_SESSION['change']="unable to change to main admin";
header("location: manageadmin.php");

}
?>