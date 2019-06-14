<?php require 'session.php'; ob_start();
include '../includes/conn.php';
?><!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../img/naerls_logo.png">
	<title>Publications: Admin Requests</title>
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
			$("#type").change(function(){
				var type=document.getElementById('type').value
				if(type=='staff'){
				$("#nstaff").hide();
					$("#staff").show();
				}else if(type=='nstaff'){
				$("#staff").hide();
				$("#nstaff").show();	
				}else{
				$("#staff").hide();
				$("#nstaff").hide();		
				}
				}
			);
			$('#myModal').on('show.bs.modal',function(e){
			var eml=$(e.relatedTarget).data('email');
			$(e.currentTarget).find('input[name="email"]').val(eml);
			var subject=$(e.relatedTarget).data('subject');
			$(e.currentTarget).find('input[name="subj"]').val("RE: Publication Request ID - "+subject);
			var id=$(e.relatedTarget).data('reqid');
			$(e.currentTarget).find('input[name="reqID"]').val(id);
			});
				$('#grant').on('show.bs.modal',function(e){
			var eml=$(e.relatedTarget).data('email');
			$(e.currentTarget).find('input[name="grtemail"]').val(eml);
			var subject=$(e.relatedTarget).data('subject');
			$(e.currentTarget).find('input[name="grtsubj"]').val("RE: Publication Request ID - "+subject);
			var id=$(e.relatedTarget).data('reqid');
			$(e.currentTarget).find('input[name="grtreqID"]').val(id);}
			);
			$('#message').on('show.bs.modal',function(e){
			var eml=$(e.relatedTarget).data('email');
			$(e.currentTarget).find('input[name="msgemail"]').val(eml);
			var subject=$(e.relatedTarget).data('subject');
			$(e.currentTarget).find('input[name="msgsubj"]').val("RE: Publication Request ID - "+subject);
			var id=$(e.relatedTarget).data('reqid');
			$(e.currentTarget).find('input[name="grtreqID"]').val(id);}
			);
			$('#delete').on('show.bs.modal',function(e){
				var did=$(e.relatedTarget).data('del');
				$(e.currentTarget).find('input[name="delId"]').val(did);
			});
		});	
		</script>
  </head>
  <body>
        <?php include 'header.php'; ?>
	  <div class="container" id="cc">
	<div class="starter-template">	
		    <?php
                    $per_page=15;                    
					$pages_query=mysqli_num_rows(mysqli_query($con,"SELECT * FROM requests"));
                    $pages=ceil($pages_query/$per_page);
                    $page=(isset($_GET['page']))? (int)$_GET['page']:1;
					if($page==0){
						header('location:404.php');
					}
                    $start=($page-1)*$per_page;
					$query5=mysqli_query($con,"SELECT fullName,email,organization,materials.matID,materials.title,reqID,granted,replied from requests JOIN materials ON requests.matID=materials.matID
                    JOIN users ON users.id=requests.userID ORDER BY date DESC LIMIT $start,$per_page ");
                   echo  mysqli_error($con);
					$count=mysqli_num_rows($query5);
					echo	"<div style='font-family:Palatino Linotype;padding-bottom:20px;font-size:30px;color:green;' align='left' class='lead'>Online Requests: <span >$pages_query</span>
					<a class='btn btn-success pull-right' href='manual_requests.php'>View Manual Request</a>";
					echo'<span   style="color:green;font-weight:bold;margin-left:20px;"> ';
					if(isset($_SESSION['request'])) {
                        echo $_SESSION['request'];
                        unset($_SESSION['request']);
                    }					
					echo "</span></div>";
                    echo "<div class='table-responsive'>";
					echo "<table  class='table table-striped table-condensed table-bordered ' >
					<thead><tr>
					<td><b>S/No.</b></td><td><b>Name</b></td><td><b>Email</b></td><td><b>Unit / Organization</b></td><td><b>Title</b></td>
					<td>".'<div class="btn-group">
						 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Granted ? <span class="caret"></span></button><ul class="dropdown-menu" role="menu">
						<li><a href="granted.php?state=y1e2s"><i class="glyphicon glyphicon-check"></i> Yes</a></li>
						<li><a href="granted.php?state=n3o4"><i class="glyphicon glyphicon-thumbs-down"></i> No</a></li>
					</ul></td><td><b>Action</b></div></td>
					</tr> </thead>';
					$i=($per_page*($page-1))+1;
                        while($result=mysqli_fetch_assoc($query5)){
                        echo "<tr><td>".$i."</td><td>".ucwords($result['fullName'])."</td><td>".$result['email']."</td><td>".$result['organization']."</td><td>".$result['title']."</td><td>".$result['granted'].'</td><td>
					<div class="btn-group">
						 <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button><ul class="dropdown-menu" role="menu">
						<li><a href="pubdetails.php?id='.$result["matID"].'"><i class="glyphicon glyphicon-pencil"></i> Pub. Details</a></li>
						<li><a href="#delete" data-toggle="modal" data-del="'.$result["reqID"].'"><i class="glyphicon glyphicon-trash"></i> Delete</a></li>';
						$email=$result['email'];
						$subject=$result['matID'];
						$reqID=$result["reqID"];
						if($result['replied']=='no'){
                                echo'<li><a data-toggle="modal" href="#grant"  data-reqid="'.$reqID.'" data-email="'.$email.'"data-subject="'.$subject.'"><i class="glyphicon glyphicon-thumbs-up"></i> grant</a></li>';
						  echo'<li><a data-toggle="modal" href="#myModal"  data-reqid="'.$reqID.'"data-email="'.$email.'"data-subject="'.$subject.'"><i class="glyphicon glyphicon-ban-circle"></i> Deny</a></li>';
						  }else{
						  		echo'<li><a data-toggle="modal" href="#message"  data-reqid="'.$reqID.'"data-email="'.$email.'"data-subject="'.$subject.'"><i class="glyphicon glyphicon-envelope"></i> Message</a></li>';
						  }
                       echo'</ul>
                    </div></td>
            </tr>';
			$i++;
            }
			echo "</table>";
			if($pages>1 && $page<=$pages){
				echo '<ul class="pagination hidden-print">';
				if($page>1){
					  echo'<li><a href="?page=1"> <span class="glyphicon glyphicon-backward"></a></li>';
				}
				if($page>1){
					$prev_page=$page-1;
					  echo'<li><a href="?page='.$prev_page.'"> <span class="glyphicon glyphicon-step-backward"></a></li>';
				}
				$range=4;
				echo "<li class='active'><a >$page of $pages</a></li>";
				if($page<$pages){
					$next_page=$page+1;
					  echo'<li><a href="?page='.$next_page.'"> <span class="glyphicon glyphicon-step-forward"></a></li>';
				}if($page<$pages){
					$next_page=$page+1;
					  echo'<li><a href="?page='.$pages.'"> <span class="glyphicon glyphicon-forward"></a></li>';
				}
				echo '</ul>';
			}elseif($page>$pages) { 
				header ('location:404.php');
				exit();
			}  echo "</div>";?>
    </div>
    </div>
    
	
		<!-- Manual Request Modal -->
  <div class="modal fade" id="request" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title">Manual Request</h3>
        </div>
        <div class="modal-body">
		<form method="POST" action="requests.php" class="form-horizontal" role="form" >
		<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Name</label>
    <div class="col-lg-10">
      <input type="text" class="form-control " id="inputEmail1"  name="nm"placeholder="Name" required>
    </div>
	</div>
	<div class="form-group">
    <label for="inputSubj" class="col-lg-2 control-label">Email</label>
    <div class="col-lg-10">
      <input type="email" class="form-control " id="inputEmail1"  name="eml"placeholder="Enter email" required>
    </div>
  </div>
  
  <div class='form-group'>
    <label for='inputPassword1' class='col-lg-2 control-label'>User Type</label>
    <div class='col-lg-10'>
							<select class='form-control' name='type' id='type' >
							<option value='sel'>...Select...</option>
							<option value='staff'>NAERLS staff</option>
							<option value='nstaff'>Non-Staff</option>
							
							</select>    
							</div>
  </div>
  <div class='form-group' id='staff' style='display:none'>
    <label for='inputPassword1' class='col-lg-2 control-label'>Unit</label>
    <div class='col-lg-10'>
							<select class='form-control' name='unit' required>
							<option value='Adopted Villages and Outreach'>Adopted Villages and Outreach</option>
							<option value='Internal Audit'>Internal Audit</option>
							<option value='Due Process/Procurement'>Due Process/Procurement</option>
							<option value='Farm Broadcast'>Farm Broadcast</option>
							<option value='Information and Communication (ICT)'>Information and Communication (ICT)</option>
							<option value='Information Resource Centre'>Information Resource Centre</option>
							<option value='Works and Maintenance'>Works and Maintenance</option>
							<option value='Planning, Monitoring and Evaluation'>Planning, Monitoring and Evaluation</option>
							<option value='Printing Press'>Printing Press</option>
							<option value='Public Relations, Protocol and Advancement'>Public Relations, Protocol and Advancement</option>
							<option value='Skill Acquisation and Development'>Skill Acquisation and Development</option>
							<option value='store'>Store</option>
							<option value='Transport and Transportation'>Transport and Transportation</option>
							<option value='Website and Multiimedia'>Website and Multimedia</option>
							</select>    </div>
  </div>
  <div class='form-group' id='nstaff' style='display:none'>
    <label for='inputEmail1' class='col-lg-2 control-label'>Name</label>
    <div class='col-lg-10'>
      <input type='text' class='form-control' id='inputEmail1' name='org' placeholder='Organization Name'>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Category</label>
    <div class="col-lg-10">

			<div class="input-container">
			  <select name="cat" class="form-control">
			    <option value="sel">...Select Category...</option>
			    <option value="Books">Books</option>
                <option value="Journals">Journals</option>
                <option value="Bulletins">Bulletin</option>
                <option value="Guides">Guides</option>
				<option value="Handbills">Handbills</option>
                <option value="Posters">Posters</option>
                <option value="Leaflets">Leaflets</option>
                <option value="Flipbooks">Flipbooks (flipcharts)</option>
                <option value="Commodity prices">Commodity prices</option>
                <option value="Agric. Newsletters">Agric Newsletter</option>
                <option value="Agric. Extension Journal">Agric. Extension Journal</option>
              </select>
			</div></div>
        </div>
	<div class="form-group">
    <label for="inputTitle" class="col-lg-2 control-label">Publication ID</label>
    <div class="col-lg-10">
      <input type="text" class="form-control " id="inputEmail1"  name="title" placeholder="Copy and paste searched publication ID here" required>
    </div>
  </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="issue">Issue</button>
        </div>		
		</form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  </div>
		<!-- Reply Request Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Reply Request</h4>
        </div>
        <div class="modal-body">
		<form method="POST" action="requests.php" class="form-horizontal" role="form" >
		<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Send To</label>
    <div class="col-lg-10">
      <input type="email" class="form-control " id="inputEmail1"  name="email" readonly>
    </div>
	</div>
	<div class="form-group">
    <label for="inputSubj" class="col-lg-2 control-label">Subject</label>
    <div class="col-lg-10">
      <input type="text" class="form-control " id="inputEmail1"  name="subj" readonly>
      <input type="hidden" class="form-control " id="inputEmail1"  name="reqID" readonly>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Message</label>
    <div class="col-lg-10">
<textarea class="form-control" rows="3" name="msg"required>Sorry, we are unable to grant your request due to ...</textarea>    
</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="send" >Send</button>
        </div>		
		</form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  </div>
  	<!-- Grant Request Modal -->
  <div class="modal fade" id="grant" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Grant Request</h4>
        </div>
        <div class="modal-body">
		<form method="POST" action="requests.php" class="form-horizontal" role="form" >
		<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Send To</label>
    <div class="col-lg-10">
      <input type="email" class="form-control " id="inputEmail1"  name="grtemail" readonly>
    </div>
	</div>
	<div class="form-group">
    <label for="inputSubj" class="col-lg-2 control-label">Subject</label>
    <div class="col-lg-10">
      <input type="text" class="form-control " id="inputEmail1"  name="grtsubj" readonly>
	        <input type="hidden" class="form-control " id="inputEmail1"  name="grtreqID" readonly>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Message</label>
    <div class="col-lg-10">
<textarea class="form-control" rows="3" name="grtmsg"required>Your request has been granted. Pick up the publication at our unit. Thank You...</textarea>    
</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="grant" >Send</button>
        </div>		
		</form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  </div>
  
  	<!-- Message Modal -->
  <div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Message Request</h4>
        </div>
        <div class="modal-body">
		<form method="POST" action="requests.php" class="form-horizontal" role="form" >
		<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Send To</label>
    <div class="col-lg-10">
      <input type="email" class="form-control " id="inputEmail1"  name="msgemail" readonly>
    </div>
	</div>
	<div class="form-group">
    <label for="inputSubj" class="col-lg-2 control-label">Subject</label>
    <div class="col-lg-10">
      <input type="text" class="form-control " id="inputEmail1"  name="msgsubj" readonly>
	        <input type="hidden" class="form-control " id="inputEmail1"  name="msgreqID" readonly>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Message</label>
    <div class="col-lg-10">
<textarea class="form-control" rows="3" name="msg"required></textarea>    
</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="mesg" >Message</button>
        </div>
</div>		
		</form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
  <!-- / Delete Confirmation modal -->	
	 <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Confirmation</h4>
        </div>
        <div class="modal-body">
		<form method="POST" action="delreq.php">
				<input type="hidden" name="delId">
				<h3>Are you sure you want to delete the message ?</h3>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
			  <button type="submit" class="btn btn-danger">Yes</button>
			</div>
		</form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <?php

if (isset($_POST['mesg'])){
//if "email" is filled out, proceed check if the email address is invalid
 //send email
		$email = $_POST['msgemail'] ;
		$message= $_POST['msg'];
		$subject= $_POST['msgsubj'];
		$mail=mysqli_fetch_assoc(mysqli_query($con,"SELECT * from settings"));
		$sitemail=$mail['email'];
		$website=$mail['website'];
		$header="FROM: NAERLS Publications"."\r\n".$sitemail;
					$fname=$_SESSION['name'];
					$id=$_SESSION['id'];
						$qact=mysqli_query($con,"INSERT INTO activities (actID,adminID,adminName,type,activity,date)
						VALUES
						(' ','$id','$fname','Mail','Sent mail to $email',NOW())");
				if(@mail($email, $subject,$message, $header)){
					$_SESSION['request']="Message sent.";
				}else{
					$_SESSION['request']="Unable to send mail check your network settings";
				}
	
		header('location:requests.php');
}
if (isset($_POST['grant'])){
//if "email" is filled out, proceed check if the email address is invalid
 //send email
		$email = $_POST['grtemail'] ;
		$message= $_POST['grtmsg'];
		$subject= $_POST['grtsubj'];
		$rid= $_POST['grtreqID'];
		$mail=mysqli_fetch_assoc(mysqli_query($con,"SELECT * from settings"));
		$sitemail=$mail['email'];
		$website=$mail['website'];
  $header="\r\n FROM: NAERLS Publications"."\r\n".$sitemail;
  $fname=$_SESSION['name'];
    if(@mail($email, $subject,$message, $header)){
        $sql = mysqli_query($con, "UPDATE requests SET granted='yes', replied='yes' WHERE reqID = '$rid'");
        $fname = $_SESSION['name'];
        $id = $_SESSION['id'];
        $qact = mysqli_query($con, "INSERT INTO activities (actID,adminID,adminName,type,activity,date)
						VALUES
						(' ','$id','$fname','Mail','Sent mail to <b>$email</b>; content: $message',NOW())");
        $_SESSION['request'] = 'Message has been sent.';
  } else {
        $_SESSION['request']='Message was not sent. Check your network settings';
  }		header('location:requests.php');

}
if (isset($_POST['send'])){
//if "email" is filled out, proceed check if the email address is invalid
  
		$email = $_POST['email'] ;
		$message= $_POST['msg'];
		$subject= $_POST['subj'];
		$rid= $_POST['reqID'];
		$mail=mysqli_fetch_assoc(mysqli_query($con,"SELECT * from settings"));
		$sitemail=$mail['email'];
		$website=$mail['website'];
    $header="\r\n FROM: NAERLS Publications"."\r\n".$sitemail;
    $fname=$_SESSION['name'];
    if(mail($email, $subject,$message, $header)){
        $sql = mysqli_query($con,"UPDATE requests SET replied='yes' WHERE reqID = '$rid'");
        $fname=$_SESSION['name'];
        $id=$_SESSION['id'];
        $qact=mysqli_query($con,"INSERT INTO activities (actID,adminID,adminName,type,activity,date)
						VALUES
						(' ','$id','$fname','Mail','Sent mail to <b>$email</b>; content: $message',NOW())");
        $_SESSION['request']= 'Message has been sent.';
    }else{
        $_SESSION['request']="Unable to send mail check your network settings";
    }

		header('location:requests.php');

} ?>
    
<?php
if (isset($_POST['issue'])){
 $uname= $_POST['nm'];
		 $eml = $_POST['eml'] ;
		$type=$_POST['type'] ;
		if($type=='staff'){
			$unit=$_POST['unit'];
		}elseif($type=='nstaff'){
			$unit=$_POST['org'];
		}
		$cat= $_POST['cat'];
		$matID= $_POST['title'];
	 $reqDate=date('Y-m-d');				
	$query=mysqli_query($con,"INSERT INTO requests (name,matID, granted,date,replied) VALUES  ('$name','$matID','no','$reqDate','yes')");
	if(mysqli_affected_rows($con)>0){
	$_SESSION['request']="Request Added";
	$fname=$_SESSION['name'];
	$id=$_SESSION['id'];
	$name=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM materials WHERE matID='$matID' LIMIT 1"));
$title=$name['title'];
						$qact=mysqli_query($con,"INSERT INTO activities (actID,adminID,adminName,type,activity,date)
						VALUES
						(' ','$id','$fname','Request','Granted Request of Pub. titled: <b>'$title</b> to <b>$uname</b>',NOW())");
		header('location:requests.php');
	}else{
		$_SESSION['request']="Unable to add request due to ".mysqli_error($con);
	header('location:requests.php');
		}
}	
ob_end_flush();?>
	  	<div id="push" class="hidden-print"></div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
	<script src="../includes/footer.js"></script>

  </body>

</html>
