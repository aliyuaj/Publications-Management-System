<?php
$title='Publications: Create Account';
$location='';
include 'includes/header.php';
?>
<script>
    $(document).ready(function(){
        $('#purpose').change(function(){
            var subject = document.getElementById('purpose').value
            if(subject=='Others'){
                $('#opurpose').show()
            }else{
                $('#opurpose').hide()
            }

        });
        $('#occupation').change(function(){
            var subject = document.getElementById('occupation').value
            if(subject=='Others'){
                $('#ooccupation').show()
            }else{
                $('#oocupation').hide()
            }

        });
        $('#nationality').change(function(){
            if($('#nationality').val() != '125'){
                $("#state_row").hide();
                $("#lga_row").hide();
            }
            else{
                $("#state_row").show();
                $("#lga_row").show();
                $(function(){
                    $("#state").change(function(){
                        $.get("includes/local_govt.php", {state_id:$("#state").val()}, function(data){$("#lga").html(data);});
                        return false;
                    });
                });
            }
        });

    })
</script>
    <form class="form-horizontal midform" role="form" method="post" action="register.php">
        <?php
        // Checking for create failure
        if(isset($_SESSION['create'])) {
            echo "<ul>";
            echo "<li class='alert-info' style='font-size: 18px;list-style-type:none;'>".$_SESSION['create']."</li>";
            echo "</ul>";
            unset($_SESSION['create']);
        }?>
        <p class=""style="font-size:30px;color:brown;font-family:'Cambria', serif;margin-bottom: 10px">
            Create Account</p>
        <div class="form-group">
            <label for="inputEmail1" class="col-lg-3 control-label">Title</label>
            <div class="col-lg-9">
                <select class="form-control" name="title">
                    <option value="Mr.">Mr.</option>
                    <option value="Mrs.">Mrs</option>
                    <option value="Miss">Miss</option>
                    <option value="Dr.">Dr.</option>
                    <option value="Prof.">Prof.</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail1" class="col-lg-3 control-label">Name</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" id="inputEmail1" name="name" placeholder="Enter your full name" value="<?php if(isset($_POST['name'])){ echo $_POST['name']; } ?>"required/>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail1" class="col-lg-3 control-label">Email </label>
            <div class="col-lg-9">
                <input type="email" class="form-control" id="inputEmail1" name="email" placeholder="" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>"required/>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail1" class="col-lg-3 control-label">Phone no. </label>
            <div class="col-lg-9">
                <input type="text" class="form-control" id="inputEmail1" name="phone" placeholder="" value="<?php if(isset($_POST['phone'])){ echo $_POST['phone']; } ?>"required/>
            </div>
        </div>
        <div class="form-group" id="spryselect1">
            <label for="inputEmail1" class="col-lg-3 control-label">Nationality </label>
            <div class="col-lg-9">
                <select id="nationality" name="nationality" class="form-control">
                    <?php
                    if($country!=""){
                        echo '<option value="'.$row['countryid'].'" selected="selected">'.$country.'</option>';
                    }else echo '<option value="">--Select Country--</option>';
                    $sql = "SELECT * FROM tblcountries";
                    $result = mysqli_query($con,$sql);
                    echo '<option value="125">NIGERIA</option>';
                    while($row = mysqli_fetch_array($result)) {
                        $countryname = $row['countryname'];
                        $countryid = $row['countryid'];
                        echo "<option value = $countryid>$countryname</option>";
                    }
                    ?></select>
            </div>
        </div>
        <div class="form-group" id="state_row">
            <label for="inputEmail1" class="col-lg-3 control-label">State </label>
            <div class="col-lg-9">
                <select id="state" name="state" class="form-control">';
                    <?php if($state!=""){
                        echo '<option selected="selected" value="'.$stateid.'">'.$state.'</option>';
                    }else echo '<option value="">--Select State--</option>';
                    $result = mysqli_query($con,"SELECT * FROM tblstate");
                    while($row = mysqli_fetch_array($result)) {
                        $statename = $row['statename'];
                        $stateid = $row['stateid'];
                        echo "<option value = $stateid>$statename</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group" id="lga_row">
            <label for="inputEmail1" class="col-lg-3 control-label">Local Govt </label>
            <div class="col-lg-9">
                <select id="lga" name="lga" class="form-control">';

                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail1" class="col-lg-3 control-label">Password </label>
            <div class="col-lg-9">
                <input type="password" class="form-control" id="inputEmail1" name="password" placeholder="" required/>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail1" class="col-lg-3 control-label">Re-type Password </label>
            <div class="col-lg-9">
                <input type="password" class="form-control" id="inputEmail1" name="rpassword" placeholder="" required/>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail1" class="col-lg-3 control-label">Occupation </label>
            <div class="col-lg-9">
                <select class="form-control" id="occupation" name="occupation">
                    <option value="Farmer">Farmer</option>
                    <option value="Extension Worker">Extension Worker</option>
                    <option value="Teacher/ Lecturer">Teacher/ Lecturer</option>
                    <option value="Researcher">Researcher</option>
                    <option value="Student">Student</option>
                    <option value="Policy Maker">Policy Maker</option>
                    <option value="Media Professional">Media Professional</option>
                    <option value="Others">Others</option>
                </select>

            </div>
        </div>
        <div class="form-group" id="ooccupation" style="display:none">
            <label for="inputEmail1" class="col-lg-3 control-label">Specify Occupation </label>
            <div class="col-lg-9">
                <input type="text" class="form-control" id="inputEmail1" name="otheroccupation" placeholder="" value="<?php if(isset($_POST['otheroccupation'])){ echo $_POST['otheroccupation']; } ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail1" class="col-lg-3 control-label">Organization </label>
            <div class="col-lg-9">
                <input type="text" class="form-control" id="inputEmail1" name="organization" placeholder=""
                       value="<?php if(isset($_POST['organizaation'])){ echo $_POST['organization']; } ?>"required/>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail1" class="col-lg-3 control-label">Purpose </label>
            <div class="col-lg-9">
                <select class="form-control" id="purpose" name="purpose">
                    <option value="Research">Research</option>
                    <option value="Academics">Academics</option>
                    <option value="Practice">Practice</option>
                    <option value="Commercial">Commercial</option>
                    <option value="Others">Others</option>
                </select>
            </div>
        </div>
        <div class="form-group" id="opurpose" style="display:none">
            <label for="inputEmail1" class="col-lg-3 control-label">Specify Purpose </label>
            <div class="col-lg-9">
                <input type="text" class="form-control" id="inputEmail1" name="otherpurpose" placeholder="">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="create" class="btn btn-success">Register</button>
        </div>
    </form>
</div> <!-- /container -->
</div></div>
<!-- Bootstrap core JavaScript
    ================================================== -->
<script src="assets/js/jquery.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script src="includes/footer.js"></script>
<!-- Placed at the end of the document so the pages load faster -->
</body>
<!-- Mirrored from getbootstrap.com/examples/signin/ by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 02 Oct 2013 12:14:41 GMT -->
</html>
<?php
if(isset($_POST['create'])){
    $title=trim($_POST['title']);
    $fname=trim($_POST['name']);
    $email=trim($_POST['email']);
    $phone=trim($_POST['phone']);
    $snationalty = $_POST['nationality'];
    $sstate = $_POST['state'];
    $slga = $_POST['lga'];
    $password=trim($_POST['password']);
    $rpassword=trim($_POST['rpassword']);
    $organization=trim($_POST['organization']);
    $occupation=trim($_POST['occupation']);
    $ooccupation=trim($_POST['otheroccupation']);
    if($occupation=='Others'){
        $occupation=$ooccupation;
    }
    $purpose=trim($_POST['purpose']);
    $opurpose=trim($_POST['otherpurpose']);
    if($purpose=='Others'){
        $purpose=$opurpose;
    }
    if($password==$rpassword){
        if(strlen($password)>=5){
            $charset="abcdefghijklmnopqrstuvwxyz0123456789";
            $genID=substr(str_shuffle($charset),0,10);
            $query0 = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
            if(mysqli_num_rows($query0)==0) {
            $query1=mysqli_query($con,"INSERT INTO users (id,title,fullName,email,phone,password,organization,occupation,nationality,state,lga,purpose,usertype,type,lastSeen)
				VALUES
				('$genID','$title','$fname','$email','$phone','$password','$organization','$occupation','$snationalty','$sstate','$slga','$purpose','general','',NOW())");
            if(mysqli_affected_rows($con)>0) {
                $_SESSION['create']="Account successfully created.";
                header('location:register.php');
            }
            else{
                mysqli_error($con);
                $_SESSION['create']=" Unable to create user.";

                header('location:register.php');
            }
            }else {
                $_SESSION['create'] = "Email already registered. use another email or login into yor account.";
                header('location:manageadmin.php');
            }
        }else {
            $_SESSION['create']="Password should be at least 5 characters";
            header('location:register.php');
        }
    }else{
        $_SESSION['create']=" Password and is re-type do not match";
        header('location:register.php');
    }

}
?>

