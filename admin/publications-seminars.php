<?php require 'session.php';ob_start();
include '../includes/conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../img/naerls_logo.png">

    <title>Admin Publications - Seminar Papers</title>
		<script src="../assets/jquery-2.1.3.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet" media="all">
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
        $('#selpub').change(function () {
            var pub=$('#selpub').val();
            if(pub==1){
                window.location.href="publications.php";
            }else if (pub==2){
                window.location.href="publications-books.php";
            }else if (pub==3){
                window.location.href="publications-reports.php";
            }else if (pub==4){
                window.location.href="publications-bulletins.php";
            }else if (pub==5){
                window.location.href="publications-guides.php";
            }else if (pub==6){
                window.location.href="publications-handbills.php";
            }else if (pub==7){
                window.location.href="publications-posters.php";
            }else if (pub==8){
                window.location.href="publications-leaflets.php";
            }else if (pub==9){
                window.location.href="publications-flipbooks.php";
            }else if (pub==10){
                window.location.href="publications-commodity-price.php";
            }else if (pub==11){
                window.location.href="publications-newsletters.php";
            }else if (pub==12){
                window.location.href="publications-extension-journals.php";
            }else if (pub==13){
                window.location.href="publications-seminars.php";
            }
        });
	});
</script>
	
</head>
<body>
<?php include 'header.php'; ?>
<div class="container" id="cc">
	<div class="starter-template">
		<div role="main">
			<?php 	
			if(isset($_SESSION['delete'])){
				echo '<div  class="alert alert-success" style="color:green;font-weight:bold;font-size:30px;">';
				print $_SESSION['delete']; unset($_SESSION['delete']);
				echo '</div>';
			}if(isset($_SESSION['done'])){
				echo '<div  class="alert alert-success" style="color:green;font-weight:bold;font-size:30px;">';
				print $_SESSION['done']; unset($_SESSION['done']);
				echo '</div>';
			}
		?>
		<div class="col-md-3 hidden-print" style="padding-left:0px;">
            <form role="form" >
                <select class="form-control" name="cat" id="selpub">
                    <option value="1"> ...View Category...</option>
                    <?php
                    $categoryQuery=mysqli_query($con,"SELECT * FROM categories");
                    $c=2;
                    while($category=mysqli_fetch_assoc($categoryQuery)){
                        echo "<option value='".$c."'>".$category['catName']."</option>";
                        $c++;
                    }
                    ?>
                </select>
            </form>
	</div>
<?php					/****ALL JOURNALS****/
	echo '<div id="all">';
	$per_page=20;
	$pages_query=mysqli_num_rows(mysqli_query($con,"SELECT * FROM materials JOIN categories ON category=catID WHERE catName='Seminar Papers'"));
	if ($pages_query>0){
        $pages=ceil($pages_query/$per_page);
	$page=(isset($_GET['page']))? (int)$_GET['page']:1;
	if($page==0){
	 header('location:404.php');
	}
	$start=($page-1)*$per_page;
		$query5=mysqli_query($con,"SELECT * FROM materials JOIN categories ON category=catID WHERE catName='Seminar Papers LIMIT $start,$per_page");
		$count=mysqli_num_rows($query5);
	echo "<div style='font-family:Palatino Linotype;font-size:30px;color:green;' align='left'><b> Seminar Papers: </b>$pages_query</div>
			<div  class='table-responsive' >
			<table  class='table table-striped table-condensed table-bordered' style='width:100%' >
			<thead>
	<tr>
	<td><b>S/No.</b></td><td><b>Title</b></td><td><b>Authors</b></td><td><b>Sponsors</b></td><td class='hidden-print'><b>Copies</b></td><td class='hidden-print'><b>Location</b></td><td class='hidden-print'></td>
			</tr> </thead>";
$i=($per_page*($page-1))+1;
while($result=mysqli_fetch_assoc($query5)){
    echo "<tr><td >".$i."</td><td align='justify'>".$result['title']."</td><td align='justify'>".$result['author']."</td><td align='justify'>".$result['sponsor']."</td><td class='hidden-print'>".$result['copies']."</td><td class='hidden-print'>".$result['location'].'</td><td class="hidden-print">
				<div class="btn-group ">
		  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span>
	</button>
	<ul class="dropdown-menu" role="menu">
		<li><a href="pubdetails.php?id='.$result["matID"].'"><i class="glyphicon glyphicon-list-alt"></i> Pub. Details</a></li>						
		<li><a href="edit.php?id='.$result["matID"].'"><span class="glyphicon glyphicon-pencil"></span> Edit</a></li>
		<li><a href="#delete" data-toggle="modal" data-del="'.$result["matID"].'"><span class="glyphicon glyphicon-trash"></span> Remove</a></li>
		';               
	   echo'</ul>
	</div></td>
	</tr>';
	$i++;}
	echo '</table></div>';
	if($pages>1 && $page<=$pages){
		echo '<ul class="pagination hidden-print">';
		if($page>1){
			  echo'<li><a href="?page=1"> <span class="glyphicon glyphicon-backward"></a></li>';
		}
		if($page>1){
			$prev_page=$page-1;
			  echo'<li><a href="?page='.$prev_page.'"> <span class="glyphicon glyphicon-step-backward"></a></li>';
		}
		echo "<li class='active'><a >$page of $pages</a></li>";
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
	echo'</div>';
				echo '<button class="btn btn-success hidden-print" onclick="window.print()"><span class="glyphicon glyphicon-print"></span> Print List</button>';

				/****END OF ALL JOURNALS****/
}else        echo "<h2 style='color:red;font-family:\"Times New Roman\", Times, serif;'>Publication category is currently empty</h2>";
?>
      </div>
      </div>
      </div>      
	  </div>
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
	
	  	<div id="push" class="hidden-print"></div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/printElement.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../includes/footer.js"></script>
  </body>
</html>