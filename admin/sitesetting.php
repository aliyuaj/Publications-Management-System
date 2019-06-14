<?php require 'session.php';ob_start();
include '../includes/conn.php';
if($_SESSION['type']!="super"){
	header('location:../index.php');
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
    <title>Admin Site Settings</title>
		<script src="../assets/jquery-2.1.3.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../dist/css/starter-template.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
      <script src="../assets/js/respond.min.js"></script>
    <![endif]--></script>	
  </head>
  <style type="text/css">
  .form-setting{
	  max-width:350px;
	  padding-top: 120px;
	  padding-bottom: 180px;
	  margin:0 auto;  
  }
  
.form-setting .form-control {
  position: relative;
  font-size: 20px;
  height: auto;
  padding: 10px;
  -webkit-box-sizing: border-box;
   -moz-box-sizing: border-box;
   box-sizing: border-box;
}
</style>
  <body>
    <?php include 'header.php';?>
	    <div class="container" id="cc" >

      <form class="form-setting" method="POST" action="sitesetting.php" >
	  <fieldset>
        <legend style="text-align:center;font-size:25px;">Site Settings</legend>
<div align="left">
	<?php 
	// Checking for setting failure
	if(isset($_SESSION['set'])) {
		echo "<ul>";
		echo "<li style='color: red; font-size: 18px;list-style-type:none;'>".$_SESSION['set']."</li>";
		echo "</ul>";
		unset($_SESSION['set']);
	}
		$mail=mysqli_fetch_assoc(mysqli_query($con,"SELECT * from settings"));
		$sitemail=$mail['email'];
		$website=$mail['website'];	
		?></div>
		<div class="form-group">
			<input type="url" class="form-control"  name="sitename"  value="<?php echo $website?> " title=" Website " >
		</div>
        <div class="form-group"> 
			<input type="email" class="form-control"name="email" value="<?php echo $sitemail?>" title=" Site Email "> 
		</div>
        <input class="btn btn-primary btn-lg  btn-block" name="saveset" type="submit" value="Save Setting">
     </fieldset> </form>
    </div> <!-- /container -->
   <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
	<script src="../includes/footer.js"></script>

  </body>

<!-- Mirrored from getbootstrap.com/examples/starter-template/ by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 02 Oct 2013 12:14:27 GMT -->
</html>
<?php 
	if(isset($_POST['saveset'])){
	$web=trim($_POST['sitename']);
	$email=trim($_POST['email']);
		$setquery=mysqli_query($con,"UPDATE settings SET website='$web',email='$email'");
		if(mysqli_affected_rows($con)>0){
			$_SESSION['set']="Site settings updated";
			header('location:sitesetting.php');
		}else{
			$_SESSION['set']="Unable to update Site settings";
			header('location:sitesetting.php');
		}
	}
?>