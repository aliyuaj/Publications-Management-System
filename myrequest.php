<?php
/**
 * Created by PhpStorm.
 * User: HP USER
 * Date: 1/7/2017
 * Time: 8:01 PM
 */
    $title='Publications: My Requests';
    $location='';
    $publocation='publications/';
include 'includes/header.php';
include 'includes/lsidebar.php';
?>
<div class="col-md-6">
    <?php
    $s=$_SESSION['id'];
    $per_page=15;
    $pages_query=mysqli_num_rows(mysqli_query($con,"SELECT * FROM requests  WHERE userID='$s'"));
    $pages=ceil($pages_query/$per_page);
    $page=(isset($_GET['page']))? (int)$_GET['page']:1;
    if($page==0){
        header ('location:404.php');
    }
    $start=($page-1)*$per_page;
    $query5=mysqli_query($con,"SELECT * FROM requests JOIN materials ON requests.matID=materials.matID WHERE userID='$s' ORDER BY date DESC LIMIT $start,$per_page");
    $count=mysqli_num_rows($query5);
    if($pages_query>0){
        echo	"<div style='font-family:Palatino Linotype;padding-bottom:20px;font-size:30px;color:green;' align='left' class='lead'>My Requests: <span >$pages_query</span></div>";
        echo "<div class='table-responsive'>";
        echo "<table  class=\"table table-striped table-condensed table-bordered \" >
					<thead><tr>
					<td><b>S/No.</b></td><td><b>Publication Title</b></td><td><b>Date</b></td><td><b>Status</b></td>";
        echo "</tr></thead> ";
        $i=($per_page*($page-1))+1;
        while($result=mysqli_fetch_assoc($query5)){
            echo "<tr><td>".$i."</td><td>".$result['title']."</td><td>".$result['date']."</td><td>".$result['granted']."</td>";
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
    }else echo "<h2 style='color:red;font-family:\"Times New Roman\", Times, serif;'>You are yet to request for any publication.</h2>";
    ?>
</div>
<?php include 'includes/rsidebar.php';?>
</div></div></div><!-- /.container -->

<div id="push"></div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="dist/js/bootstrap.min.js"></script>
<script src="includes/footer.js"></script>
</body>
</html>
