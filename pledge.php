<?php
/**
 * Created by PhpStorm.
 * User: HP USER
 * Date: 1/13/2017
 * Time: 12:16 AM
 */
session_start();ob_start();
include 'includes/conn.php';

if(isset($_POST['create'])){
    $title=trim($_POST['title']);
    echo $fname=trim($_POST['name']);
    $email=trim($_POST['email']);
    $organization=trim($_POST['organization']);
    $designation=trim($_POST['designation']);
    $phone=trim($_POST['phone']);
    $type=trim($_POST['type']);
    $subject=trim($_POST['subject']);
    $othersubj=trim($_POST['othersubj']);
    $area=trim($_POST['area']);
    $quantity=trim($_POST['quantity']);
    $beneficiaries=trim($_POST['beneficiaries']);
    $timeline=trim($_POST['timeline']);
    if($subject=='Others'){
        $subject=$othersubj;
    }
    $query1=mysqli_query($con,"INSERT INTO donations (title,name,organization,designation,email,
      phone,pub_type,subject_area,specificarea,quantity,beneficiary,timeline,date)
    VALUES
    ('$title','$fname','$organization','$designation','$email',
    '$phone','$type','$subject','$area','$quantity','$beneficiaries','$timeline',CURDATE())");
    echo mysqli_error($con);
    if(mysqli_affected_rows($con)>0) {
        $_SESSION['pledge']="You have successfully pledged to donate".mysqli_error($con);;
        header('location:pledge_donation.php');
    }
    else{
        mysqli_error($con);
        $_SESSION['pledge']=" Unable to pledge donation. Please try again".mysqli_error($con);;
        header('location:pledge_donation.php');
    }
}else {$_SESSION['pledge']=" rtvgbh";
    header('location:pledge_donation.php');}
?>

