<?php
/**
 * Created by PhpStorm.
 * User: HP USER
 * Date: 1/8/2017
 * Time: 7:41 AM
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
    <title>Publications: Admin Registered Users</title>
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
        });
    </script> </head>
<body>
<?php include 'header.php'; ?>
<div class="container" id="cc">
    <div class="starter-template">
        <?php
        $per_page=15;
        $pages_query=mysqli_num_rows(mysqli_query($con,"SELECT * FROM users left join tblcountries on tblcountries.countryid=users.nationality
                        LEFT join tblstate on tblstate.stateid=users.state
                        LEFT join tbllga on tbllga.lgaid=users.lga WHERE usertype !='admin'"));
        $pages=ceil($pages_query/$per_page);
        $page=(isset($_GET['page']))? (int)$_GET['page']:1;
        if($page==0){
            header('location:404.php');
        }
        $start=($page-1)*$per_page;
        $query5=mysqli_query($con,"SELECT * from users left join tblcountries on tblcountries.countryid=users.nationality
                        LEFT join tblstate on tblstate.stateid=users.state
                        LEFT join tbllga on tbllga.lgaid=users.lga WHERE usertype !='admin'  LIMIT $start,$per_page ");
        echo  mysqli_error($con);
        $count=mysqli_num_rows($query5);
        if($pages_query>0){
            echo	"<div style='font-family:Palatino Linotype;padding-bottom:20px;font-size:30px;color:green;' align='left' class='lead'>Registered Users: <span >$pages_query</span>";
            echo'<span   style="color:green;font-weight:bold;margin-left:20px;"> ';
            if(isset($_SESSION['success'])) {
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            }
            echo "</span></div>";
            echo "<div class='table-responsive'>";
            echo "<table  class='table table-striped table-condensed table-bordered stay-center' >
					<thead><tr>
					<td><b>S/No.</b></td><td><b>Title</b></td><td><b>Name</b></td><td><b>Email</b></td><td><b>Phone</b></td><td><b> Occupation</b></td>
					<td><b> Nationality</b></td><td><b> State</b></td><td><b> L.G.A</b></td>
					<td><b> Organization</b><td><b>Purpose</b></td><td><b>Action</b></td>
					</tr> </thead>";
            $i=($per_page*($page-1))+1;
            while($result=mysqli_fetch_assoc($query5)){
                echo "<tr><td>".$i."</td><td>".ucwords($result['title'])."</td><td>".$result['fullName']."</td><td>".$result['email']."</td>
            <td>".ucwords($result['phone'])."</td> <td>".ucwords($result['occupation'])."</td><td>".ucwords($result['countryname'])."</td>
            <td>".ucwords($result['statename'])."</td><td>".ucwords($result['lganame'])."</td><td>".$result['organization']."</td><td>".$result['purpose']."</td>";
                echo '<td>
                        <div class="btn-group">
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                             <ul class="dropdown-menu" role="menu">
                                <li><a href="edit_user_profile.php?id='.$result["id"].'"><i class="glyphicon glyphicon-edit"></i> Edit Profile</a></li>';
                if($result['suspended']=='0') {
                                    echo '<li ><a href = "suspend.php?id='.$result["id"].'"><i class="glyphicon glyphicon-eye-close" ></i > Suspend account</a ></li >';
                                }else{
                                    echo '<li ><a href = "reactivate.php?id='.$result["id"].'"><i class="glyphicon glyphicon-eye-open" ></i > Reactivate account</a ></li >';
                                }
                                if($_SESSION['type']=='s

                                uper') {
                                    echo '<li><a href="#delete" data-toggle="modal" data-del="' . $result["id"] . '"><i class="glyphicon glyphicon-envelope"></i> Delete User</a></li>';
                                }
                                echo '</ul>
                                </div>
                                </td></tr>';
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
                exit();
            }  echo "</div>";
        }else echo "<h2 style='color:red;font-family:\"Times New Roman\", Times, serif;'>No registered user.</h2>";?>

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
                <form method="POST" action="deleteuser.php.php">
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

<div id="push" class="hidden-print"></div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../assets/js/jquery.js"></script>
<script src="../dist/js/bootstrap.min.js"></script>
<script src="../includes/footer.js"></script>

</body>

</html>
