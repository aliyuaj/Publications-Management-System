<?php
/**
 * Created by PhpStorm.
 * User: HP USER
 * Date: 1/14/2017
 * Time: 12:52 AM
 */
require 'session.php';ob_start();
include '../includes/conn.php';
?><!DOCTYPE html>
<html lang="en">

<!-- Mirrored from getbootstrap.com/examples/starter-template/ by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 02 Oct 2013 12:14:27 GMT -->
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

</head>
<body>
<?php include 'header.php'; ?>
<div class="container" id="cc">
    <div class="starter-template">
        <?php
        $s=$_GET['state'];
        if($s==SHA1('yes')){
            $sc="yes";
        }elseif($s==SHA1('no')){
            $sc="no";
        }else{
            header ('location:404.php');
        }
        $per_page=15;
        $pages_query=mysqli_num_rows(mysqli_query($con,"SELECT * FROM donations WHERE fulfilled='$sc'"));
        $pages=ceil($pages_query/$per_page);
        $page=(isset($_GET['page']))? (int)$_GET['page']:1;
        if($page==0){
            header ('location:404.php');
        }
        $start=($page-1)*$per_page;
        $query5=mysqli_query($con,"SELECT * FROM donations WHERE fulfilled='$sc' ORDER BY date DESC LIMIT $start,$per_page ");
        $count=mysqli_num_rows($query5);
        if($pages_query>0 ){
        if($sc=='yes'){
            echo	"<div style='font-family:Palatino Linotype;padding-bottom:20px;font-size:30px;color:green;'align='left' class='lead'>Fulfilled Donations: <span >$pages_query</span>
				</div>";
        }elseif($sc=='no'){
            echo	"<div style='font-family:Palatino Linotype;padding-bottom:20px;font-size:30px;color:green;'align='left' class='lead'>Pending Donations: <span >$pages_query</span>
				</div>";
        }
        echo "<div class='table-responsive'>";
        echo "<table  class='table table-striped table-condensed table-bordered ' >
			<thead><tr>
					<td><b>S/No.</b></td><td><b>Title</b></td><td><b>Name</b></td><td><b> Organization</b></td><td><b>Email</b></td><td><b>Phone</b></td>
					<td><b>Type</b></td><td><b>Subject</b></td><td><b>Area</b></td><td><b>Quantity</b></td><td><b>Beneficiary</b></td>
					<td><b>Timeline</b></td><td><b>Date Added</b></td>
			<td>".'<div class="btn-group">
				 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Fulfilled ? <span class="caret"></span></button><ul class="dropdown-menu" role="menu">
				<li><a href="fulfilled.php?state='.SHA1('yes').'"><i class="glyphicon glyphicon-check"></i> Yes</a></li>
				<li><a href="fulfilled.php?state='.SHA1('no').'"><i class="glyphicon glyphicon-thumbs-down"></i> No</a></li>
				<li><a href="donations.php"><i class="glyphicon glyphicon-asterisk"></i> All Donations</a></li>
			</ul></div></td>
			</tr> </thead>';
        $i=($per_page*($page-1))+1;
        while($result=mysqli_fetch_assoc($query5)){
            echo "<tr><td>".$i."</td><td>".ucwords($result['title'])."</td><td>".$result['name']."</td><td>".$result['organization']."</td>
            <td>".ucwords($result['email'])."</td><td>".$result['phone']."</td><td>".$result['pub_type']."</td><td>".$result['subject_area']."</td>
            <td>".ucwords($result['specificarea'])."</td><td>".$result['quantity']."</td><td>".$result['beneficiary']."</td>
            <td>".ucwords($result['timeline'])."</td><td>".$result['date']."</td><td>".$result['fulfilled'].'</td></tr>';
            $i++;
        }
        echo "</table></div>";
        if($pages>1 && $page<=$pages){
            echo '<ul class="pagination">';
            if($page>1){
                echo'<li><a href="?page=1"> <span class="glyphicon glyphicon-backward"></a></li>';
            }
            if($page>1){
                $prev_page=$page-1;
                echo'<li><a href="?page='.$prev_page.'"> <span class="glyphicon glyphicon-step-backward"></a></li>';
            }
            echo "<li class='active'><a>$page of $pages</a></li>";
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
        }
        }elseif($pages_query <=0 && $sc="yes"){
            echo "<h2 style='color:red;font-family:\"Times New Roman\", Times, serif;'>No pledged donation has been fulfilled.</h2>";
        }elseif($pages_query <=0 && $sc="no") {
            echo "<h2 style='color:red;font-family:\"Times New Roman\", Times, serif;'>No pledged donation unfulfilled.</h2>";
        }
        ?>
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
