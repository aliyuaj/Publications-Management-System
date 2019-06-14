<?php require 'session.php';ob_start();
include '../includes/conn.php';
if($_SESSION['type']=="super"){
}else 	{ header('location:../404_log.html');
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
    <title>Publications: Admin - Manage DB</title>
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
			$('#editUnit').on('show.bs.modal',function(e){
				var eid=$(e.relatedTarget).data('editid');
				$(e.currentTarget).find('input[name="editId"]').val(eid);
				var ename=$(e.relatedTarget).data('editname');
				$(e.currentTarget).find('input[name="editName"]').val(ename);
			});
			$('#editCategory').on('show.bs.modal',function(e){
				var eid=$(e.relatedTarget).data('editid');
				$(e.currentTarget).find('input[name="editId"]').val(eid);
				var ename=$(e.relatedTarget).data('editname');
				$(e.currentTarget).find('input[name="editName"]').val(ename);
			});
			$('#editSubject').on('show.bs.modal',function(e){
				var eid=$(e.relatedTarget).data('editid');
				$(e.currentTarget).find('input[name="editId"]').val(eid);
				var ename=$(e.relatedTarget).data('editname');
				$(e.currentTarget).find('input[name="editName"]').val(ename);
			});
			$('#deleteUnit').on('show.bs.modal',function(e){
				var did=$(e.relatedTarget).data('del');
				$(e.currentTarget).find('input[name="delId"]').val(did);
			});
			$('#deleteSubject').on('show.bs.modal',function(e){
				var did=$(e.relatedTarget).data('del');
				$(e.currentTarget).find('input[name="delId"]').val(did);
			});
			$('#deleteCategory').on('show.bs.modal',function(e){
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
		<?php 		if(isset($_SESSION['db'])){
				echo '<div  class="alert alert-success" style="color:green;font-weight:bold;font-size:30px;">';
				print $_SESSION['db']; unset($_SESSION['db']);
				echo '</div>';
			}
		?>
		<div class="row">
		<div class="col-md-4">		
			<?php 
				$units = mysqli_query($con,"SELECT * FROM units ");
			echo "<table class='table table-striped table-condensed table-bordered'><thead><tr><td>S/No.</td><td>Unit Name</td><td>".
			'<a href="#addUnit" data-toggle="modal" ><button class="btn btn-default btn-sm">Add Unit <i class="glyphicon glyphicon-plus"></i> </button></a></td></tr></thead>';
			$i=1;
			while($row = mysqli_fetch_assoc($units)){ 
				echo "<tr><td>".$i."</td><td>".$row['unitname']."</td><td>".'<div class="btn-group">
						 <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
						 <ul class="dropdown-menu" role="menu">
							<li><a href="#editUnit" data-toggle="modal" data-editid="'.$row["unitid"].'" data-editname="'.$row["unitname"].'"><i class="glyphicon glyphicon-pencil"></i> Edit</a></li>
							<li><a href="#deleteUnit" data-toggle="modal" data-del="'.$row["unitid"].'"><i class="glyphicon glyphicon-trash"></i> Delete</a></li>
						</ul></td></div></tr>';
						$i++;
			}
			echo "</table>";
			 ?>
		</div>
		<div class="col-md-4">
		  <?php 
				$category = mysqli_query($con,"SELECT * FROM categories ");
			echo "<table class='table table-striped table-condensed table-bordered'><thead><tr ><td>S/No.</td><td>Category </td><td>".
			'<a href="#addCategory" data-toggle="modal" ><button class="btn btn-default btn-sm">Add Category <i class="glyphicon glyphicon-plus"></i> </button></a></td></tr></thead>';
			$i=1;
			while($row = mysqli_fetch_assoc($category)){ 
				echo "<tr><td>".$i."</td><td>".$row['catName']."</td><td>".'<div class="btn-group">
						 <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
						 <ul class="dropdown-menu" role="menu">
							<li><a href="#editCategory" data-toggle="modal" data-editid="'.$row["catID"].'" data-editname="'.$row["catName"].'"><i class="glyphicon glyphicon-pencil"></i> Edit</a></li>
							<li><a href="#deleteCategory" data-toggle="modal" data-del="'.$row["catID"].'"><i class="glyphicon glyphicon-trash"></i> Delete</a></li>
						</ul></td></div></tr>';
						$i++;
			}
			echo "</table>";
			 ?>
		</div>
		<div class="col-md-4">
<?php 
				$subject = mysqli_query($con,"SELECT * FROM subjects ");
			echo "<table class='table table-striped table-condensed table-bordered'><thead><tr ><td>S/No.</td><td>Subject</td><td>".
			'<a href="#addSubject" data-toggle="modal" ><button class="btn btn-default btn-sm">Add Subject <i class="glyphicon glyphicon-plus"></i> </button></a></td></tr></thead>';
			$i=1;
			while($row = mysqli_fetch_assoc($subject)){ 
				echo "<tr><td>".$i."</td><td>".$row['subjectName']."</td><td>".'<div class="btn-group">
						 <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
						 <ul class="dropdown-menu" role="menu">
							<li><a href="#editSubject" data-toggle="modal" data-editid="'.$row["subjectID"].'" data-editname="'.$row["subjectName"].'"><i class="glyphicon glyphicon-pencil"></i> Edit</a></li>
							<li><a href="#deleteSubject" data-toggle="modal" data-del="'.$row["subjectID"].'"><i class="glyphicon glyphicon-trash"></i> Delete</a></li>
						</ul></td></div></tr>';
						$i++;
			}
			echo "</table>";
			 ?>		
			</div>
	  </div>
    </div>
</div>
<!-- / Add Unit modal -->	
	 <div class="modal fade" id="addUnit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">New Unit</h4>
        </div>
        <div class="modal-body">
		<form method="POST" action="add_unit.php">
				<div class="form-group">
					<label for="inputEmail1" class="col-lg-2 control-label">Name</label>
					<div class="col-lg-10">
						<input type="text" name="addname"  placeholder="Enter unit" class="form-control">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Add</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			</div>
		</form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
  
<!-- / Add Unit modal -->	
	 <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">New Category</h4>
        </div>
        <div class="modal-body">
		<form method="POST" action="add_category.php">
				<div class="form-group">
					<label for="inputEmail1" class="col-lg-2 control-label">Name</label>
					<div class="col-lg-10">
						<input type="text" name="addname" placeholder="Enter category" class="form-control">
					</div>
				</div>
			</div>
			<div class="modal-footer">
			  <button type="submit" class="btn btn-success">Add</button>
			  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			</div>
		</form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
<!-- / Add Subject modal -->	
	 <div class="modal fade" id="addSubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">New Subject</h4>
        </div>
        <div class="modal-body">
		<form method="POST" action="add_subject.php">
				<div class="form-group">
					<label for="inputEmail1" class="col-lg-2 control-label">Name</label>
					<div class="col-lg-10">
						<input type="text" name="addname"  placeholder="Enter subject" class="form-control">
					</div>
				</div>
			</div>
			<div class="modal-footer">
			  <button type="submit" class="btn btn-success">Add</button>
			  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			</div>
		</form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <!-- / Edit Unit modal -->	
	 <div class="modal fade" id="editUnit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Edit Unit</h4>
        </div>
        <div class="modal-body">
		<form method="POST" action="edit_unit.php">
				<input type="hidden" name="editId" class="form-control">
				<div class="form-group">
					<label for="inputEmail1" class="col-lg-2 control-label">Name</label>
					<div class="col-lg-10">
						<input type="text" name="editName" class="form-control">
					</div>
				</div>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			  <button type="submit" class="btn btn-danger">Save</button>
			</div>
		</form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <!-- / Edit Category modal -->	
	 <div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Edit Category</h4>
        </div>
        <div class="modal-body">
		<form method="POST" action="edit_category.php">
				<input type="hidden" name="editId" class="form-control">
				<div class="form-group">
					<label for="inputEmail1" class="col-lg-2 control-label">Name</label>
					<div class="col-lg-10">
						<input type="text" name="editName" class="form-control">
					</div>
				</div>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			  <button type="submit" class="btn btn-danger">Save</button>
			</div>
		</form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
  <!-- / Edit Subject modal -->	
	 <div class="modal fade" id="editSubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Edit Subject</h4>
        </div>
        <div class="modal-body">
		<form method="POST" action="edit_subject.php">
				<input type="hidden" name="editId" class="form-control">
				<div class="form-group">
					<label for="inputEmail1" class="col-lg-2 control-label">Name</label>
					<div class="col-lg-10">
						<input type="text" name="editName" class="form-control">
					</div>
				</div>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			  <button type="submit" class="btn btn-danger">Save</button>
			</div>
		</form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <!-- / Delete Unit Confirmation modal -->	
	 <div class="modal fade" id="deleteUnit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Confirmation</h4>
        </div>
        <div class="modal-body">
		<form method="POST" action="delete_unit.php">
				<input type="hidden" name="delId">
				<h3>Are you sure you want to delete Unit?</h3>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
			  <button type="submit" class="btn btn-danger">Yes</button>
			</div>
		</form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
  <!-- / Delete Category Confirmation modal -->	
	 <div class="modal fade" id="deleteCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Confirmation</h4>
        </div>
        <div class="modal-body">
		<form method="POST" action="delete_category.php">
				<input type="hidden" name="delId">
				<h3>Are you sure you want to delete Category?</h3>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
			  <button type="submit" class="btn btn-danger">Yes</button>
			</div>
		</form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
  <!-- / Delete Subject Confirmation modal -->	
	 <div class="modal fade" id="deleteSubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Confirmation</h4>
        </div>
        <div class="modal-body">
		<form method="POST" action="delete_subject.php">
				<input type="hidden" name="delId">
				<h3>Are you sure you want to delete Subject?</h3>
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
    <script src="../dist/js/bootstrap.min.js"></script>
	<script src="../includes/footer.js"></script>

  </body>

<!-- Mirrored from getbootstrap.com/examples/starter-template/ by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 02 Oct 2013 12:14:27 GMT -->
</html>