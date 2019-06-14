<?php require 'session.php';

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
    <title>Publications: Admin Edit Details</title>
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
            $('#subjdiv').change(function(){
                //var subject = document.getElementById('subject').value
                $('#sub_subjdiv').show();
                $.get("sub_subj.php", {subjectID:$("#subjdiv").val()}, function(data){$("#sub_subjdiv").html(data);});
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
		<div class="err-msg" align="center" style="font-size:20px"> 
		<?php  if(isset($_SESSION['done'])) {
            echo $_SESSION['done']; unset($_SESSION['done']);
        }
        if(isset($_SESSION['pix'])) {
            echo $_SESSION['pix']; unset($_SESSION['pix']);
        }
        if(isset($_SESSION['fle'])) {
            echo $_SESSION['file']; unset($_SESSION['file']);
        }
		?>
		</div>
		<div class="row">
			<form method="post" action="publication_editor.php" enctype="multipart/form-data">
			<?php $s = $_GET["id"];
			echo	"<div style='font-family:Palatino Linotype;font-size:30px;color:green;' class='lead'>Edit Publication Detail</div>";
			$result = mysqli_query($con,"SELECT * FROM materials JOIN categories ON category=catID WHERE matID='$s'");
			while($row = mysqli_fetch_assoc($result))
			  {  
				$imagequery = mysqli_query($con,"SELECT * FROM pub_media WHERE pub_id='$s' && type='image'");
				$image = mysqli_fetch_assoc($imagequery);
					echo '<table class="table table-bordered stay-center" style="min-width:80%" >';
					echo'<tr><td><span class="tl">Pub. ID:</span></td>';
					echo'<td colspan=""><input type="text" name="id" class="form-control" value="'. $row['matID'] .'" READONLY></td>
					<td valign="top" rowspan="3"><img src="../uploads/images/'.$image['source'].'" class="img img-thumbnail" height="160px" width="160px"  id="preview"></td></tr>';
					echo'<tr><td><span class="tl">Title:</span></td>';
					echo'<td colspan=""><textarea name="title" class="form-control" maxlength="200">'.$row['title'].'</textarea></td></tr>'; 
					echo'<tr><td><span class="tl">Authors:</span></td>';
					echo'<td colspan=""><input type="text" name="author" class="col-md-4 form-control" value="'. $row['author'] .'"></td></tr>'; 
					echo'<tr><td><span class="tl">Synopsis:</span></td>';
					echo'<td colspan="2"><textarea name="synopsis" class="form-control" maxlength="200">'.$row['synopsis'].'</textarea></td></tr>'; 
					echo'<tr><td><span class="tl">Sponsors:</span></td>';
					echo'<td colspan="2"><input type="text" name="sponsor" class="form-control" value="'. $row['sponsor'] .'"></td></tr>'; 
					echo'<tr><td><span class="tl">Language:</span></td>';
					echo'<td colspan="2"><input type="text" name="language" class="form-control" value="'. $row['language'] .'" ></td></tr>'; echo'<tr><td><span class="tl">Pum. Number:</span></td>';
					echo'<td colspan="2"><input type="text" name="pnum" class="form-control" value="'. $row['pubNum'] .'"></td></tr>'; 
					echo'<tr><td><span class="tl">Copies:</span></td>';
					echo'<td colspan="2"><input type="number" name="copies" class="form-control" value="'. $row['copies'] .'"></td></tr>';
					echo'<tr><td><div class="tl">Location</div></td>';
					echo'<td colspan="2"><input type="text" name="location" class="form-control" value="'. $row['location'] .'"></td></tr>';
					echo '<tr><td><div class="tl">Category</div></td>';
					echo '<td colspan="2"><select name="category" class="form-control">';
					$cat=$row['catName'];
					$catID=$row['catID'];
					echo "<option value='$catID' selected='selected'>";
					echo $cat;
					echo '</option>';
					$categoryQuery=mysqli_query($con,"SELECT * FROM categories WHERE catName!='$cat'");
					while($categories=mysqli_fetch_assoc($categoryQuery)){
						$category=$categories['catName'];
						$categoryID=$categories['catID'];
						echo "<option value='$categoryID' >".$category."</option>";
					}
					echo '</select></td></tr>';
					 echo '<tr><td><div class="tl">Subject</div></td>';
					 $subject=$row['subject'];
					  $thisSubjectQuery=mysqli_query($con,"SELECT * FROM subjects WHERE subjectID='$subject'");
					  $thisSubject=mysqli_fetch_assoc($thisSubjectQuery);
					  $currentSubject=$thisSubject['subjectName'];
					  echo '<td colspan="2"><div class="form-group"> <select name="subject" class="form-control" id="subjdiv">';
					  $currentSubjectID=$thisSubject['subjectID'];
						echo "<option value='$currentSubjectID' selected='selected'>";
						echo $currentSubject;
						echo '</option>';
						$subjectQuery=mysqli_query($con,"SELECT * FROM subjects WHERE subjectName!='$currentSubject'");
						while($subjects=mysqli_fetch_assoc($subjectQuery)){
						$subject=$subjects['subjectName'];
						$subjectID=$subjects['subjectID'];
						echo "<option value='$subjectID' >".$subject."</option>";
						}
					  echo '</select></div>

                    <div class="input- form-group" id="sub_subjdiv" hidden>

                    </div>
                    <div class="input-container form-group" id="sub_sub_subjdiv" hidden>

                    </div>
                    </td></tr>';
					  
				echo'<tr><td><div class="tl">Pub. Year:</div></td>';
					  echo'<td colspan="2"><input type="text" name="year" class="form-control" value="'. $row['pubYear'] .'"></td></tr>';
				echo'<tr><td><div class="tl">Month:</div></td>';
					  echo'<td colspan="2"><input type="text" name="month" class="form-control" value="'. $row['month'] .'"></td></tr>';
						echo'<tr><td><div class="tl">Date Added:</div></td>';
					  echo'<td colspan="2"><input type="text" name="date" class="form-control" value="'. $row['today'] .'"></td></tr>';
					  echo'<tr><td><div class="tl">Image:</div></td>';
						echo'<td colspan="2"><input type="file" name="image" class="form-control"></td></tr>';
					  echo'<tr><td><div class="tl">File:</div></td>';
					  echo'<td colspan="2"><input type="file" name="file" class="form-control" value="'. $row['pubYear'] .'"></td></tr>';
					  echo '<tr>';
					  echo'<td colspan="3" class="text-right"><input type="submit" name="save" value="Save Changes" class="btn btn-primary"></td></tr>';
					  
					  
				   
						}
			echo'</table>';
			?>
				
			</form> 
	  </div>
    </div>
</div>
	 	<div id="push" class="hidden-print"></div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
	<script src="../includes/footer.js"></script>

  </body>

<!-- Mirrored from getbootstrap.com/examples/starter-template/ by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 02 Oct 2013 12:14:27 GMT -->
</html>