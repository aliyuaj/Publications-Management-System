<?php
	include'../includes/conn.php';

	$id = $_GET['subjectID'];


    $sql3 = "SELECT * FROM sub_sub_subjects WHERE sub_sub_subjects.ssID='$id'";
    $qresult3 = mysqli_query($con,$sql3);
	$count = mysqli_num_rows($qresult3);
	if($count == 0)
	{
        echo '<select name="subsubsubj"  class="form-control" id="subsubsubj">';


        echo '<option value=0>--No Sub--</option>';

        echo '</select>';
	}
	else 
	{
        echo '<select name="subsubsubj"  class="form-control" id="subsubsubj">';

            while($row = mysqli_fetch_array($qresult3)){
		echo '<option value="'.$row["sssID"].'">'.$row["sssName"].'</option>';
		}
        echo '</select>';

	}
