<?php session_start(); ob_start();
include_once "../includes/conn.php";
 echo $s = $_POST["delId"];
$name=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM messages WHERE msgID='$s' LIMIT 1"));
$msg=$name['msg'];
$snd=$name['email'];
$sql = mysqli_query($con,"DELETE FROM messages WHERE msgID = '$s'");
if(mysqli_affected_rows($con)>0){
$_SESSION['success']="The message has been deleted.";
$fname=$_SESSION['name'];
$id=$_SESSION['id'];
						$qact=mysqli_query($con,"INSERT INTO activities (adminID,adminName,type,activity,date)
						VALUES
						('$id','$fname','Delete','Deleted Message sent by: <b>$snd</b>;  content: $msg',NOW())");
header("location: message.php");
}
else{ 
$_SESSION['success']="Unable to delete message";
header("location: message.php");

}
?>