<?php 
	require 'session.php'; ob_start();
	include '../includes/conn.php';
	$pid = $_GET['pid'];
	$rid = $_GET['rid'];
	$numb=mysqli_num_rows(mysqli_query($con,"SELECT * FROM materials JOIN requests ON materials.matID=requests.matID WHERE materials.matID='$pid' && reqID='$rid' LIMIT 1"));
	if($numb==1){
		$name=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM materials JOIN requests ON materials.matID=requests.matID WHERE materials.matID='$pid' && reqID='$rid' LIMIT 1"));
		if($name){
			$copies = $name['copies'];
			if($copies > 0){
				$copies=$copies-1;
				$sql = mysqli_query($con,"UPDATE materials SET copies='$copies' WHERE matID = '$pid'");
				$sql2 = mysqli_query($con,"UPDATE requests SET issued='yes' WHERE reqID = '$rid'");
				if(mysqli_affected_rows($con)>0){
				$_SESSION['request']="Request successfully updated";	
				header('location:requests.php');
				}else echo mysql_error();
			}
		}else echo mysql_error();
	}else {$_SESSION['request']="Requested Publicaton no longer exists";	
				header('location:requests.php');
				}
	?>