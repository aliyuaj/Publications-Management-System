<?php
include_once "../includes/conn.php";
session_start();ob_start();
if(isset($_POST['del'])){
	$p = $_SESSION['adminact'];
	if(!isset($_POST['extras'])){
		$_POST['extras']=array();		
	}
	$extras=$_POST['extras'];
	if(count($extras)==0){
		$_SESSION['del']="Check activities  you want to delete";
		header("location: activities.php");
		exit();
	}
	foreach($extras as $id){				
	$sql = mysqli_query($con,"DELETE FROM activities WHERE actID = '$id'");
	}
	if(mysqli_affected_rows($con)>0){
		if(count($extras)==1){
			$_SESSION['del']="Activity deleted";
		}
		elseif(count($extras)>1){
			$_SESSION['del']="Activities deleted";
		}
		header("location: activities.php?id=$p");
	}
	else{ 
		$_SESSION['del']="Unable to delete Activities";
		header("location: activities.php?id=$p");
	}			
}  

?>