<?php
	function clean($data)
	{
		 $data = trim($data);
		 $data = stripslashes($data);
		 $data = htmlspecialchars($data);
		 return $data;
	}
	function sanitize($str) 
	{
		$str = @trim($str);
		$str = stripslashes($str);
		
		return mysql_real_escape_string($str);
	}
?>