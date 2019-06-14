<?php
	 session_start();//Start session
		//Check whether the session variable log is present or not
	if(!isset($_SESSION['log_group']) || (trim($_SESSION['log_group']) == '')) {
		header("location: ../404_log.php");
		exit();
	}
	
?>