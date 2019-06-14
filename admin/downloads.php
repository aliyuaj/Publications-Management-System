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
    <title>Admin :Publications downloads</title>
		<script src="../assets/jquery-2.1.3.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../dist/css/starter-template.css" rel="stylesheet">
    <link href="../assets/jquery.datetimepicker.css" rel="stylesheet"/>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
      <script src="../assets/js/respond.min.js"></script>
      <style type="text/css">
          .custom-date-style {
              background-color: red !important;
          }

          .input{
          }
          .input-wide{
              width: 500px;
          }

      </style>
      <script>
          $(document).ready(function(){
              $('#delete').on('show.bs.modal',function(e){
                  var did=$(e.relatedTarget).data('del');
                  $(e.currentTarget).find('input[name="delId"]').val(did);
              });
          });
      </script>
    <![endif]-->
    <style type="text/css">
        .custom-date-style {
            background-color: red !important;
        }

        .input{
        }
        .input-wide{
            width: 500px;
        }

    </style>
  </head>
  <body>   
  <?php include 'header.php'; ?>
	  	  <div class="container" id="cc">
			<div class="starter-template">
				  <?php 		if(isset($_SESSION['dwd'])){
				echo '<div  class="alert alert-success" style="color:green;font-weight:bold;font-size:20px;">';
				print $_SESSION['dwd']; unset($_SESSION['dwd']);
				echo '</div>';
			}

                echo '<div class="panel panel-default" >
                    <div class="panel-heading" style="font-size: 15px;">Sort downloads by date range</div>
                    <div class="panel-body" >
                        <div class="col-md-12 row" style="padding:5px 20px 15px 0">
                            <form class="form-inline" role="form" action="downloads.php" method="post">
                                <div class="col-lg-2">
                                    <span style="font-size: 20px;color: #AA0000">Downloads from </span>
                                </div><div class="col-lg-4">
                    <input type="text" class="form-control" name="timeline1" id="datetimepicker1" />
                                </div>
                                <div class="col-lg-2">
                                    <span style="font-size: 20px;color: #AA0000">To </span>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                    <input type="text" class="form-control" name="timeline2" id="datetimepicker2" />
                    <span class="input-group-btn">
                                <button class="btn btn-default" type="submit" name="view"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                                    </div>
                                </div>
                                </form>
                        </div>
                    </div>
                </div>';
                  if (isset($_POST["view"]))
                  {
                      $date1 = $_POST['timeline1'];
                       $date2 = $_POST['timeline2'];
                      $sqlstr = "SELECT  pubID,title,author, COUNT(*) AS total from downloads LEFT JOIN materials ON downloads.pubID=materials.matID WHERE
                    date BETWEEN '$date1' AND '$date2' GROUP BY pubID ";
                        $stat = mysqli_query($con,"SELECT  * from downloads LEFT JOIN materials ON downloads.pubID=materials.matID WHERE
                    date BETWEEN '$date1' AND '$date2'");
                      $row=mysqli_fetch_assoc($stat);
                      $_SESSION['stat']="Downloads between <span style='color: red'>".$date1."</span> and <span style='color: red'>".$date2."</span> => <span class='label label-info'>".mysqli_num_rows($stat)."</span>";
                     echo mysqli_error($con);

                  }else {
                      $sqlstr = "SELECT pubID,title,author, COUNT(*) AS total from downloads LEFT JOIN materials ON downloads.pubID=materials.matID  GROUP BY pubID  ";
                  }
                  $per_page=15;
                  $pages_query=mysqli_num_rows(mysqli_query($con,$sqlstr));
                  $pages=ceil($pages_query/$per_page);
                  $page=(isset($_GET['page']))? (int)$_GET['page']:1;
                  if($page==0){
                      header('location:404.php');
                  }
                  $start=($page-1)*$per_page;
                  $query5=mysqli_query($con,$sqlstr);
                  echo  mysqli_error($con);
                  $count=mysqli_num_rows($query5);
                  if($pages_query>0){
                      if(isset($_SESSION['stat'])) {
                          echo '<div class="alert alert-info" align="lft" style="color: #005500;font-size:25px;font-weight:bold;">'.$_SESSION['stat'].'</div>';
                          unset($_SESSION['stat']);
                      }
                  echo	"<div style='font-family:Palatino Linotype;font-size:30px;color:green;' class='lead pull-left'>No. of Publications Downloaded: <span>$pages_query</span></div>";
                  echo "<div class='table-responsive'>";
                  echo "<table  class='table table-striped table-condensed table-bordered stay-center' style='min-width:100%'>
			<thead><tr>
			<td><b>S/No.</b></td><td><b>Publication Title</b></td><td><b>Author</b></td><td><b>Downloads</b></td>
			</tr></thead> ";
                  $i=($per_page*($page-1))+1;
                  while($result=mysqli_fetch_assoc($query5)){
                      echo "<tr><td>".$i."</td><td align='justify'>".$result['title']."</td><td>".$result['author']."</td><td>".$result['total'].'</td>';
                      $i++;
                  }
                  if($type=='super'){
                      echo '<tr><td colspan="4" class="text-right"><a href="#reset" data-toggle="modal" class="btn btn-success" name="reset">Reset All</a></td>';
                  }
                  echo "</table></div>";
                  $s=$_SESSION['id'];

		}else echo "<h2 style='color:red;font-family:\"Times New Roman\", Times, serif;'>Publication download empty</h2>";
			?>
    </div>
  
  <!-- / Reset Confirmation modal -->	
	 <div class="modal fade" id="reset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Reset Confirmation</h4>
        </div>
        <div class="modal-body">
		<form method="POST" action="downloads.php">
				<h3>Reset deletes all downloads info. Continue?</h3>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
			  <button type="submit" class="btn btn-danger" name="reset">Yes</button>
			</div>
		</form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
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
                  <form method="POST" action="delete_downloads.php">
                      <input type="hidden" name="delId">
                      <h3>Are you sure you want to delete the download ?</h3>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                  <button type="submit" class="btn btn-danger">Yes</button>
              </div>
              </form>
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <script src="../assets/jquery.datetimepicker.full.js"></script>
  <script type="text/javascript">
      $('#datetimepicker1').datetimepicker({
          lang:'en',
          timepicker:false,
          format:'Y/m/d',
          formatDate:'Y/m/d',
          minDate:'+1950/01/01', // yesterday is minimum date
          maxDate:'+1970/01/01' // and tommorow is maximum date calendar
      });
      $('#datetimepicker2').datetimepicker({
          lang:'en',
          timepicker:false,
          format:'Y/m/d',
          formatDate:'Y/m/d',
          minDate:'+1950/01/01', // yesterday is minimum date
          maxDate:'+1970/01/01' // and tommorow is maximum date calendar
      });
  </script>
  <!-- Bootstrap core JavaScript
  ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
	<script src="../includes/footer.js"></script>

  </body>

</html>

<?php 
if(isset($_POST['reset'])){
	$sql = mysqli_multi_query($con,"UPDATE pub_media SET downloads='0'","DELETE * FROM downloads");
	if(mysqli_affected_rows($con)>0){
		$_SESSION['dwd']="Downloads reset successful";
		header("location: downloads.php");
	}
	else{
		$_SESSION['dwd']="Unable to reset downloads";
		header("location: downloads.php");
	}
}
?>