<?php session_start(); ob_start();
include_once "../includes/conn.php";
 $s = $_POST["delId"];
$name=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM admin WHERE id='$s' LIMIT 1"));
$name=$name['fullName'];
$sql = mysqli_query($con,"DELETE FROM admin WHERE id = '$s'");
if(mysqli_affected_rows($con)==1){
$_SESSION['success']="The admin was successfully removed .";
$fname=$_SESSION['name'];
$id=$_SESSION['id'];
	$qact=mysqli_query($con,"INSERT INTO activities (actID,adminID,adminName,type,activity,date)
	VALUES
	(' ','$id','$fname','Delete','Deleted <b>$name</b> from Admin List',NOW())");
header("location: manageadmin.php");
}
else{
$_SESSION['success']="unable to delete admin";
header("location: manageadmin.php");

}
?>