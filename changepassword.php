<?php
/**
 * Created by PhpStorm.
 * User: HP USER
 * Date: 1/7/2017
 * Time: 9:40 PM
 */
    $title='Publications: Change Password';
    $location='';
    $publocation='publications/';
include 'includes/header.php';
include 'includes/lsidebar.php';
?>
<div class="col-md-6">
    <form  role="form" class="form-signin" method="POST" action="changepassword.php">
        <fieldset>
            <legend style="text-align:center;font-size:25px;">Change Password</legend>
            <div class="form-group"><input type="text" class="form-control"  name="opass"placeholder="Old Password" ></div>
            <div class="form-group"><input type="text" class="form-control"  name="npass"placeholder="New Password" ></div>
            <div class="form-group"> <input type="password" class="form-control" name="rnpass" placeholder="Re-type New Password"> </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="change">Change</button>
        </fieldset>
        <div  class="alert-info" style="font-size:20px;font-weight:bold;"><?php if(isset($_SESSION['change'])){print $_SESSION['change']; unset($_SESSION['change']);}?></div>
    </form>
</div>
<?php include 'includes/rsidebar.php';?>
</div></div></div><!-- /.container -->

<div id="push"></div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="dist/js/bootstrap.min.js"></script>
<script src="includes/footer.js"></script>
</body>
</html>
<?php
$id=$_SESSION['id'];
if(isset($_POST['change'])){
    $opass=trim($_POST['opass']);
    if(isset($_POST['opass'])){
        if(strlen($opass)!=0){
            $query7=mysqli_query($con,"SELECT * FROM users WHERE id='$id' && password='$opass'");
            if(mysqli_num_rows($query7)==1){
                $npass=trim($_POST['npass']);
                $rnpass=trim($_POST['rnpass']);
                $id=$_SESSION['id'];
                if(strlen($npass)!=0 && strlen($rnpass)!=0){

                    if($npass==$rnpass){
                        if(strlen($npass)>=5){
                            $query1=mysqli_query($con,"UPDATE users SET password='$npass' WHERE id='$id'");
                            if(mysqli_affected_rows($con)==1){
                                $_SESSION['change']="Password changed successfully";
                                header('location:changepassword.php');
                            }else {
                                $_SESSION['change']="Unable to update Password".mysqli_error($con);
                                header('location:changepassword.php');
                            }
                        }else {
                            $_SESSION['change']="Password should  be at least 5 characters";
                            header('location:changepassword.php');
                        }
                    }else {
                        $_SESSION['change']="New passsword and its re-type do not match";
                        header('location:changepassword.php');
                    }

                }else {
                    $_SESSION['change']="Enter New Password and Re-type";
                    header('location:changepassword.php');
                }
            }else {
                $_SESSION['change']="User ID does not match password";
                header('location:changepassword.php');
            }
        }else {
            $_SESSION['change']="Enter Old Password";
            header('location:changepassword.php');
        }
    }

}
?>