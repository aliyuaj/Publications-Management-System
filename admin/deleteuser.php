<?php
/**
 * Created by PhpStorm.
 * User: HP USER
 * Date: 1/14/2017
 * Time: 2:25 AM
 */
session_start(); ob_start();
include_once "../includes/conn.php";
 $s = $_POST["delId"];
$name=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM users WHERE id='$s' LIMIT 1"));
$name=$name['fullName'];
$sql = mysqli_query($con,"DELETE FROM users WHERE id = '$s'");
if(mysqli_affected_rows($con)==1){
    $_SESSION['success']="The user was successfully removed .";
    $fname=$_SESSION['name'];
    $id=$_SESSION['id'];
    $qact=mysqli_query($con,"INSERT INTO activities (adminID,adminName,type,activity,date)
VALUES
('$id','$fname','Delete','Deleted <b>$name</b> from Users' List',NOW())");
    header("location: manageusers.php");
}
else{
    $_SESSION['success']="unable to delete user";
    header("location: manageusers.php");

}
?>