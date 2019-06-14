<?php require 'session.php';ob_start();
include '../includes/conn.php';
?><!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../img/naerls_logo.png">
    <title>Publications: Admin Messages</title>
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
            $('#viewModal').on('show.bs.modal',function(e){
                var eml=$(e.relatedTarget).data('user-email');
                $(e.currentTarget).find('input[name="email"]').val(eml);
                var subject=$(e.relatedTarget).data('msg-subject');
                $(e.currentTarget).find('input[name="subj"]').val("RE: "+subject);
                var content=$(e.relatedTarget).data('msg-content');
                $(e.currentTarget).find('textarea[name="msgcontent"]').val(content);
                var id=$(e.relatedTarget).data('msg-id');
                $(e.currentTarget).find('input[name="msgID"]').val(id);
            });
            $('#replyModal').on('show.bs.modal',function(e){
                var eml=$(e.relatedTarget).data('user-email');
                $(e.currentTarget).find('input[name="email"]').val(eml);
                var subject=$(e.relatedTarget).data('msg-subject');
                $(e.currentTarget).find('input[name="subj"]').val("RE: "+subject);
                var content=$(e.relatedTarget).data('msg-content');
                $(e.currentTarget).find('textarea[name="msgcontent"]').val(content);
                var id=$(e.relatedTarget).data('msg-id');
                $(e.currentTarget).find('input[name="msgID"]').val(id);
            });
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
	if(isset($_SESSION['success'])) {
		echo "<div class=' alert alert-info' style='font-size: 20px;'>".$_SESSION['success']."</div>";
		unset($_SESSION['success']);
	}
	// Checking updates
	$per_page=15;                   
	$pages_query=mysqli_num_rows(mysqli_query($con,"SELECT * FROM messages"));
	$pages=ceil($pages_query/$per_page);
	$page=(isset($_GET['page']))? (int)$_GET['page']:1;
	if($page==0){
		header ('location:404.php');
	}
	$start=($page-1)*$per_page;
		$query5=mysqli_query($con,"SELECT * from messages ORDER BY time DESC LIMIT $start,$per_page");
		$count=mysqli_num_rows($query5);
	if($pages_query>0){
		echo	"<div style='font-family:Palatino Linotype;font-size:30px;color:green;' class='lead'>All Messages: <span >$pages_query</span>
		<span   style='color:green;font-weight:bold;margin-left:20px;'> ";
		if(isset($_SESSION['msg'])) {
			print $_SESSION['msg'];
			unset($_SESSION['msg']);
		}					
		echo"</span>
		</div>";
		echo "<div class='table-responsive'><table  class='table table-striped table-condensed table-bordered stay-center' STYLE='width: 100%' >
		<thead><tr>
		<td><b>S/No.</b></td><td><b>Sender</b></td><td><b>Time</b></td><td><b>Email</b></td><td><b>Message Subject</b></td><td>replied ?</td><td></td>
		</tr></thead> ";
		$i=($per_page*($page-1))+1;
			while($result=mysqli_fetch_assoc($query5)){
			echo "<tr><td>".$i."</td><td>".$result['sender']."</td><td>".$result['time']."</td><td>".$result['email']."</td><td align='left'>".$result['subject']."</td><td>".$result['replied'].'</td><td>
		<div class="btn-group">				
			<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button> <ul class="dropdown-menu" role="menu">
			<li><a href="#delete" data-toggle="modal" data-del="'.$result["msgID"].'"><span class="glyphicon glyphicon-trash"></span> Delete</a></li>';
			$email= $result['email'];
			$subject= $result['subject'];
                $msgid=$result["msgID"];
                $content=$result["msg"];
			echo'<li><a data-toggle="modal" href="#viewModal"  data-msg-id="'.$msgid.'"data-user-email="'.$email.'"data-msg-subject="'.$subject.'"data-msg-content="'.$content.'"><span class="glyphicon glyphicon-envelope"></span> View</a></li>';
		   echo'</ul>
		   
		</div>	</td>
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
		}  echo "</div>";
	}else echo "<h2 style='color:red;font-family:\"Times New Roman\", Times, serif;'>Message is currently empty</h2>";
	?>
    
	</div>
	</div>
		<!-- Message Modal -->
  <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Reply Message</h4>
              </div>
              <div class="modal-body">
                  <form method="POST" action="Message.php"class="form-horizontal" role="form" >
                      <div class="form-group">
                          <label for="inputEmail1" class="col-lg-2 control-label">Sent From</label>
                          <div class="col-lg-10">
                              <input type="email" class="form-control " id="inputEmail1"  name="email"  readonly>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputSubj" class="col-lg-2 control-label">Subject</label>
                          <div class="col-lg-10">
                              <input type="text" class="form-control "  name="subj" readonly>
                              <input type="hidden" class="form-control "  name="msgID" readonly>

                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputPassword1" class="col-lg-2 control-label">Content</label>
                          <div class="col-lg-10">
                              <textarea class="form-control" rows="3" name="msgcontent" required readonly></textarea>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         <?php echo ' <a type="button" class="btn btn-default" data-toggle="modal" href="#replyModal"  data-msg-id="'.$msgid.'"
                                 data-user-email="'.$email.'"data-msg-subject="'.$subject.'""><span class="glyphicon glyphicon-envelope">
                                 </span> Reply</a>';?>                    </div>
                  </form>
              </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </div>
  <div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Reply Message</h4>
              </div>
              <div class="modal-body">
                  <form method="POST" action="Message.php"class="form-horizontal" role="form" >
                      <div class="form-group">
                          <label for="inputEmail1" class="col-lg-2 control-label">Send To</label>
                          <div class="col-lg-10">
                              <input type="email" class="form-control " id="inputEmail1"  name="email"  readonly>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputSubj" class="col-lg-2 control-label">Subject</label>
                          <div class="col-lg-10">
                              <input type="text" class="form-control "  name="subj" readonly>
                              <input type="hidden" class="form-control "  name="msgID" readonly>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputPassword1" class="col-lg-2 control-label">Content</label>
                          <div class="col-lg-10">
                              <textarea class="form-control" rows="3" name="msgcontent" required ></textarea>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="send" >Reply</button>
                      </div>
                  </form>
              </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
	<?php


if (isset($_POST['send'])){
//if "email" is filled out, proceed check if the email address is invalid
  
		$email = $_POST['email'] ;
		$message= $_POST['msgcontent'];
		$subject= $_POST['subj'];
		$mid= $_POST['msgID'];
		$mail=mysqli_fetch_assoc(mysqli_query($con,"SELECT * from settings"));
		$sitemail=$mail['email'];
		$website=$mail['website'];
		$header="FROM: NAERLS Publications"."\r\n".$sitemail;
				$sql = mysqli_query($con,"UPDATE messages SET replied='yes' WHERE msgID = '$mid'");
					$fname=$_SESSION['name'];
					$id=$_SESSION['id'];
						$qact=mysqli_query($con,"INSERT INTO activities (actID,adminID,adminName,type,activity,date)
						VALUES
						(' ','$id','$fname','Mail','Replied mail sent by $email; content:$message',NOW())");
				if(@mail($email, $subject,$message, $header)){
					$_SESSION['msg']="Message sent.Thank you for using our mail form";		
						header('location:message.php');
					}else{
					$_SESSION['msg']="Unable to send mail check your network settings";
					header('location:message.php');
				}
	ob_end_flush();

	}
?>	<!-- / Delete Confirmation modal -->	
	 <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Confirmation</h4>
        </div>
        <div class="modal-body">
		<form method="POST" action="delmsg.php">
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
    	<div id="push"></div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
	<script src="../includes/footer.js"></script>

  </body>

</html>

