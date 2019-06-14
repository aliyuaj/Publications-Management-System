<?php session_start(); ob_start();
include_once "../includes/conn.php";
$s = $_POST["delId"];
$name=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM materials WHERE matID='$s' LIMIT 1"));
$name=$name['title'];
$sql = mysqli_query($con,"DELETE FROM materials WHERE matID = '$s'");
if(mysqli_affected_rows($con)>0){
	$sql2 = mysqli_query($con,"DELETE FROM pub_media WHERE pub_id = '$s'");
	$_SESSION['delete']="Publication removed.";
	$fname=$_SESSION['name'];
	$id=$_SESSION['id'];
	$qact=mysqli_query($con,"INSERT INTO activities (actID,adminID,adminName,type,activity,date)
	VALUES
	(' ','$id','$fname','Delete','Deleted Publication titled: <b> $name</b>',NOW())");
	header("location: publications.php");
}
else{
	$_SESSION['delete']="Unable to delete publication";
	header("location: publications.php");
}
?>