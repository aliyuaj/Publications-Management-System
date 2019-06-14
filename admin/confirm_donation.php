<?php
/**
 * Created by PhpStorm.
 * User: HP USER
 * Date: 1/14/2017
 * Time: 1:35 AM
 */ session_start(); ob_start();
include_once "../includes/conn.php";

$s = $_POST["donId"];
$sql = mysqli_query($con,"UPDATE donations SET fulfilled='yes' WHERE id = '$s'");
if($sql){
    $_SESSION['request']="Successfully changed donation status";
    $fname=$_SESSION['name'];
    $id=$_SESSION['id'];
    $name=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM users WHERE id='$s' LIMIT 1"));
    $name=$name['fullName'];
    $qact=mysqli_query($con,"INSERT INTO activities (actID,adminID,adminName,type,activity,date)
	VALUES(' ','$id','$fname','Update Type','Changed donation status of <b>$name</b> to fulfilled',NOW())");
    header("location: donations.php");
}
else{
    $_SESSION['request']="unable to change donation status".mysqli_error($con);
    header("location: donations.php");

}
?>