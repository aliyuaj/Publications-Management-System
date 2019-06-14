<?php
include_once "../includes/conn.php";
session_start();ob_start();
if(isset($_POST['return'])){
	$p = $_SESSION['adminact'];
	if(!isset($_POST['extras'])){
		$_POST['extras']=array();		
	}
	$extras=$_POST['extras'];
	if(count($extras)==0){
		$_SESSION['del']="Check issued publication you want to return";
		header("location: issue.php");
		exit();
	}
	foreach($extras as $id){				
		$name=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM requests JOIN materials ON requests.matID=materials.matID WHERE reqID='$id'"));
		$pid=$name['matID'];
		if($name){
			$copies = $name['copies'];
			if($copies > 0){
				$copies=$copies+1;
				$sql = mysqli_query($con,"UPDATE materials SET copies='$copies' WHERE matID = '$pid'");
				$sql2 = mysqli_query($con,"UPDATE requests SET returned='yes' WHERE reqID = '$id'");
			}
		}else echo @mysqli_error($con);
	}
	if(mysqli_affected_rows($con)>0){
		if(count($extras)==1){
			$_SESSION['del']="Publication returned and updated";
		}
		elseif(count($extras)>1){
			$_SESSION['del']="Publications returned and updated";
		}
		header("location: issue.php");
	}
	else{ 
		$_SESSION['del']="Unable to return publications";
		header("location: issue.php");
	}			
}  

?>