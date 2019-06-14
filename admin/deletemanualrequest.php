<?php
/**
 * Created by PhpStorm.
 * User: HP USER
 * Date: 1/14/2017
 * Time: 9:22 AM
 */ session_start(); ob_start();
include_once "../includes/conn.php";
echo $s = $_POST["delId"];
$name=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM manual_request WHERE id='$s' LIMIT 1"));
$email=$name['email'];
$sql = mysqli_query($con,"DELETE FROM manual_request WHERE id= '$s'");
if(mysqli_affected_rows($con)==1){
    $_SESSION['request']="Request successfully removed";
    $fname=$_SESSION['name'];
    $id=$_SESSION['id'];
    $qact=mysqli_query($con,"INSERT INTO activities (adminID,adminName,type,activity,date)
	VALUES
	('$id','$fname','Delete','Deleted manual request sent by <b>$email</b>',NOW())");
    header("location: manual_requests.php");
}
else{
    $_SESSION['request']="Unable to delete request";
    header("location: manual_requests.php");
}
?>