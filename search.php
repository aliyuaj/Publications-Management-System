<?php session_start();ob_start();
require_once "includes/conn.php";?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="img/naerls_logo.png">
		<title>Publications: Search</title>
		<!-- Bootstrap core CSS -->
		<link href="dist/css/bootstrap.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="dist/css/starter-template.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="assets/js/html5shiv.js"></script>
		  <script src="assets/js/respond.min.js"></script>
		<![endif]-->
  </head>
  <body>
  <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		      <a class="navbar-brand" href="#">
			  <img src="img/naerl.png" height="60px" style>Publications</a>
        </div>
        <div class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			
            <li ></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li ><a href="contact.php">Contact</a></li>            
			<li ><a href="user_login.php">Login</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
 <div class="container" id="cc">
      <div class="starter-template">	
<?php
		if(isset($_GET['search'])){
			$search=trim($_GET['sterm']);
			if(strlen($search)!=0){
				if(strlen($search)>2){
				$per_page=15;                   
				$pages_query=mysqli_num_rows(mysqli_query($con,"SELECT * FROM materials JOIN categories ON category=catID WHERE title LIKE '%$search%' || author LIKE '%$search%'"));
				$pages=ceil($pages_query/$per_page);
				$page=(isset($_GET['page']))? (int)$_GET['page']:1;
				if($page==0){
					 header ('location:404.html');
				}
				$start=($page-1)*$per_page;
                $query5=mysqli_query($con,"SELECT * from materials JOIN categories ON category=catID WHERE title LIKE '%$search%' || author LIKE '%$search%' LIMIT $start,$per_page");
                $count=mysqli_num_rows($query5);
				if($pages_query>0){
						echo "<h2 style='font-family:Palatino Linotype;font-size:30px;color:green;'>Search Result: <span >$pages_query</span></h2>";
						echo '<form action="request-details.php" method="POST">';
						echo '<div class="table-responsive"><table class="table table-hover table table-bordered stay-center">';
						echo"<thead><tr><td>S/N</td><td>Title</td><td>Author</td><td>Month</td><td>Year</td><td>Category</td></tr></thead>";
						$i=($per_page*($page-1))+1;
						while($row=mysqli_fetch_assoc($query5)){
							$id = $row['matID'];
							echo '<tbody>';
							echo "<tr><td>$i</td><td><a href=publications/?id=$id>".   $row['title']. '</td><td>'.  $row['author']. '</td><td>'.  $row['month']. '</td><td>'.$row["pubYear"].'</td><td>'.$row['catName'].'</td>
							</a></tr>';
						echo  "<input type=hidden value=".$row['matID']. ">";
						$i++;
						}
							echo '</table></div></form>';
							
					if($pages>1 && $page<=$pages){
                        echo '<ul class="pagination">';
                        if($page>1){
							  echo'<li><a href="?search=true&sterm='.$search.'&page=1"> <span class="glyphicon glyphicon-backward"></a></li>';
						}
						if($page>1){
							$prev_page=$page-1;
							  echo'<li><a href="?search=true&sterm='.$search.'&page='.$prev_page.'"> <span class="glyphicon glyphicon-step-backward"></a></li>';
						}
						echo "<li class='active'><a>$page of $pages</a></li>";
						if($page<$pages){
							$next_page=$page+1;
							  echo'<li><a href="?search=true&sterm='.$search.'&page='.$next_page.'"> <span class="glyphicon glyphicon-step-forward"></a></li>';
						}if($page<$pages){
							$next_page=$page+1;
							  echo'<li><a href="?search=true&sterm='.$search.'&page='.$pages.'"> <span class="glyphicon glyphicon-forward"></a></li>';
						}
                        echo '</ul>';
					} elseif($page>$pages) { 
						header ('location:404.html');
						exit();
					}
					}else {$_SESSION['search']='No match found';
						header('location:index.php');
					}
				}else{ $_SESSION['search']= "Enter at least three characters";
						header('location:index.php');
				}	
			}else{ $_SESSION['search']= "Enter search term";
					header('location:index.php');
			}
		}else {	header('location:index.php');}

			 ?>     
	</div>
    </div><!-- /.container -->
	<div id="push"></div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
	<script src="includes/footer.js"></script>

  </body>

<!-- Mirrored from getbootstrap.com/examples/starter-template/ by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 02 Oct 2013 12:14:27 GMT -->
</html>
