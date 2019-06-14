<?php
	include'../includes/conn.php';

	$id = $_GET['subjectID'];

	$sql = "select * from sub_subjects where subjectID = '$id';";
	$query = mysqli_query($con,$sql);

	$count = mysqli_num_rows($query);
	if($count == 0)
	{
        echo '<select name="subsubj"  class="form-control" id="subsubj">';


            echo '<option value=0>--No Sub--</option>';

        echo '</select>';
	}
	else 
	{
        echo '<select name="subsubj"  class="form-control" id="subsubj">';

            while($row = mysqli_fetch_array($query)){
		echo '<option value="'.$row["ssID"].'">'.$row["ssName"].'</option>';
		}
        echo '</select>';

	}
