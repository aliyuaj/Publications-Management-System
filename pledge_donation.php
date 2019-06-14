<?php

$title='Publications: Pledge Donation';
$location='';
include 'includes/header.php';
?>
<script>
    $(document).ready(function(){
        $('#subject').change(function(){
            var subject = document.getElementById('subject').value
            if(subject=='Others'){
                $('#osubject').show()
            }else{
                $('#osubject').hide()
            }

        });
    })
</script>
<div class="row">
    <div class="container" >
        <form class="form-horizontal midform" role="form" method="post" action="pledge.php">
            <?php

            if(isset($_SESSION['pledge'])) {
                echo "<ul>";
                echo "<li class='alert-info' style='font-size: 18px;list-style-type:none;'>".$_SESSION['pledge']."</li>";
                echo "</ul>";
                unset($_SESSION['pledge']);
            }?>      <p class=""style="font-size:30px;color:brown;font-family:'Cambria', serif;margin-bottom: 10px">
                Pledge Donation
            </p>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-4 control-label">Title</label>
                <div class="col-lg-8">
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
                <label for="inputEmail1" class="col-lg-4 control-label">Name</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="inputEmail1" name="name" placeholder="" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-4 control-label">Organization</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="inputEmail1" name="organization" placeholder="" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-4 control-label">Designation/ Position </label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="inputEmail1" name="designation" placeholder="" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-4 control-label">Email </label>
                <div class="col-lg-8">
                    <input type="email" class="form-control" id="inputEmail1" name="email" placeholder="" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-4 control-label">Phone Number </label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="inputEmail1" name="phone" placeholder="" maxlength="11" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-4 control-label">Publication Type </label>
                <div class="col-lg-8">
                    <select class="form-control" name="type">
                        <option value="Bulletin">Bulletin</option>
                        <option value="Journal">Journal</option>
                        <option value="Guide">Guide</option>
                        <option value="Report">Report</option>
                        <option value="Flip chart">Flip Chart</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail1" class="col-lg-4 control-label">Subject </label>
                <div class="col-lg-8">
                    <select class="form-control" name="subject" id="subject">
                        <option value="Crops">Crops</option>
                        <option value="Livestock">Livestock</option>
                        <option value="Fisheries">Fisheries</option>
                        <option value="Poultry">Poultry</option>
                        <option value="Snail">Snail</option>
                        <option value="Bee">Bee</option>
                        <option value="Record Keeping">Record Keeping</option>
                        <option value="Risk Assessment">Risk Assessment</option>
                        <option value="Group Dynamics">Group Dynamics</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
            </div>
            <div class="form-group" id="osubject" style="display:none">
                <label for="inputEmail1" class="col-lg-4 control-label">Specify Subject </label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="inputEmail1" name="othersubj" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-4 control-label">Specific Area</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="inputEmail1" name="area" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-4 control-label">Proposed Quantity </label>
                <div class="col-lg-8">
                    <input type="number" class="form-control" id="inputEmail1" name="quantity" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-4 control-label">Target Beneficiaries </label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="inputEmail1" name="beneficiaries" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="inputSubj" class="col-lg-4 control-label">Donation Expected on or before</label>
                <div class="col-lg-8">
                    <input type='text' class="form-control" name="timeline" id="datetimepicker2" />
                </div>
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" required="">
                        <div align="justify" >Declaration<br>
                            I hereby declare that the information provided above is correct and am ready to make this commitment.
                        </div>
                    </label>
                </div>
            </div>
            <input type="submit" name="create" class="btn btn-success pull-right" value="Confirm">

        </form>
    </div>
</div>
<script src="assets/jquery.datetimepicker.full.js"></script>
<script type="text/javascript">
    $('#datetimepicker2').datetimepicker({
        lang:'en',
        timepicker:false,
        format:'Y/m/d',
        formatDate:'Y/m/d',
        minDate:'-1970/01/01', // yesterday is minimum date
        maxDate:'+1970/06/02' // and tommorow is maximum date calendar
    });
</script>
<!-- Site footer -->
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