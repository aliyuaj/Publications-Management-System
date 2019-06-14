<?php require 'session.php';ob_start();
include '../includes/conn.php';?>
    <!DOCTYPE html>
    <html lang="en">
    <!-- Mirrored from getbootstrap.com/examples/starter-template/ by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 02 Oct 2013 12:14:27 GMT -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../img/naerls_logo.png">
        <title>Publications: Admin</title>
        <script src="../assets/jquery-2.1.3.min.js"></script>
        <!-- Bootstrap core CSS -->
        <link href="../dist/css/bootstrap.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="../dist/css/starter-template.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="../assets/js/html5shiv.js"></script>
        <script src="../assets/js/respond.min.js"></script>
        <![endif]-->
        <script>
            $(document).ready(function(){
                $('#subject').change(function(){
                    var subject = document.getElementById('subject').value
                        $('#sub_subjdiv').show();
                    $.get("sub_subj.php", {subjectID:$("#subject").val()}, function(data){$("#sub_subjdiv").html(data);});
                    var subsubject = document.getElementById('subsubj').value
                    $('#sub_subjdiv').change(function(){
                    $('#sub_sub_subjdiv').show();
                    $.get("sub_sub_subj.php", {subjectID:$("#subsubj").val()}, function(data){$("#sub_sub_subjdiv").html(data);});
                    });
                });

            })
        </script>
    </head>
    <body>
    <?php include 'header.php'; ?>
    <div class="container" id="cc">
        <div class="starter-template">
            <div  role="main">
                <div class="err-msg" align="center" style="font-size:20px">
                <?php
		if(isset($_SESSION['ERR_MSG_ARR'])) {
			echo "<div class='alert alert-success' style='color: red; font-size: 20px;'>";
			foreach($_SESSION['ERR_MSG_ARR'] as $err){
				echo $err.'<br>';
			}
			echo "</div>";
			unset($_SESSION['ERR_MSG_ARR']);
		}
		if(isset($_SESSION['ERR_MSG_ARR'])) {
            echo "<div class='alert alert-success' style='color: red; font-size: 20px;'>";
            foreach($_SESSION['ERR_MSG_ARR'] as $err){
                echo $err.'<br>';
            }
            echo "</div>";
            unset($_SESSION['ERR_MSG_ARR']);
        }
        if(isset($_SESSION['comp'])) {
            echo $_SESSION['comp']; unset($_SESSION['comp']);
        }
        if(isset($_SESSION['pix'])) {
            echo $_SESSION['pix']; unset($_SESSION['pix']);
        }
        if(isset($_SESSION['file'])) {
            echo $_SESSION['file']; unset($_SESSION['file']);
        }
		?></div>
<form  action="index.php" method="POST" enctype="multipart/form-data" style="padding-left:5px;">
<fieldset>
<legend style='font-family:Palatino Linotype;font-size:30px;color:green;' align="center">Add New Publication</legend>
	<div class="table-responsive">
        <span style="font-size: =20px;font-weight: bold;font-style: italic;align: left">All fields with <span style="color: red">*</span> are required.</span>
	<table class="table table-stripped table-bordered" style="width:100%">
		 <tr><td>Title <span style="color: red">*</span> </td><td colspan="3">
                 <input name="title"  type="text" class="form-control"
                        value="<?php if(isset($_POST['title'])){ echo $_POST['title']; } ?>" id="title" />
		</td>
		</tr>	
		<tr><td>Category: <span style="color: red">*</span> </td>
		<td>
			<div class="input-container">
			  <select name="cat" id="cat" class="form-control" value="<?php if(isset($_POST['cat'])){ echo $_POST['cat']; } ?>">
			    <option value="sel">...Select Category...  </option>
			    <?php
					$categoryQuery=mysqli_query($con,"SELECT * FROM categories");
					while($category=mysqli_fetch_assoc($categoryQuery)){
						echo "<option value='".$category['catID']."'>".$category['catName']."</option>";
					}
				?>
              </select>
			</div>
		</td><td>Subject <span style="color: red">*</span></td>
		<td>
            <div class="input-container" id="subjdiv">
                <?php
                $subjectQuery1=mysqli_query($con,"SELECT * FROM subjects");
                //$subjectQuery2="SELECT * FROM sub_subjects WHERE sub_subjects.subjectID=$subID";
                $subjectQuery3=mysqli_query($con,"SELECT * FROM subjects");
                echo '<div class="form-group"><select name="subj"  class="form-control" id="subject">
			    <option value="">...Select subject...</option>';
                while($subjects=mysqli_fetch_assoc($subjectQuery1)){
                    $subjectID=$subjects['subjectID'];
                    echo "<option value='".$subjectID."'>".$subjects['subjectName']."</option>";
                }

                echo '</select></div>';

                ?>
            </div>
            <div class="input-container" id="sub_subjdiv" hidden>

            </div>
            <div class="input-container" id="sub_sub_subjdiv" hidden>

            </div>
		</td></tr>
	  	<tr><td>Authors: <span style="color: red">*</span></td>
		<td ><input name="author" type="text" class="form-control"  id="author" placeholder="Seperate authors with comma (,)"value="" /></td>
		<td>Sponsors:</td>		
		<td ><input name="sponsor" type="text" class="form-control"  placeholder="Publication Sponsors" value="<?php if(isset($_POST['sponsor'])){ echo $_POST['sponsor']; } ?>" /></td></tr>
		
		<tr><td>Location</td>
		<td ><input name="location" type="text" class="form-control" id="loc" placeholder="Where kept (eg. Shelf No.)" value="<?php if(isset($_POST['location'])){ echo $_POST['location']; } ?>"/></td>
		<td>Pub. Number:</td>
		<td ><input name="pnum" type="text" class="form-control" placeholder="publication number (eg. Series No.)" value="<?php if(isset($_POST['pnum'])){ echo $_POST['pnum']; } ?>"></td>
		</tr>
		<tr><td>Publication Year:</td>
		<td ><input name="year" type="text" class="form-control" maxlength="4" value="<?php if(isset($_POST['year'])){ echo $_POST['year']; } ?>"/></td>
		<td>Month (Journals)</td>
		<td ><div class="input-container">
			  <select name="month" class="form-control">			    
			  <option value="">...Select Month...</option>
			    <option value="January">January</option>
			    <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
				<option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>

              </select>
			</div></td>		
		</tr>
		<tr><td>Copies:</td>
		<td ><input name="text" type="number" class="form-control" maxlength="15" value=""/></td>
		<td>Date Added:</td>
		<td ><input name="today" type="text" class="form-control" value="<?php echo date('Y-m-d');?>"readonly/></td>
		</tr>
		<tr><td>Language:</td>
		<td ><input name="lang" type="text" class="form-control" value=""></td>
		<td>Synopsis:</td>
		<td><textarea name="synopsis" class="form-control" maxlength="250" placeholder="Enter synopsis here (NOTE: maximum text length is 250 characters)"
                      value="<?php if(isset($_POST['synopsis'])){ echo $_POST['synopsis']; } ?>"></textarea></td></tr>
		<tr id="image">
		<td>Add Image: <span class="glyphicon glyphicon-picture"></span></td>
		<td colspan="3"><input name="image" type="file" class="form-control" /></td></tr>
		<tr id="file">
		<td>Add File (PDF, doc, ppt): <span class="glyphicon glyphicon-paperclip"></span></td>
		<td colspan="3"><input name="file" type="file" class="form-control" /></td>
		</tr>
		<tr><td></td><td colspan="3">
		<div class="text-right">
			  <input type="submit"  value="Add" name="add" class="btn btn-success" />
		</div> 
	</td></tr>
	</table></div>
	</fieldset>
		</form>
    </div>
    </div>
    </div>
	<div id="push"></div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
	<script src="../includes/footer.js"></script>
  </body>
<!-- Mirrored from getbootstrap.com/examples/starter-template/ by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 02 Oct 2013 12:14:27 GMT -->
</html>
<?php 
if(isset($_POST['add'])){
	$title= ucwords(trim($_POST['title']));
	$author=ucwords(trim($_POST['author']));
	$sponsor=ucwords(trim($_POST['sponsor']));
	$copies=trim($_POST['copies']);
	$loc=ucwords(trim($_POST['location']));
	$year=trim($_POST['year']);
	$month=ucwords(trim($_POST['month']));
	$cat=trim($_POST['cat']);
	$pnum=trim($_POST['pnum']);
	$lang=trim($_POST['lang']);
	$synopsis=ucfirst(trim($_POST['synopsis']));
	$today=$_POST['today'];
    $subject=ucwords($_POST['subj']);
    $sub_subject=$_POST['subsubj'];
    $sub_sub_subject=$_POST['subsubsubj'];

	$err_flag = false;
	$err_msg_arr = array();

	//Validation of control

	if($title == '') {
	$err_flag = true;
	$err_msg_arr[] = 'Publication title ';
	}
	if($cat == 'sel') {
	$err_flag = true;
	$err_msg_arr[] = 'Select publication category';
	}
    if($author == '') {
        $err_flag = true;
        $err_msg_arr[] = 'Publication author ';
    }if($subject == '') {
        $err_flag = true;
        $err_msg_arr[] = 'Publication subject ';
    }
    if($copies == '') {
        $copies= 1;
    }
	if(is_nan($copies)){
	$err_flag = true;
	$err_msg_arr[] = 'Copies should be a number';
	}
	if($err_flag == true) {
	$_SESSION['ERR_MSG_ARR'] = $err_msg_arr;
	header("location: index.php");
	exit();
	}
	//add publication
    $idquery= mysqli_query($con,"SELECT * FROM materials  ORDER BY matID DESC LIMIT 1");
    $row=mysqli_fetch_assoc($idquery);
    $lastID= $row['matID'];
    $nextID = $lastID+1;
		$query1=mysqli_query($con,"INSERT INTO materials
		(matID,copies,title,author,sponsor,pubNum,language,synopsis,subject,sub_subjects,sub_sub_subjects,pubYear,category,month,today,location)
		VALUES
		('$nextID','$copies','$title','$author','$sponsor','$pnum','$lang','$synopsis','$subject','$sub_subject','$sub_sub_subject','$year','$cat','$month','$today','$loc')");
	if(mysqli_affected_rows($con)>0) {
		$_SESSION['comp']="<div class='alert alert-success'><b>$title</b> has been added</b></div>";
	}
	else{
		$_SESSION['comp']="<div class='alert alert-danger'> Unable to add <u>$title</u> due to".mysqli_error($con)."</div>";
	}
	//image upload
	if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
		$valid_formats = array("jpg", "png", "jpeg", "gif", "bmp");
		$image = $_FILES["image"] ["name"];
		$size = $_FILES["image"] ["size"];
		list($txt1, $ext1) = explode(".", $image);
		$ext=strtolower($ext1);
		$txt=strtolower($txt1);
		if(in_array($ext,$valid_formats)){
			if($size<(1024*1024)){
				$actual_image_name = time().str_replace(" ", "_", $txt).".".$ext;
				$file=$_FILES['image']['tmp_name'];
				move_uploaded_file($file,"../uploads/images/" . $actual_image_name);
				$location=$actual_image_name;
				if(!$insert=mysqli_query($con,"insert into pub_media(pub_id,type,source,downloads) values('$nextID','image','$location','0')")) {
                    $_SESSION['pix']="<div class='alert alert-success'>Image successfully uploaded</div>".mysqli_error($con);
				}
				else{
					$_SESSION['pix']="<div class='alert alert-success'>Image successfully uploaded</div>";
				}
			}
			else{
				$_SESSION['pix']="<div class='alert alert-danger'>File size is too big!</div>";
			}
		}else{
				$_SESSION['pix']="<div class='alert alert-danger'>Not a valid file format</div>";
		}
	}else {
		$defaultImage=mysqli_query($con,"insert into pub_media (pub_id,type,source,downloads) values('$nextID','image','pubimage.png','0')");
        echo mysqli_error($con);
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
			or strtolower(($_FILES['file']['type']))=="application/vnd.openxmlformats-officedocument.wordprocessingml.document" 
			or strtolower(($_FILES['file']['type']))=="application/vnd.ms-word.template.macroenabled.12.dotm" 
			or strtolower(($_FILES['file']['type']))=="binary/octet-stream"  
			or strtolower(($_FILES['file']['type']))=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"  
			or strtolower(($_FILES['file']['type']))=="application/vnd.ms-powerpoint"){
			if(($_FILES['file']['size'])/1000<=20480){
				$newName = $file_name;
				$save_file=move_uploaded_file($temp,"../uploads/articles/".$newName);
				if($save_file){
					$insert=mysqli_query($con,"insert into pub_media (pub_id,type,source,downloads)  values('$nextID','file','$newName','0')");
					$_SESSION['file']="<div class='alert alert-success'>File upload successful</div>";
                    echo mysqli_error($con);

                }
				else{
					$_SESSION['file']="<div class='alert alert-danger'>There was a problem while uploading this file.</div>";
				}	
			}
			else{		
				$_SESSION['file']="<div class='alert alert-danger'>Size too big</div>";				
			}
		}
		else{
			$_SESSION['file']="<div class='alert alert-danger'>Invalid file format</div>";
		}		
	}
	header("location: index.php");
	exit();
}
?>