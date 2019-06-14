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
    <title>Publications: Admin Search</title>
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
	 <div ><?php 
                    // Checking for search info
                    if(isset($_SESSION['search'])) {
                        echo "<h1 style='color: red;'>".$_SESSION['search']."</h1`>";
                        unset($_SESSION['search']);
                    }?></div>
<?php
		require_once "../includes/conn.php";
		if(isset($_GET['search'])){
			$search=trim($_GET['sterm']);
			if(strlen($search)!=0){
				$per_page=15;                   
				$pages_query=mysqli_num_rows(mysqli_query($con,"SELECT * FROM materials JOIN categories ON category=catID WHERE title LIKE '%$search%' or pubNum LIKE '%$search%'"));
				$pages=ceil($pages_query/$per_page);
				$page=(isset($_GET['page']))? (int)$_GET['page']:1;
				if($page==0){
					header('location:404.php');
				}
				$start=($page-1)*$per_page;
                $query5=mysqli_query($con,"SELECT * from materials JOIN categories ON category=catID WHERE title LIKE '%$search%' or pubNum LIKE '%$search%' LIMIT $start,$per_page");
                $count=mysqli_num_rows($query5);
				if($pages_query>0){
					echo "<h3 style='font-family:Palatino Linotype;font-size:30px;color:green;'>Search Result: <span >$pages_query</span></h3>";
					echo '<div class="table-responsive"><table class="table table-striped table-bordered">';
					echo"<tr><thead><td>S/N</td><td>Pub. ID</td><td>Title</td><td>Author</td><td>Month</td><td>Year</td><td>Category</td><td>Location</td><td></td></thead></tr>";
					$i=($per_page*($page-1))+1;
					while($row=mysqli_fetch_assoc($query5)){
						echo "<tr><td>$i</td><td>".  $row['matID']. '</td><td align="justify">'.  $row['title']. '</td><td align="justify">'.  $row['author']. '</td><td>'.  $row['month']. '</td><td>'.$row["pubYear"].'</td><td align="justify">'.$row['catName'].'</td> <td>'.$row["location"].'</td><td class="hidden-print">
					<div class="btn-group ">
						  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span>
			</button>
					<ul class="dropdown-menu" role="menu">
						<li><a href="pubdetails.php?id='.$row["matID"].'"><i class="glyphicon glyphicon-list-alt"></i> Pub. Details</a></li>										
						<li><a href="edit.php?id='.$row["matID"].'"><span class="glyphicon glyphicon-pencil"></span> Edit</a></li>
						<li><a href="#delete" data-toggle="modal" data-del="'.$row["matID"].'"><span class="glyphicon glyphicon-trash"></span> Remove</a></li>
						';               
                       echo'</ul>
                    </div></td>';					
							$i++;
						}
					echo '</table></div>';
					if($pages>1 && $page<=$pages){
				echo '<ul class="pagination hidden-print">';
				if($page>1){
					echo'<li><a href="?search=true&sterm='.$search.'&page=1"> <span class="glyphicon glyphicon-backward"></a></li>';
				}
				if($page>1){
					$prev_page=$page-1;
					  echo'<li><a href="?search=true&sterm='.$search.'&page='.$prev_page.'"> <span class="glyphicon glyphicon-step-backward"></a></li>';
				}
				$range=4;
				echo "<li class='active'><a >$page of $pages</a></li>";
				if($page<$pages){
					$next_page=$page+1;
					  echo'<li><a href="?search=true&sterm='.$search.'&page='.$next_page.'"> <span class="glyphicon glyphicon-step-forward"></a></li>';
				}if($page<$pages){
					$next_page=$page+1;
					  echo'<li><a href="?search=true&sterm='.$search.'&page='.$pages.'"> <span class="glyphicon glyphicon-forward"></a></li>';
				}
				echo '</ul>';
			}elseif($page>$pages) { 
				header ('location:404.php');
				exit();
			}
				}else {$_SESSION['search']='No match found';
						header('location:search.php');
					}
			}else{ $_SESSION['search']= "Enter search term";
						header('location:search.php');
			}
		}		
		?>     
    </div>
</div><!-- /.container -->

	<!-- /.delete modal -->
	 <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Confirmation</h4>
        </div>
        <div class="modal-body">
		<form method="POST" action="delpub.php">
				<input type="hidden" name="delId">
				<h3>Are you sure you want to delete the publication ?</h3>
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
