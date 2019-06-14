<?php
?>
<script>
    $('#selpub').change(function () {
        var pub=$('#selpub').val();
        if(pub==1){
            window.location.href="publications.php";
        }else if (pub==2){
            window.location.href="publications-reports.php";
        }else if (pub==3){
            window.location.href="publications-bulletins.php";
        }else if (pub==4){
            window.location.href="publications-extension-journals.php";
        }else if (pub==5){
            window.location.href="publications-guides.php";
        }else if (pub==6){
            window.location.href="publications-others.php";
        }
    });

    });

</script>
<div class="navbar navbar-inverse navbar-fixed-top hidden-print">
    <div class="container">
        <div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		    <a class="navbar-brand" href="#">
				<img src="../img/naerl.png" height="60px" />Publications</a>
        </div>
        <div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php" ><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="index.php"><span class="glyphicon glyphicon-plus-sign"></span> New Publication</a></li>
						<li><a href="publications.php"> <span class="glyphicon glyphicon-book"></span> Publications</a></li>
						<li><a href="downloads.php"><span class="glyphicon glyphicon-download-alt"></span> Downloads</a></li>
						<li class="divider"></li>
						<li class="dropdown-header">Feedbacks</li>
						<li><a href="requests.php"><span class="glyphicon glyphicon-list-alt"></span> Requests</a></li>
						<li><a href="message.php"><span class="glyphicon glyphicon-envelope"></span> Received Messages</a></li>
						<?php  $type=$_SESSION['type'];
							if($type!='sub'){
								echo'					                   
								<li class="divider"></li>
								<li><a href="donations.php"><span class="glyphicon glyphicon-usd"></span> Support</a></li>
                                <li><a href="manageusers.php"><span class="glyphicon glyphicon-user"></span> Users</a></li>
                                <li><a href="manageadmin.php"><span class="glyphicon glyphicon-user"></span><span class="glyphicon glyphicon-wrench"></span> Admins</a></li>';
							}
                        if($type=='super'){
                            echo '<li><a href="managedb.php"><span class="glyphicon glyphicon-cog"></span> Database</a></li>
								<li class="divider"></li>';
                        }
						?>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<?php 
							if($type=='super'){
								echo '<li><a href="sitesetting.php"><span class="glyphicon glyphicon-cog"></span> Site Setting</a></li>					
								<li class="divider"></li>';
							}
						?>
						<li><a href="myactivity.php" ><span class="glyphicon glyphicon-tasks"></span> My Activities</a></li>
						<li><a href="settings.php" ><span class="glyphicon glyphicon-eye-close"></span> Change Password</a></li>
						<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>            
					</ul>
                </li>
			</ul>		
			<div class="row" style="margin-top:5px;padding-top:16px">
				<div class="col-md-3">
					<form class="form-signin" method="GET" action="search.php">
						<div class="input-group" ><input type="text" name="sterm"class="form-control" placeholder="Enter title to Search" required>
							<span class="input-group-btn">
								<button class="btn btn-default" name="search" type="submit"><span class="glyphicon glyphicon-search"></span></button>
							</span>
						</div>		
					</form>
				</div>
				<script src="timer.js"></script>
				<div> 
					<span class="pull-right disable" style="color:#fff;font-weight:bold;" id="demo"></span>
				</div>
			</div>
		</div>
    </div><!--/.nav-collapse -->
</div>