<?php
$title='Publications: Login';
$location='';
include 'includes/header.php';
?>		<form class="form-signin" method="POST" action="login.php">
    <fieldset>
        <legend style="text-align:center;font-size:25px;">Please sign in</legend>
        <div><?php
            // Checking for login failure
            if(isset($_SESSION['login'])) {
                echo "<span style='color: red; font-size: 18px;list-style-type:none;'>".$_SESSION['login']."</span>";
                unset($_SESSION['login']);
            }if(isset($_SESSION['recover'])) {
                echo "<span style='color: red; font-size: 18px;list-style-type:none;'>".$_SESSION['recover']."</span>";
                unset($_SESSION['recover']);
            }?>
        </div>
        <div class="form-group">
            <input type="text" class="form-control"  name="username" placeholder="Email">
        </div>
        <div class="form-group"> <input type="password" class="form-control"name="password" placeholder="**************"> </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </fieldset>
    <div style="margin: 5px;font-weight: 500">
        <a href="#forgot_password" data-toggle="modal"> Forgot password ?</a> |
        <a href="register.php"> Register</a>
    </div>
</form>

</div> <!-- /container -->
</div>
</div>
<!-- /.forgot_password modal -->
<div class="modal fade" id="forgot_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Password Recovery</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="recover_password.php">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Enter your registration Email" >
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Request</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Bootstrap core JavaScript
    ================================================== -->
<script src="assets/js/jquery.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script src="includes/footer.js"></script>
<!-- Placed at the end of the document so the pages load faster -->
</body>
<!-- Mirrored from getbootstrap.com/examples/signin/ by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 02 Oct 2013 12:14:41 GMT -->
</html>
