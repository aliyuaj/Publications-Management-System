<?php
/**
 * Created by PhpStorm.
 * User: HP USER
 * Date: 1/14/2017
 * Time: 9:36 AM
 */
session_start(); ob_start();
include_once "../includes/conn.php";
echo $s = $_POST["delId"];
$name=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM pub_media WHERE pub_id='$s' AND type='file' LIMIT 1"));
$email=$name['email'];
$sql = mysqli_query($con,"UPDATE pub_media SET downloads='0' WHERE pub_id='$s' AND type='file' LIMIT 1 ");
if(mysqli_affected_rows($con)==1){
    $_SESSION['request']="Download successfully removed";
    $fname=$_SESSION['name'];
    $id=$_SESSION['id'];
    $qact=mysqli_query($con,"INSERT INTO activities (adminID,adminName,type,activity,date)
	VALUES
	('$id','$fname','Delete','Deleted downloads',NOW())");
    header("location: downloads.php");
}
else{
    $_SESSION['request']="Unable to delete download";
    header("location: downloads.php");
}
?>