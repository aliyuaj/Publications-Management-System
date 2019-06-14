<?php
session_start();ob_start();
include '../includes/conn.php';

/**
 * Created by PhpStorm.
 * User: HP USER
 * Date: 1/30/2017
 * Time: 10:10 PM
 */
if(isset($_POST['save'])){
    $id=ucwords(trim($_POST['id']));
    $title=ucwords(trim($_POST['title']));
    $name=ucwords(trim($_POST['name']));
    $email=ucwords(trim($_POST['email']));
    $phone=trim($_POST['phone']);
    $occupation=ucwords(trim($_POST['occupation']));
    $organization=$_POST['organization'];
    $update=mysqli_query($con,"UPDATE users SET title='$title',fullName='$name',email='$email',
  phone='$phone',occupation='$occupation', organization='$organization' WHERE id='$id'");
    if(mysqli_affected_rows($con)>0){
        $_SESSION['done']="User details successfully edited ";
    }else{
    $_SESSION['done']="Unable to update detail ";}
    header('location:edit_user_profile.php?id='.$id);}?>