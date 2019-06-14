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
    <title>Publications: Admin Publication Details</title>
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
		<div role="main">
			<div class="bs-docs-section">
				<div class="page-header" >		 
					<form method="post" action="editor.php">
						<?php 
						$s = $_GET["id"];
						$result = mysqli_query($con,"SELECT * FROM materials JOIN categories ON category=catID WHERE matID='$s'");
						if(mysqli_num_rows($result)>0){
							echo	"<div style='font-family:Palatino Linotype;font-size:30px;color:green;' class='lead'>Publication Details</div>";
							while($row = mysqli_fetch_assoc($result)){
								echo '<table class="table table-bordered stay-center" style="min-width:50%;text-align:left;">';		  	 
								echo'<tr><td class="sidecol" ><span >Pub. ID:</span></td>';
								echo'<td>'. $row['matID'] .'</td></tr>'; 
								echo'<tr><td class="sidecol" ><span class="tl">Title:</span></td>';
								echo'<td>'. $row['title'] .'</td></tr>'; 
								echo'<tr><td class="sidecol"><span class="tl">Authors:</span></td>';
								echo'<td>'. $row['author'] .'</td></tr>'; 
								echo'<tr><td class="sidecol"><span class="tl">Sponsors:</span></td>';
								echo'<td>'. $row['sponsor'] .'</td></tr>';
								echo'<tr><td class="sidecol"><span class="tl">Language:</span></td>';
								echo'<td>'. $row['language'] .'</td></tr>'; 
								echo'<tr><td class="sidecol"><span class="tl">Copies:</span></td>';
								echo'<td>'. $row['copies'] .'</td></tr>';
								echo'<tr><td class="sidecol"><div class="tl">Location</div></td>';
								echo'<td>'. $row['location'] .'</td></tr>';
								echo '<tr><td class="sidecol"><div class="tl">Category</div></td>';
								echo '<td>'.$row['catName'].'</td></tr>';
								echo'<tr><td class="sidecol"><div class="tl">Pub. Year:</div></td>';
								echo'<td>'. $row['pubYear'] .'</td></tr>';
								echo'<tr><td class="sidecol"><div class="tl">Month:</div></td>';
								echo'<td>'. $row['month'] .'</td></tr>';
								echo'<tr><td class="sidecol"><div class="tl">Date Added:</div></td>';
								echo'<td>'. $row['today'] .'</td></tr>';
								echo '<tr>';
								echo'<td colspan="2" class="text-right"><button type="button" name="save" class="btn btn-primary" onclick="history.back();">Back</button></td></tr>';
							}
						}else {
							 echo "<h1 style='color: red;'>The Publication has been removed</h1`>";
						}
						echo'</table>';
						?>
					</form>      
				</div>
			</div>
		</div>
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

<!-- Mirrored from getbootstrap.com/examples/starter-template/ by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 02 Oct 2013 12:14:27 GMT -->
</html>