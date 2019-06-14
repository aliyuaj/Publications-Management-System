<?php
session_start();ob_start();
include '../includes/conn.php';
if (isset($_POST['save'])){
	$id=$_POST['id'];
	$title=ucwords(trim($_POST['title']));
	$author=ucwords(trim($_POST['author']));
	$sponsor=ucwords(trim($_POST['sponsor']));
	$lang=trim($_POST['language']);
	$loc=ucwords(trim($_POST['location']));
	$copies=$_POST['copies'];
	$pnum=$_POST['pnum'];
	$cat=$_POST['category'];
	$year=$_POST['year'];
	$synopsis=ucfirst(trim($_POST['synopsis']));
	$month=$_POST['month'];
	$date=$_POST['date'];


    $update=mysqli_query($con,"UPDATE materials SET copies='$copies',title='$title',author='$author',sponsor='$sponsor',language='$lang',pubNum='$pnum', synopsis='$synopsis',pubYear='$year', category='$cat', month='$month',
	location='$loc' WHERE matID='$id'");
	if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
		$valid_formats = array("jpg", "png", "jpeg", "gif", "bmp");
		$image = $_FILES["image"] ["name"];
		$size = $_FILES["image"] ["size"];
		list($txt1, $ext1) = explode(".", $image);
		$ext=strtolower($ext1);
		$txt=strtolower($txt1);
		if(in_array($ext,$valid_formats) && $size<(1024*1024)){
			$actual_image_name = time().str_replace(" ", "_", $txt).".".$ext;
			$file=$_FILES['image']['tmp_name'];
			$save_image=move_uploaded_file($file,"../uploads/" . $actual_image_name);			
			if($save_image){
		$checkImageQuery=mysqli_num_rows(mysqli_query($con,"SELECT  from pub_media WHERE pub_id='$id' && type='file'"));
		if($checkImageQuery==1){
			$update=mysqli_query($con,"update pub_media SET source='$newName' where pub_ID='$id' && type='image'");
			$_SESSION['pix']="<h5 style='color:green'>Image upload successful</h5>";
		}elseif($checkquery==0){
			$insert=mysqli_query($con,"insert into pub_media values('','$id','image','$newName','0')");
			$_SESSION['pix']="<h5 style='color:green'>Image upload successful</h5>";
		}
		}
			echo $location=$actual_image_name;
			if(!$insert=mysqli_query($con,"update pub_media SET source='$location' where pub_ID='$id' && type='image'")) {
				echo mysqli_error($con);
			}
			else{
			$_SESSION['pix']="<h5 style='color:green'>image uploaded</h5>";
			}
		}
		else
			{
			$_SESSION['pix']="<h5 style='color:red'>Format is not allowed or file size is too big!</h5>";
		}
	}
	//file upload
	if(isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])){
		$file_name=time().str_replace(" ", "_",$_FILES['file']['name']);
		$size=$_FILES['file']['size'];
		$type=strtolower($_FILES['file']['type']);
		$temp=$_FILES['file']['tmp_name'];
		//$valid_formats=array("pdf","doc","docx","ppt","txt","Applications.pdf");
		if(strtolower(($_FILES['file']['type']))=="pdf" or strtolower(($_FILES['file']['type']))=="application/pdf" 
		or strtolower(($_FILES['file']['type']))=="application/msword"
		or strtolower(($_FILES['file']['type']))=="application/vnd.ms-word"  
		or strtolower(($_FILES['file']['type']))=="binary/octet-stream"  
		or strtolower(($_FILES['file']['type']))=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"  
		or strtolower(($_FILES['file']['type']))=="application/vnd.openxmlformats-officedocument.wordprocessingml.document" 
		or strtolower(($_FILES['file']['type']))=="application/vnd.ms-powerpoint"){
			if(($_FILES['file']['size'])/1000<=20480){
				$newName =$file_name;
					$save_file=move_uploaded_file($temp,"../uploads/" .$newName);	
				if($save_file){
					$checkFileQuery=mysqli_num_rows(mysqli_query($con,"SELECT * from pub_media WHERE pub_id='$id' && type='file'"));
					if($checkFileQuery!=0){
						$update=mysqli_query($con,"update pub_media SET source='$newName' where pub_ID='$id' && type='file'");
						$_SESSION['file']="<h5 style='color:green'>File upload successful</h5>";
					}else{
						$insert=mysqli_query($con,"insert into pub_media values('','$id','file','$newName','0')");
						$_SESSION['file']="<h5 style='color:green'>File upload successful</h5>";
					}
				}
				else{
				$_SESSION['file']="<h5 style='color:red'>There was a problem while uploading this file.</h5>";
				}	
			}
			else{		
				$_SESSION['file']="<h5 style='color:red'>Size too big</h5>";				
			}
		}
		else{
			$_SESSION['file']="<h5 style='color:red'>Invalid file format</h5>";
		}			
	}
	if(mysqli_affected_rows($con)>0){
	$_SESSION['done']="The publication with ID $id has been updated successfully";	
	$fname=$_SESSION['name'];
	$aid=$_SESSION['id'];
		$qact=mysqli_query($con,"INSERT INTO activities (actID,adminID,adminName,type,activity,date)
		VALUES(' ','$aid','$fname','Edit Details','Publication details of <b>$title</b> edited',NOW())");
		header('location:edit.php?id='.$id);
	} else {
		$_SESSION['done']="Unable to update publication ";
		header('location:edit.php?id='.$id);
	}
}
?> 