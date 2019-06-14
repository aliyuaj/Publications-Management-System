<?php
/**
 * Created by PhpStorm.
 * User: HP USER
 * Date: 1/14/2017
 * Time: 2:46 AM
 */
require 'session.php'; ob_start();
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
            $('#purpose').change(function(){
                var subject = document.getElementById('purpose').value
                if(subject=='Others'){
                    $('#opurpose').show()
                }else{
                    $('#opurpose').hide()
                }

            });
            $('#occupation').change(function(){
                var subject = document.getElementById('occupation').value
                if(subject=='Others'){
                    $('#ooccupation').show()
                }else{
                    $('#oocupation').hide()
                }

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
        $per_page=15;
        $pages_query=mysqli_num_rows(mysqli_query($con,"SELECT * FROM manual_request"));
        $pages=ceil($pages_query/$per_page);
        $page=(isset($_GET['page']))? (int)$_GET['page']:1;
        if($page==0){
            header('location:404.php');
        }
        $start=($page-1)*$per_page;
        $query5=mysqli_query($con,"SELECT * FROM manual_request LEFT JOIN materials ON manual_request.matID=materials.matID
        ORDER BY date DESC LIMIT $start,$per_page ");
        echo  mysqli_error($con);
        $count=mysqli_num_rows($query5);
        echo "<a class='btn btn-success pull-right' data-toggle='modal' href='#request'><span class='glyphicon glyphicon-plus'></span> Manual Request</a>";
        if($pages_query>0){

        echo	"<div style='font-family:Palatino Linotype;padding-bottom:20px;font-size:30px;color:green;' align='left' class='lead'>Manual Requests: <span >$pages_query</span>";
        echo'<span   style="color:green;font-weight:bold;margin-left:20px;"> ';
        if(isset($_SESSION['request'])) {
            echo $_SESSION['request'];
            unset($_SESSION['request']);
        }
        echo "</span></div>";
        echo "<div class='table-responsive'>";
        echo "<table  class='table table-striped table-condensed table-bordered stay-center' style='width: 100%' >
					<thead><tr>
					<td><b>S/No.</b></td><td><b>Name</b></td><td><b>Title</b></td><td><b>Email</b></td><td><b>Occupation</b></td><td><b>Unit / Organization</b></td><td><b>Purpose</b></td>
					<td>Date Issued</td><td><b>Action</b></td>
					</tr> </thead>";
        $i=($per_page*($page-1))+1;
        while($result=mysqli_fetch_assoc($query5)){
            echo "<tr><td>".$i."</td><td>".ucwords($result['name'])."</td><td>".$result['title']."</td>
            <td>".$result['email']."</td><td>".$result['occupation']."</td>
            <td>".$result['organization']."</td><td>".$result['purpose']."</td><td>".$result['date'].'</td>
            <td><a href="#delete" data-toggle="modal" data-del="'.$result["id"].'" class="btn btn-danger">Delete</a></td>
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
        }  echo "</div>";
        }else echo "<h2 style='color:red;font-family:\"Times New Roman\", Times, serif;'>No manual request has been made.</h2>";?>
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
                <form method="POST" action="manual_requests.php" class="form-horizontal" role="form" >
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control " id="inputEmail1"  name="name"placeholder="Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputSubj" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control " id="inputEmail1"  name="email"placeholder="Enter email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Occupation </label>
                        <div class="col-lg-10">
                            <select class="form-control" id="occupation" name="occupation">
                                <option value="Farmer">Farmer</option>
                                <option value="Extension Worker">Extension Worker</option>
                                <option value="Teacher/ Lecturer/ Researcher">Teacher/ Lecturer/ Researcher</option>
                                <option value="Student">Student</option>
                                <option value="Policy Maker">Policy Maker</option>
                                <option value="Media Professional">Media Professional</option>
                                <option value="Others">Others</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group" id="ooccupation" style="display:none">
                        <label for="inputEmail1" class="col-lg-2 control-label">Specify Occupation </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="inputEmail1" name="otheroccupation" placeholder="">
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='inputPassword1' class='col-lg-2 control-label'>User Type</label>
                        <div class='col-lg-10'>
                            <select class='form-control' name='type' id='type'>
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
                        <label for='inputEmail1' class='col-lg-2 control-label'>Organization</label>
                        <div class='col-lg-10'>
                            <input type='text' class='form-control' id='inputEmail1' name='org' placeholder='Organization Name'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Purpose </label>
                        <div class="col-lg-10">
                            <select class="form-control" id="purpose" name="purpose">
                                <option value="Research">Research</option>
                                <option value="Academics">Academics</option>
                                <option value="Practice">Practice</option>
                                <option value="Commercial">Commercial</option>
                                <option value="Complimentary Copy">Complimentary Copy</option>
                                <option value="Excursion">Excursion</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="opurpose" style="display:none">
                        <label for="inputEmail1" class="col-lg-2 control-label">Specify Purpose </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="inputEmail1" name="otherpurpose" placeholder="">
                        </div>
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
<!-- / Delete Confirmation modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="deletemanualrequest.php">
                    <input type="hidden" name="delId">
                    <h3>Are you sure you want to delete the request ?</h3>
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
if (isset($_POST['issue'])){
    $uname= $_POST['name'];
    $email = $_POST['email'] ;
    $type=$_POST['type'];
    if($type=='staff'){
        $organization='NAERLS:'.$_POST['unit'];
    }elseif($type=='nstaff'){
        $organization=$_POST['org'];
    }
    $occupation=trim($_POST['occupation']);
    $ooccupation=trim($_POST['otheroccupation']);
    if($occupation=='Others'){
        $occupation=$ooccupation;
    }
    $purpose=trim($_POST['purpose']);
    $opurpose=trim($_POST['otherpurpose']);
    if($purpose=='Others'){
        $purpose=$opurpose;
    }
    $matID= $_POST['title'];
    $reqDate=date('Y-m-d');
    echo $occupation;
    $query=mysqli_query($con,"INSERT INTO manual_request (matID,name,email,occupation,organization,purpose,date)
    VALUES  ('$matID','$uname','$email','$occupation','$organization','$purpose',CURDATE())");
    if(mysqli_affected_rows($con)>0){
        $_SESSION['request']="Request Added";
        $fname=$_SESSION['name'];
        $id=$_SESSION['id'];
        $name=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM materials WHERE matID='$matID' LIMIT 1"));
        $title=$name['title'];
        $qact=mysqli_query($con,"INSERT INTO activities (adminID,adminName,type,activity,date)
						VALUES
						('$id','$fname','Request','Granted Request of Pub. titled: <b>'$title</b> to <b>$uname</b>',NOW())");
        header('location:manual_requests.php');
    }else{
        $_SESSION['request']="Unable to add request due to ".mysqli_error($con);
        header('location:manual_requests.php');
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
