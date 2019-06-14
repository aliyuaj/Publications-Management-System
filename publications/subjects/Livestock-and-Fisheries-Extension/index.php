<?php
$title='Publication: Fisheries';
$location='../../../';
$publocation='../../';
include $location.'includes/header.php';
?>
<?php include $location.'includes/lsidebar.php';?>
<div class="col-md-6">
    <div>
        <?php
        if(isset($_SESSION['request'])) {
            echo $_SESSION['request'];
            unset($_SESSION['request']);
        }
        ?>
        <div style='font-family:"Trebuchet MS", Helvetica, sans-serif;font-size:30px;color:green;'><b> Fisheries </b></div>
        <?php
        $per_page=5;
        $pages_query=mysqli_num_rows(mysqli_query($con,"SELECT * FROM materials left join categories ON materials.category=categories.catID left
          join subjects ON materials.subject=subjects.subjectID WHERE subjectName='fisheries' "));
        $pages=ceil($pages_query/$per_page);
        $page=(isset($_GET['page']))? (int)$_GET['page']:1;
        if($page==0){
            $page=1;
        }
        $start=($page-1)*$per_page;
        $query5=mysqli_query($con,"SELECT * from materials left join categories ON materials.category=categories.catID left join subjects ON materials.subject=subjects.subjectID WHERE subjectName='fisheries' LIMIT $start,$per_page");
        $count=mysqli_num_rows($query5);
        if($pages_query>0){
            while($mats=mysqli_fetch_assoc($query5)){

                $id=$mats['matID'];
                $query2=mysqli_query($con,"SELECT * FROM pub_media WHERE pub_id='$id'");
                $image=mysqli_fetch_array($query2);
                $img=$image['source'];
                $id=$mats['matID'];
                $name=$mats['title'];
                $pubnum=$mats['pubNum'];
                $synopsis=$mats['synopsis'];
                $author=$mats['author'];
                $cat=$mats['catName'];
                $year=$mats['pubYear'];
                echo '<div class="jumbotron row" align="left">';
                echo '<div class="col-md-3">
			  <a href="#" data-toggle="tooltip" title="'.$name.'"class="thumbnail">';
                echo '<img alt="File Image" style="height:150px;width:100px" class="img-responsive img-thumbnail" src="../../../uploads/images/'.$img.'">
			  </a>
			</div>';
                echo "<div class='title'> $name</div>";
                echo" <div style='font-family:\"Times New Roman\", Times, serif;'><p class='author'>Author(s): $author";
                if($year!='0000'){
                    echo " | Published: $year";
                }
                echo"</p><p style='font-style:italic'>Type: $cat";
                if($pubnum!='0' && $pubnum!=''){
                    echo "<span style='padding-left:20px'> Pub. No.: $pubnum</span></p>";
                }
                if($synopsis!=''){
                    echo "<p>$synopsis ...</span>";
                }
                echo"</p>
                <form action='index.php' method='post'>
 <input type='text' value=".$id." name='mid' style='display:none'/>";
                $query3=mysqli_query($con,"SELECT * FROM pub_media WHERE pub_id='$id' && type='file'");
                $file=mysqli_fetch_array($query3);
                if(mysqli_num_rows($query3)==1){
                    $file_name=$file['source'];
                    echo'<span class="pull-right">
     <input type="text" value="'.$file_name.'" name="file" style="display:none"/>
        <input type="submit" class="btn btn-primary btn-sm" name="download" value="download"></span>';
                } else{
                    echo'<span class="pull-right"><input type="submit" class="btn btn-primary btn-sm " name="request" value="request"></span>';
                }
                echo '</form></div></div>';
            }
            if($pages>1 && $page<=$pages){
                echo '<ul class="pagination">';
                if($page>1){
                    echo'<li><a href="?page=1"> <span class="glyphicon glyphicon-backward"></a></li>';
                }
                if($page>1){
                    $prev_page=$page-1;
                    echo'<li><a href="?page='.$prev_page.'"> <span class="glyphicon glyphicon-step-backward"></a></li>';
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
                    echo'<li><a href="?page='.$next_page.'"> <span class="glyphicon glyphicon-step-forward"></a></li>';
                }if($page<$pages){
                    $next_page=$page+1;
                    echo'<li><a href="?page='.$pages.'"> <span class="glyphicon glyphicon-forward"></a></li>';
                }
                echo '</ul>';
            }elseif($page>$pages) {
                echo "<h2 style='color:red;font-family:\"Times New Roman\", Times, serif;'>Page not found</h2>";
                exit();
            }
        }else{
            echo "<div style='padding:20px;color:red;font-size:30px;'>Publications under this category is currently unavailable.</div>";}?>
    </div>
    <?php
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
</div>
<?php include $location.'includes/rsidebar.php';?>
<!-- /.col-lg-6 -->
</div>
</div>
</div>
<div id="push"></div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../../../assets/js/jquery.js"></script>
<script src="../../../dist/js/bootstrap.min.js"></script>
<script src="../../../includes/footer.js"></script>
</body>
<!-- Mirrored from getbootstrap.com/examples/starter-template/ by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 02 Oct 2013 12:14:27 GMT -->
</html>
