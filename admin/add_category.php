<?php session_start(); ob_start();
include_once "../includes/conn.php"; 
 $category = $_POST["addname"];
$sql = mysqli_query($con,"INSERT INTO categories(catName) VALUES ('$category')");
if(mysqli_affected_rows($con)==1){
	$_SESSION['db']="category successfully added";
	header("location: managedb.php");
}
else{
	$_SESSION['db']="Unable to add category";
	header("location: managedb.php");
}
?>