<?php
/**
 * Created by PhpStorm.
 * User: HP USER
 * Date: 12/15/2016
 * Time: 6:05 AM
 */
session_start();ob_start();
include '../includes/conn.php';
 	$id=$_GET['id'];
$update=mysqli_query($con,"UPDATE users SET suspended='0' WHERE id='$id'");
if(($update)){
    $_SESSION['success']="<h3 style='color:green'>User account activated</h3>";
    header('location:manageusers.php');
}
else{
    $_SESSION['success']="<h3 style='color:red'>Unable to activate user account</h3>";
    header('location:manageusers.php');
}