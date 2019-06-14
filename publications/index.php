<?php
$title='Publication Details';
$location='../';
$publocation='';
include $location.'includes/header.php';
?>
<?php include $location.'includes/lsidebar.php';?>
<div class="col-md-6">
    <?php
    if(isset($_SESSION['request'])) {
        echo $_SESSION['request'];
        unset($_SESSION['request']);
    }
    if(isset($_GET['id'])){
        $s=$_GET['id'];
    }
    else {
        header('location:'.$location.'404.php');
    }
    $query=mysqli_query($con,"Select * from materials  left join categories ON materials.category=categories.catID WHERE matID='$s'");
    while($mats=mysqli_fetch_assoc($query)){
        $query2=mysqli_query($con,"SELECT * FROM pub_media WHERE pub_id='$s'");
        $image=mysqli_fetch_array($query2);
        $img=$image['source'];
        $id=$mats['matID'];
        $name=$mats['title'];
        $author=$mats['author'];
        $cat=$mats['catName'];
        $pubnum=$mats['pubNum'];
        $lang=$mats['language'];
        $synopsis=$mats['synopsis'];
        $year=$mats['pubYear'];	echo '<div class="jumbotron row" align="left">';
	echo '<div class="col-md-3">
          <a href="#" data-toggle="tooltip" title="'.$name.'"class="thumbnail">';
            echo '<img alt="File Image" style="height:150px;width:100px" class="img-responsive img-thumbnail" src="../uploads/images/'.$img.'">
          </a>
        </div>';

        echo" <form action='index.php' method='post'>
 <input type='text' value=".$s." name='mid' style='display:none'/>";
		 echo "<div class='title'> $name</div>";
   echo" <div style='font-family:\"Times New Roman\", Times, serif;'><p class='author'>Author(s): $author";
   if($year!='0000'){
    echo " | Published: $year";
   }
   echo"</p><p style='font-style:italic'>Type: $cat";
   if($pubnum!='0' && $pubnum!=''){
    echo "<span style='padding-left:20px'> Pub. No.: $pubnum</span></p>";
   }  
   	echo"<p class='lang'>Language: $lang</p>";
   if($synopsis!=''){
    echo "<p>$synopsis ...</span>";
   }  
   echo"</p></div>";
        $query3=mysqli_query($con,"SELECT * FROM pub_media WHERE pub_id='$s' && type='file'");
        $file=mysqli_fetch_array($query3);
        if(mysqli_num_rows($query3)==1){
            $file_name=$file['source'];
            echo'<span class="pull-right">
     <input type="text" value="'.$file_name.'" name="file" style="display:none"/>
        <input type="submit" class="btn btn-primary btn-sm" name="download" value="download"></span>';
        } else{
            echo'<span class="pull-right"><input type="submit" class="btn btn-primary btn-sm " name="request" value="request"></span>';
        }
        echo '</form></div>';
    }
    if (isset($_POST['request'])){
        $user = $_SESSION['id'];
        $s = $_POST['mid'];
        if(isset($user)) {
            $reqDate = date('Y-m-d');
            $query = mysqli_query($con, "INSERT INTO requests (userID,matID, granted,date) VALUES  ('$user','$s','no','$reqDate')");

            $redirect = $_SERVER['PHP_SELF'];
            if (mysqli_affected_rows($con) > 0) {
                $_SESSION['request'] = "<div class='alert alert-success'>Your request has been received and would be processed as soon as possible. Thank You.</div>";
                header('location:index.php?id=' . $s);
            } else {
                $_SESSION['request'] = "<div class='alert alert-danger'>Unable to add request.Please try again </div>";
                header('location:index.php?id=' . $s);
            }
        }else{
            $_SESSION['request'] = "<div class='alert alert-danger'>You need to <a href='".$location."user_login.php'>login</a>
        if you already have an account or <a href='".$location."register.php'>register</a> to make request</div>";
            header('location:index.php?id='.$s);
        }
    }if (isset($_POST['download'])){
        $user = $_SESSION['id'];
        $s = $_POST['mid'];
        $f = $_POST['file'];
        if(isset($user)) {
            header('location:'.$publocation.'download.php?id='.$s.'&&file_name='. $f);
        }else{
            $_SESSION['request'] = "
        <div class='alert alert-danger'>You need to <a href='".$location."user_login.php'>login</a>
        if you already have an account or <a href='".$location."register.php'>register</a> to download publication</div>";
            header('location:index.php?id=' . $s);
        }
    }
    ?>

</div><!-- /.container -->
<?php include $location.'includes/rsidebar.php';?>
</div>
</div>
</div>

<div id="push"></div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../assets/js/jquery.js"></script>
<script src="../dist/js/bootstrap.min.js"></script>
<script src="../includes/footer.js"></script>
</body>
<!-- Mirrored from getbootstrap.com/examples/starter-template/ by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 02 Oct 2013 12:14:27 GMT -->
</html>
