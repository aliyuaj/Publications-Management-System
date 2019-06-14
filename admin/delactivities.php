<?php
include_once "../includes/conn.php";
session_start();ob_start();
if(isset($_POST['del'])){
	if(!isset($_POST['extras'])){
		$_POST['extras']=array();		
	}
	$extras=$_POST['extras'];
	if(count($extras)==0){
		$_SESSION['del']="Check activities  you want to delete";
		header("location: myactivity.php");
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
		header("location: myactivity.php");
	}
	else{ 
		$_SESSION['del']="Unable to delete Activities";
		header("location: myactivity.php");
	}			
}  

?>
$mail = new PHPMailer;
$mail->setFrom('abdulaliyu019@gmail.com', 'Your Name');
$mail->addAddress('snueboy@gmail.com', 'My Friend');
$mail->Subject  = 'First PHPMailer Message';
$mail->Body     = 'Hi! This is my first e-mail sent through PHPMailer.';
if(!$mail->send()) {
echo $_SESSION['request']='Message was not sent. Mailer error: ' . $mail->ErrorInfo;
} else {
echo $_SESSION['request']='Message has been sent.';
}