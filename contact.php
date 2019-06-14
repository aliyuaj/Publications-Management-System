<?php
$title='Publications: Contact Us';
$location='';
include 'includes/header.php';
?><div class="col-md-2"></div>
<div class="col-md-8" style="padding:40px 0px 40px 0px;" >
    <p class="lead" style="font-family:cursive;" >
        We'd love to hear from you. Fill out the form below if you have any question or any information you'd want to know from the publication unit
    </p>
    <br/>
    <form method="POST" action="contact.php">
        <div class="row">
            <div class="col-sm-4">
                <input class="form-control" type="text" name="name" placeholder="Name" required autofocus>
            </div>
            <div class="col-sm-4">
                <input class="form-control" type="email" name="email" placeholder="Email" required>
            </div>
            <div class="col-sm-4">
                <input class="form-control" type="text" name="subject" placeholder="Subject" required>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-sm-12">
                <textarea placeholder="Type your message here..." class="form-control" rows="9" name="message"required></textarea>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-sm-12 text-right">
                <input class="btn btn-primary" name="send" type="submit" value="Send message">
            </div>
        </div>
        <br/>
    </form>

    <?php
    include 'includes/conn.php';
    function spamcheck($field){
        //filter_var() sanitizes the e-mail address using FILTER_SANITIZE_EMAIL
        $field=filter_var($field, FILTER_SANITIZE_EMAIL);

        //filter_var() validates the e-mail address using FILTER_VALIDATE_EMAIL
        if(filter_var($field, FILTER_VALIDATE_EMAIL)){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    if (isset($_POST['send'])){
        if (isset($_POST['email'])){
//if "email" is filled out, proceed check if the email address is invalid
            $mailcheck = spamcheck($_POST['email']);
            if ($mailcheck==FALSE){
                echo "<div class='err-msg'>Invalid email address</div>";
            }else
            {//send email
                include 'includes/conn.php';
                //if "email" is filled out, proceed check if the email address is invalid
                if(!empty($_POST['email'])) {
                    $email = trim($_POST['email']) ;
                    $name = trim($_POST['name']) ;
                    $subject =trim($_POST['subject']) ;
                    $mess = trim($_POST['message']) ;
                    {//send email
                        if(strlen($name)>0 && strlen($email)>0 && strlen($subject)>0 && strlen($mess)>0){
                            $query=mysqli_query($con,"INSERT INTO messages(msgID,sender,subject,email,msg,time) VALUES('','$name','$subject','$email','$mess',NOW())");
                            if($query){echo '<span style="color:green;font-weight:bold;">Your message has been sent. Thank you</span>';}else echo mysql_error();
                        }else echo '<span style="color:red;font-weight:bold;">All fields are required</span>';
                    }
                }else echo '<span style="color:red;font-weight:bold;">Enter your Email </span>';
            }
        }
    }	?>
</div><div class="col-md-2"></div>
</div><!-- /.container -->
</div>
</div>


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