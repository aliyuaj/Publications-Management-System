<?php require 'session.php';
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
    <title>Publications: Admin Activities</title>
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
		</script>	
  </head>
  <body>   
  <?php include 'header.php'; ?>
	  	  <div class="container" id="cc">
			      <div class="starter-template">
<?php 
			$s=$_GET['id'];
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
				echo	"<div style='font-family:Palatino Linotype;padding-bottom:20px;font-size:30px;color:green;'align='left' class='lead'>Activities by <b>$admin</b>: $pages_query</div>";
			   echo "<div class='table-responsive'>";
			echo "<table  class=\"table table-striped table-condensed table-bordered \" >
			<thead><tr>
			<td><b>S/No.</b></td><td><b>Activity</b></td><td><b>Date/Time</b></td>
			</tr></thead> ";
			$i=($per_page*($page-1))+1;
				while($result=mysqli_fetch_assoc($query5)){
				echo "<tr><td>".$i."</td><td>".$result['activity']."</td><td>".$result['date']."</td></tr>";
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
			}  elseif($page>$pages) { 
				header ('location:404.php');
			}
					}else echo "<h2 style='color:red;font-family:\"Times New Roman\", Times, serif;'>No  Administrative activity has been carried out by <b>$admin</b></h2>";
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

