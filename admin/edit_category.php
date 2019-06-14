<?php session_start(); ob_start();
include_once "../includes/conn.php"; 
 $cid = $_POST["editId"];
 $category = $_POST["editName"];
$sql = mysqli_query($con,"UPDATE categories SET catName='$category' WHERE catID = '$cid'");
if(mysqli_affected_rows($con)==1){
	$_SESSION['db']="Category successfully updated";
	header("location: managedb.php");
}
else{
	$_SESSION['db']="Unable to update category";
	header("location: managedb.php");
}
?>