<?php
/**
 * Created by PhpStorm.
 * User: HP USER
 * Date: 1/30/2017
 * Time: 8:57 PM
 */ require 'session.php';

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
    <title>Publications: Admin Edit user</title>
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
<body>
<?php include 'header.php'; ?>
<div class="container" id="cc">
    <div class="starter-template">
        <div class="err-msg" align="center" style="font-size:20px">
            <?php  if(isset($_SESSION['done'])) {
                echo $_SESSION['done']; unset($_SESSION['done']);
            }
            ?>
        </div>
        <div class="row">
            <form method="post" action="edit_user.php" enctype="multipart/form-data">
                <?php $s = $_GET["id"];
                echo	"<div style='font-family:Palatino Linotype;font-size:30px;color:green;' class='lead'>Edit User Detail</div>";
                $result = mysqli_query($con,"SELECT * FROM users WHERE id='$s'");
                while($row = mysqli_fetch_assoc($result))
                {
                    $imagequery = mysqli_query($con,"SELECT * FROM users WHERE id='$s'");
                    $image = mysqli_fetch_assoc($imagequery);
                    echo '<table class="table table-bordered stay-center" style="min-width:60%" >';
                    echo'<tr><td><span class="tl">User ID:</span></td>';
                    echo'<td colspan=""><input type="text" name="id" class="form-control" value="'. $row['id'] .'" READONLY></td></tr>';
                    echo'<tr><td><span class="tl">Title:</span></td>';
                    echo'<td colspan=""><input type="text" name="title" class="form-control" maxlength="200"  value="'.$row['title'].'"></td></tr>';
                    echo'<tr><td><span class="tl">Name:</span></td>';
                    echo'<td colspan=""><input type="text" name="name" class="col-md-4 form-control" value="'. $row['fullName'] .'"></td></tr>';
                    echo'<tr><td><span class="tl">Email:</span></td>';
                    echo'<td colspan="2"><textarea name="email" class="form-control" maxlength="200">'.$row['email'].'</textarea></td></tr>';
                    echo'<tr><td><span class="tl">Phone:</span></td>';
                    echo'<td colspan="2"><input type="text" name="phone" class="form-control" value="'. $row['phone'] .'"></td></tr>';
                    echo'<tr><td><span class="tl">Occupation:</span></td>';
                    echo'<td colspan="2"><input type="text" name="occupation" class="form-control" value="'. $row['occupation'] .'" ></td></tr>';
                    echo'<tr><td><span class="tl">Organization:</span></td>';
                    echo'<td colspan="2"><input type="text" name="organization" class="form-control" value="'. $row['organization'] .'"></td></tr>';
                    echo '<tr>';
                    echo'<td colspan="3" class="text-right"><input type="submit" name="save" value="Save Changes" class="btn btn-primary"></td></tr>';



                }
                echo'</table>';
                ?>

            </form>
        </div>
    </div>
</div>
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