<?php require 'session.php';ob_start();
include '../includes/conn.php';
if($_SESSION['type']=="super" OR $_SESSION['type']=="main"){
}else 	{ header('location:../index.php');
	exit();
	}

?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from getbootstrap.com/examples/starter-template/ by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 02 Oct 2013 12:14:27 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../img/naerls_logo.png">

    <title>Publications | Manage Admin</title>
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
        <div class="col-md-3">
	<form class="form-signin" method="POST" action="manageadmin.php"><fieldset>
        <legend>Create New Admin</legend>
<div align="left"><?php 
                    // Checking for create failure
                    if(isset($_SESSION['create'])) {
                        echo "<ul>";
                        echo "<li style='color: red; font-size: 12px;list-style-type:none;'>".$_SESSION['create']."</li>";
                        echo "</ul>";
                        unset($_SESSION['create']);
                    }?></div>      
        <div class="form-group"> <input type="text" class="form-control"name="fullname" placeholder="Full Name" required> </div>
		  <div class="form-group"><input type="email" class="form-control"  name="username"placeholder="email" required></div>
		  <div class="alert alert-info">NOTE: The default password is <strong>admin </strong>which could be changed on successfully logging in.</div>
        <input class="btn btn-success pull-right"  name="create"type="submit" value="Create">
     </fieldset> </form><!-- /input-group -->
	</div>
	<div class="col-md-9">
		    <?php
            if(isset($_SESSION['change'])) {
                echo "<ul>";
                echo "<li style='color: green; font-size: 18px;list-style-type:none;'>".$_SESSION['change']."</li>";
                echo "</ul>";
                unset($_SESSION['change']);
            }if(isset($_SESSION['success'])) {
                echo "<ul>";
                echo "<li style='color: green; font-size: 18px;list-style-type:none;'>".$_SESSION['success']."</li>";
                echo "</ul>";
                unset($_SESSION['success']);
            }if(isset($_SESSION['done'])) {
                echo "<ul>";
                echo "<li style='color: green; font-size: 18px;list-style-type:none;'>".$_SESSION['done']."</li>";
                echo "</ul>";
                unset($_SESSION['done']);
            }
					$per_page=10;
					if($_SESSION['type']=='super'){
                    $pages_query=mysqli_num_rows(mysqli_query($con,"SELECT * FROM  users WHERE usertype='admin' && type!='super'"));
                    $pages=ceil($pages_query/$per_page);
                    $page=(isset($_GET['page']))? (int)$_GET['page']:1;
					if($page==0){
					 $page=1;
					}
                    $start=($page-1)*$per_page;
                        $query5=mysqli_query($con,"SELECT * from users WHERE usertype='admin' && type!='super' LIMIT $start,$per_page");
                        $count=mysqli_num_rows($query5);
                        echo "<div class='table-responsive'>
					<table  class=\"table table-striped table-condensed table-bordered \" >
					<tr class='success' colspan='7'><td> Other Admins <span class='badge'>$pages_query</span></td></tr>
					<tr>
					<td><b>S/No.</b></td><td><b>Full Name</b></td><td><b>Type</b></td><td><b>Last Logged in</b></td><td></td></tr> ";
					$i=1;
                        while($result=mysqli_fetch_assoc($query5)){
                        echo "<tr><td>".$i."</td><td>".$result['fullName']."</td><td>".$result['type']."</td><td>".$result['lastSeen']."</td><td>".'
					<div class="btn-group">
						<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-user glyphicon-white"></span> Action</button>
						 <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#delete" data-toggle="modal" data-del="'.$result["id"].'"><span class="glyphicon glyphicon-trash"></span> Remove Admin</a></li>
						<li><a href="activities.php?id='.$result["id"].'"><span class="glyphicon glyphicon-wrench"></span> Recent Activities</a></li>
						';   
					if($result['type']=='sub'){ echo '<li><a href="mainadm.php?id='.$result["id"].'"><span class="glyphicon glyphicon-sort"></span> Make main admin</a></li>';}
                        else {echo '<li><a href="subadm.php?id='.$result["id"].'"><span class="glyphicon glyphicon-sort"></span> Make sub admin</a></li>';}						
                       echo'</ul>
                    </div></td>
            </tr><tr ><td  colspan="5">';
			$i++;
            }  
		}elseif($_SESSION['type']=='main'){
			 $pages_query=mysqli_num_rows(mysqli_query($con,"SELECT * FROM  users WHERE usertype='admin' && type='sub'"));
                    $pages=ceil($pages_query/$per_page);
                    $page=(isset($_GET['page']))? (int)$_GET['page']:1;
                    $start=($page-1)*$per_page;
                        $query5=mysqli_query($con,"SELECT * from users WHERE usertype='admin' && type='sub' LIMIT $start,$per_page");
                        $count=mysqli_num_rows($query5);
                        echo "<div class='table-responsive'>
					<table  class=\"table table-striped table-condensed table-bordered \" >
					<tr class='success' colspan='7'><td> Sub Admins <span class='badge'>$pages_query</span></td></tr>
					<tr>
					<td><b>S/No.</b></td><td><b>Full Name</b></td><td><b>Type</b></td><td><b>Last Logged in</b></td><td></td></tr> ";
					$i=1;
                        while($result=mysqli_fetch_assoc($query5)){
                        echo "<tr><td>".$i."</td><td>".$result['fullName']."</td><td>".$result['type']."</td><td>".$result['lastSeen']."</td><td>".'
					<div class="btn-group">
						<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-user glyphicon-white"></span> Action</button>
						 <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#delete" data-toggle="modal" data-del="'.$result["id"].'"><span class="glyphicon glyphicon-trash"></span> Remove Admin</a></li>
						<li><a href="activities.php?id='.$result["id"].'"><span class="glyphicon glyphicon-wrench"></span> Recent Activities</a></li>
						';   
					if($result['type']=='sub'){ echo '<li><a href="mainadm.php?id='.$result["id"].'"><span class="glyphicon glyphicon-sort"></span> Make main admin</a></li>';}
                        else {echo '<li><a href="subadm.php?id='.$result["id"].'"><span class="glyphicon glyphicon-sort"></span> Make sub admin</a></li>';}						
                       echo'</ul>
                    </div></td>
            </tr><tr ><td  colspan="5">';
			$i++;
            }			
						
						}if($pages>1 && $page<=$pages){
                        echo '<ul class="pagination">';
                        if($page>1){
							$prev_page=$page-1;
							  echo'<li><a href="?page='.$prev_page.'">&laquo;</a></li>';
						}
						$range=4;
						for($x=($page-$range);$x<(($page+$range)+1);$x++){
							if(($x>0)&&($x<=$pages)){
								if($page==$x){
								echo ' <li class="active">';
								}else {
								echo '<li>';
								}                           
								echo '<a href="?page='.$x.'">'.$x.'</a>';
								echo '</li>';
							}
						}
						if($page<$pages){
							$next_page=$page+1;
							  echo'<li><a href="?page='.$next_page.'">&raquo;</a></li>';
						}
                        echo '</ul>';
                    }elseif($page>$pages) { 
						echo "<h2 style='color:red;font-family:\"Times New Roman\", Times, serif;'>Page not found</h2>";
						exit();
					} echo "</td></tr></table></div>";?>
    </div>
    </div>
<?php 
if(isset($_POST['create'])){
	$uname=trim($_POST['username']);
	$fname=trim($_POST['fullname']);
	if(strlen($uname)>0 && strlen($fname)>0){
			$username= ucwords($uname);
			$fullname= ucwords($fname);
			if(strlen($uname)>=5 && strlen($fullname)>=5){
                $query0 = mysqli_query($con,"SELECT * FROM users WHERE email='$username'");
                if(mysqli_num_rows($query0)==0) {
                    $charset = "abcdefghijklmnopqrstuvwxyz0123456789";
                    $genID = substr(str_shuffle($charset), 0, 10);
                    $query1 = mysqli_query($con, "INSERT INTO users (id,email,password,fullName,usertype,type)
				VALUES
				('$genID','$username','admin','$fullname','admin','sub')");
                    echo mysqli_error($con);
                    if (mysqli_affected_rows($con) > 0) {
                        $_SESSION['create'] = "Admin successfully created.";
                        $fname = $_SESSION['name'];
                        $id = $_SESSION['id'];
                        $qact = mysqli_query($con, "INSERT INTO activities (actID,adminID,adminName,type,activity,date)
					VALUES
					(' ','$fname','$id','Create Admin','Added $fullname as Admin',NOW())");
                        header('location:manageadmin.php');
                    } else {
                        $_SESSION['create'] = " unable to create admin." . mysqli_error($con);
                    }
                        header('location:manageadmin.php');
                    }else {
                        $_SESSION['create'] = "Email already registered";
                        header('location:manageadmin.php');
                }
			}else {
				$_SESSION['create']=" Full name should be at least 5 characters";
				header('location:manageadmin.php');
			}
	}else {
				$_SESSION['create']=" Complete all fields.";
				header('location:manageadmin.php');
	}		
}
?>

<!-- / Delete Confirmation modal -->	
	 <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Confirmation</h4>
        </div>
        <div class="modal-body">
		<form method="POST" action="deladmin.php">
				<input type="hidden" name="delId">
				<h3>Are you sure you want to delete this Admin ?</h3>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
			  <button type="submit" class="btn btn-danger">Yes</button>
			</div>
		</form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../includes/footer.js"></script>
  </body>
<!-- Mirrored from getbootstrap.com/examples/starter-template/ by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 02 Oct 2013 12:14:27 GMT -->
</html>