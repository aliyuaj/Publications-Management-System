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
    <title>Publications: Admin Activity</title>
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
        <?php if(isset($_SESSION['del'])){
            echo '<div  class="alert alert-success" style="color:green;font-weight:bold;font-size:20px;">';
            print $_SESSION['del']; unset($_SESSION['del']);
            echo '</div>';
        }
        $s=$_SESSION['id'];
        $per_page=15;
        $pages_query=mysqli_num_rows(mysqli_query($con,"SELECT * FROM activities WHERE adminID='$s'"));
        $pages=ceil($pages_query/$per_page);
        $page=(isset($_GET['page']))? (int)$_GET['page']:1;
        if($page==0){
            header ('location:404.php');
        }
        $start=($page-1)*$per_page;
        $name=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM users WHERE id='$s'"));
        $admin=$name['fullName'];
        $query5=mysqli_query($con,"SELECT * from activities  WHERE adminID='$s' ORDER BY date DESC LIMIT $start,$per_page");
        $count=mysqli_num_rows($query5);
        if($pages_query>0){
            echo	"<div style='font-family:Palatino Linotype;padding-bottom:20px;font-size:30px;color:green;' align='left' class='lead'>My Activities: <span >$pages_query</span></div>";
            echo "<div class='table-responsive'>";
            echo "<table  class=\"table table-striped table-condensed table-bordered stay-center\" style='width: 100%' >
					<thead><tr>
					<td><b>S/No.</b></td><td><b>Activity</b></td><td><b>Date/Time</b></td>";
            if($_SESSION['type']=='super'){
                echo "<td><form action='delactivities.php' method='POST'><input type='submit' class='btn btn-success' name='del' style='width:90%'value='Delete'/></td>";
            }
            echo "</tr></thead> ";
            $i=($per_page*($page-1))+1;
            while($result=mysqli_fetch_assoc($query5)){
                echo "<tr><td>".$i."</td><td>".$result['activity']."</td><td>".$result['date']."</td>";
                if($_SESSION['type']=='super'){
                    echo "<td><input type='checkbox' name='extras[]' value='".$result['actID']."'/></td>";
                }
                echo "</tr>";
                $i++;
            }
            echo "</form></table></div>";
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
                exit();
            }
        }else echo "<h2 style='color:red;font-family:\"Times New Roman\", Times, serif;'>No  Administrative activity has been carried out by You</h2>";
        ?>
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
</html>

