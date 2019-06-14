<?php
/**
 * Created by PhpStorm.
 * User: HP USER
 * Date: 1/7/2017
 * Time: 11:14 PM
 */require 'session.php'; ob_start();
include '../includes/conn.php';
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../img/naerls_logo.png">
    <title>Publications: Admin Donations</title>
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
            $('#delete').on('show.bs.modal',function(e){
                var did=$(e.relatedTarget).data('del');
                $(e.currentTarget).find('input[name="delId"]').val(did);
            });
            $('#fulfilled').on('show.bs.modal',function(e){
                var did=$(e.relatedTarget).data('donid');
                $(e.currentTarget).find('input[name="donId"]').val(did);
            });
            $('#message').on('show.bs.modal',function(e){
                    var eml=$(e.relatedTarget).data('email');
                    $(e.currentTarget).find('input[name="msgemail"]').val(eml);
                    var subject=$(e.relatedTarget).data('subject');
                    $(e.currentTarget).find('input[name="msgsubj"]').val("RE: Pledged Donation ");
                    var id=$(e.relatedTarget).data('id');
                    $(e.currentTarget).find('input[name="grtreqID"]').val(id);}
            );
        });
    </script></head>
  <body>
        <?php include 'header.php'; ?>
<div class="container" id="cc">
    <div class="starter-template">
        <div role="main">
        <?php
        echo'<span   style="color:green;font-weight:bold;margin-left:20px;"> ';
        if(isset($_SESSION['request'])) {
            echo $_SESSION['request'];
            unset($_SESSION['request']);
        }
        echo "</span>";
        echo '<div class="panel panel-default" >
        <div class="panel-heading" style="font-size: 15px;">Sort unfulfilled donations by expected time line of fulfilling pledges</div>
        <div class="panel-body" >
        <form class="form-inline" role="form" action="donations.php" method="post">
            <div class="col-lg-4">
              <span style="font-size: 20px;color: #AA0000">Donations with time line of next </span>
            </div><div class="col-lg-4">
               <input type="number" class="form-control" name="duration" min="1" required/>
            </div>
              <div class="col-lg-4">
                  <div class="input-group">
                      <select class="form-control" name="by">
                          <option value="days">Days</option>
                          <option value="weeks">Weeks</option>
                          <option value="months">Months</option>

                      </select>
                    <span class="input-group-btn">
                                <button class="btn btn-default" type="submit" name="submit"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                  </div>
              </div>
              </form>
    </div>
</div>';
        if (isset($_POST['submit']))
        {
            $duration = $_POST['duration'];
            $by = $_POST['by'];
            if($by=='days'){
                $by=1;
            }elseif($by=='weeks'){
                $by=7;
            }
            elseif($by=='months'){
                $by=30;
            }
            $sqlstr="SELECT * from donations  WHERE (DATEDIFF(timeline,CURDATE()) / $by) <= $duration AND fulfilled='no'";

        }else
            $sqlstr = "SELECT * from donations ";
        $per_page=15;
        $pages_query=mysqli_num_rows(mysqli_query($con,$sqlstr));
        $pages=ceil($pages_query/$per_page);
        $page=(isset($_GET['page']))? (int)$_GET['page']:1;
        if($page==0){
            header('location:404.php');
        }
        $start=($page-1)*$per_page;
        $query5=mysqli_query($con,$sqlstr);
        echo  mysqli_error($con);
        $count=mysqli_num_rows($query5);
        if($pages_query>0){
        echo "<div style='font-family:Palatino Linotype;font-size:30px;color:green;' align='left'><b>Pledged Donations: </b>$pages_query</div>
					<div  class='table-responsive' >
					<table  class='table table-striped table-condensed table-bordered' style='width:100%' >
					<thead>
					<tr>
 <td><b>S/No.</b></td><td><b>Title</b></td><td><b>Name</b></td><td><b> Organization</b></td><td><b>Email</b></td><td><b>Phone</b></td>
            <td><b>Type</b></td><td><b>Subject</b></td><td><b>Area</b></td><td><b>Qty.</b></td><td><b>Beneficiary</b></td>
            <td><b>Timeline</b></td><td><b>Date Added</b></td>
            <td>".'<div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Paid? <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="fulfilled.php?state='.SHA1('yes').'"><i class="glyphicon glyphicon-check"></i> Yes</a></li>
                        <li><a href="fulfilled.php?state='.SHA1('no').'"><i class="glyphicon glyphicon-thumbs-down"></i> No</a></li>
                    </ul></div></td><td><b>Message?</b></td><td><b>Action</b></td>
                </tr></thead>';
            $i=($per_page*($page-1))+1;
            while($result=mysqli_fetch_assoc($query5)){
                echo "<tr><td>".$i."</td><td>".ucwords($result['title'])."</td><td>".$result['name']."</td><td>".$result['organization']."</td>
            <td>".ucwords($result['email'])."</td><td>".$result['phone']."</td><td>".$result['pub_type']."</td><td>".$result['subject_area']."</td>
            <td>".ucwords($result['specificarea'])."</td><td>".$result['quantity']."</td><td>".$result['beneficiary']."</td>
            <td>".ucwords($result['timeline'])."</td><td>".$result['date']."</td><td>".$result['fulfilled'].'</td><td>'.$result['messaged'].'</td><td>
                <div class="btn-group">
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button><ul class="dropdown-menu" role="menu">';
                $reqID=$result["id"];
                if($result['fulfilled']=='no'){
                    echo'<li><a data-toggle="modal" href="#fulfilled"  data-donid="'.$reqID.'"><i class="glyphicon glyphicon-check"></i> Set as fulfilled</a></li>';
                }
                echo '<li><a href="#message" data-toggle="modal" data-email="'.$result["email"].'" data-id="'.$result["id"].'"><i class="glyphicon glyphicon-envelope"></i> Message Donor</a></li>';
                echo '<li><a href="#delete" data-toggle="modal" data-del="'.$result["id"].'"><i class="glyphicon glyphicon-trash"></i> Delete</a></li>';
                echo'</ul>
                </div></td>
        </tr>';}
            echo '</table></div>';
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
            exit();
        }
        }else echo "<h2 style='color:red;font-family:\"Times New Roman\", Times, serif;'>No donation pledged.</h2>";
        unset($_POST['submit']);
        ?>
</div>
    </div>
        </div>
</div>
        <!-- / Delete Confirmation modal -->
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Confirmation</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="deldonation.php">
                            <input type="hidden" name="delId">
                            <h3>Are you sure you want to delete this pledged donation?</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- / Delete Confirmation modal -->
        <div class="modal fade" id="fulfilled" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Confirmation</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="confirm_donation.php">
                            <input type="hidden" name="donId">
                            <h3>Are you sure you want to set this donation as fulfilled ?</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- Message Modal -->
        <div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Message Request</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="donations.php" class="form-horizontal" role="form" >
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
    $header="\r\n FROM: NAERLS Publications"."\r\n".$sitemail;
    $fname=$_SESSION['name'];
    $id=$_SESSION['id'];
    $qact=mysqli_query($con,"INSERT INTO activities (adminID,adminName,type,activity,date)
						VALUES
						($id','$fname','Mail','Sent mail to $email',NOW())");
    if(mail($email, $subject,$message, $header)){
        $_SESSION['request']="Message sent.";
    }else{
        $_SESSION['request']="Unable to send mail check your network settings";
    }

    header('location:donations.php');
}
 ?>

        <div id="push" class="hidden-print"></div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../assets/js/jquery.js"></script>
<script src="../dist/js/bootstrap.min.js"></script>
<script src="../includes/footer.js"></script>

</body>

</html>
