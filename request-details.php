<?php
$title='Publications: Request Details';
$location='';
include 'includes/header.php';
?>
<h3>Publication Details</h3>
<?php
if(isset($_SESSION['reserve'])){
    echo '<div class="alert alert-info" style="font-size:30px;">'.$_SESSION['reserve']; unset($_SESSION['reserve']);echo'</div>';
}
if(isset($_POST['reserve'])){
    if(!isset($_POST['extras'])){
        $_POST['extras']=array();
    }
    $extras=$_POST['extras'];
    $_SESSION['ch']=$extras;
    if(count($extras)==0){
        $_SESSION['reserve']="Click <a style='color:green;cursor:pointer' onClick='history.back()'>back</a> and select one or more books to request";
        header('location:request-details.php');

    }
    elseif(count($extras)>0 && count($extras)<=7){
        echo "<div class='table-responsive'><table class='table table-striped table-condensed table-bordered' style='width: 100%'>
			<tr>
					<td><b>S/No.</b></td><td><b>Title</b></td><td><b>Author</b></td><td><b>Category</b></td>

					</tr> ";
        $i=1;
        foreach($extras as $id){
            $query=mysqli_query($con,"SELECT * FROM materials join categories ON materials.category=categories.catID WHERE matID='$id'");
            while($row=mysqli_fetch_assoc($query)){
                echo "<tr><td>".$i."</td><td>".$row['title']."</td><td>".$row['author']."</td><td>".$row['catName']."</td></tr>";
                $i++;}


        }
        echo "</table></div>"	;
        if(isset($_SESSION['id'])) {
            echo "<div><form class='form-horizontal' role='form' method='POST' action='request.php'><div class='form-group pull-right' >
                        <div class='col-lg-offset-2 col-lg-10'>
                          <button type='submit' class='btn btn-primary' name='req'>Complete Request</button>
                          <button type='button' class='btn btn-danger' onClick='history.back()'>Go Back</button>
                        </div>
                      </div>
                      </form></div>";
        }else{
            echo "<div class='alert alert-danger'>You need to <a href='".$location."user_login.php'>login</a> to complete your request</div>";
        }
    }else	{

        $_SESSION['reserve']= "Sorry You cant reserve more than seven books <a style='color:green;cursor:pointer' onClick='history.back()'>back</a> ";
        header('location:request-details.php');
    }

}

?>
</div></div></div><!-- /.container -->
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