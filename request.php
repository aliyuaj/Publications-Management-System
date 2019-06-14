<?php
session_start();ob_start();
include 'includes/conn.php';
if(isset($_POST['req'])){
		$extras=$_SESSION['ch'];
		$name=$_POST['name'];
		$type=$_POST['type'] ;
		if($type=='staff'){
			$unit=$_POST['unit'];
		}elseif($type=='nstaff'){
					$unit=$_POST['org'];
		}
		$email=$_POST['email'];
		if(!empty($email) &&!empty($name)&&!empty($unit) ){
			foreach($extras as $id){				
				 $query=mysqli_query($con,"SELECT * FROM materials WHERE matID='$id'");
				 $row=mysqli_fetch_assoc($query);
				 $matID=$row['matID'];
				 $reqDate=date('Y-m-d');				
				$query2= mysqli_query($con,"INSERT INTO requests (name,type, unit,email,matID, granted,date) VALUES  
				 ('$name','$type','$unit','$email','$matID','no','$reqDate')");
				$_SESSION['reserve']= "Your requests is being processed. You would be replied as soon as possible<br/> 
				Thank You";						
				header('location:request-details.php');
			}	
		}else {$_SESSION['reserve']= "Fill in all fields";					
				header('location:request-details.php');
								
			}		 
}  

?>