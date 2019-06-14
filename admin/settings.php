<?php require 'session.php';ob_start();
include '../includes/conn.php';?>
    <!DOCTYPE html>
    <html lang="en">
    <!-- Mirrored from getbootstrap.com/examples/starter-template/ by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 02 Oct 2013 12:14:27 GMT -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../img/naerls_logo.png">
        <title>Publications: Admin Settings</title>
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
    </head>
    <style>
        .middle {
            max-width: 400px;
            margin: 0 auto;
            padding-top:20px;
        }
        .fs .form-control {
            position: relative;
            font-family: Times New Roman;
            height: auto;
            padding: 10px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
    </style>
    <body>
    <?php include 'header.php';?>
    <div class="container" id="cc">
        <div class="middle" >
            <?php
            $id=$_SESSION['id'];
            $query=mysqli_query($con,"SELECT * FROM users WHERE id='$id'");
            mysqli_num_rows($query);
            $adm=mysqli_fetch_assoc($query);
            ?>
            <form  role="form" class="fs" method="POST" action="settings.php">
                <fieldset>
                    <legend style="text-align:center;font-size:25px;">Change Password</legend>
                    <div class="form-group"><input type="text" class="form-control"  name="uname" value="<?php echo $adm['fullName'];?>" readonly/></div>
                    <div class="form-group"><input type="text" class="form-control"  name="opass"placeholder="Old Password" ></div>
                    <div class="form-group"><input type="text" class="form-control"  name="npass"placeholder="New Password" ></div>
                    <div class="form-group"> <input type="password" class="form-control" name="rnpass" placeholder="Re-type New Password"> </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="change">Change</button>
                </fieldset>
            </form>
            <div  style="font-size:20px;color:green;font-weight:bold;padding:20px"><?php if(isset($_SESSION['change'])){print $_SESSION['change']; unset($_SESSION['change']);}?></div>
        </div>
    </div>
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
include '../includes/conn.php';
$id=$_SESSION['id'];
if(isset($_POST['change'])){
    $opass=trim($_POST['opass']);
    if(isset($_POST['opass'])){
        if(strlen($opass)!=0){
            $query7=mysqli_query($con,"SELECT * FROM admin WHERE id='$id' && password='$opass'");
            if(mysqli_num_rows($query7)==1){
                $npass=trim($_POST['npass']);
                $rnpass=trim($_POST['rnpass']);
                $id=$_SESSION['id'];
                if(strlen($npass)!=0 && strlen($rnpass)!=0){

                    if($npass==$rnpass){
                        if(strlen($npass)>=5){
                            $query1=mysqli_query($con,"UPDATE admin SET password='$npass' WHERE id='$id'");
                            if(mysqli_affected_rows($con)==1){
                                $_SESSION['change']="Password changed successfully";
                                header('location:settings.php');
                            }else {
                                $_SESSION['change']="Unable to update Password".mysqli_error($con);
                                header('location:settings.php');
                            }
                        }else {
                            $_SESSION['change']="Password should  be at least 5 characters";
                            header('location:settings.php');
                        }
                    }else {
                        $_SESSION['change']="New passsword and its re-type do not match";
                        header('location:settings.php');
                    }

                }else {
                    $_SESSION['change']="Enter New Password and Re-type";
                    header('location:settings.php');
                }
            }else {
                $_SESSION['change']="User ID does not match password";
                header('location:settings.php');
            }
        }else {
            $_SESSION['change']="Enter Old Password";
            header('location:settings.php');
        }
    }

}
?>