<?php
/**
 * Created by PhpStorm.
 * User: HP USER
 * Date: 1/3/2017
 * Time: 5:23 PM
 */
?>
<div class="col-md-3">
    <div class="panel panel-default" >
        <div class="panel-heading">Search Publications</div>
        <div class="panel-body" >
            <form method="GET" action="<?php echo $location.'search.php';?>">
                <div class="form-group">
                    <div class="input-group" ><input type="text" name="sterm"class="form-control" placeholder="Search" required>
                        <span class="input-group-btn">
                            <button class="btn btn-default" name="search" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                        </span>
                    </div>
                    <div align="left">
                    <?php
                        // Checking for search info
                        if(isset($_SESSION['search'])) {
                            echo "<span style='color: red; font-size: 14px;list-style-type:none;'>".$_SESSION['search']."</span>";
                            unset($_SESSION['search']);
                        }
                            ?>
</div>
</div>
</form>
<div class="text-left" style="font-family:'Comic Sans MS', cursive, sans-serif">Tips: Search by title, author or key words.</div>
</div>
</div>
<a href="<?php echo $location.'pledge_donation.php'?>">
    <div class="well" style="color:#ffffff;background-color: #c7d510;font-weight:bold">Support printing of Extension Publications</div>
</a>

<div class="panel panel-default" >
    <div class="panel-heading"> Publication Categories </div>
    <div class="panel-body" >
        <ul style="text-align:left;color:#006600;line-height:40px;font-size:16px;list-style-type:none;padding-left:0px;">
            <li><a href="<?php echo $location.'publications/category/reports.php';?>"><span class="glyphicon glyphicon-book"> </span>  Reports</a></li>
            <li><a href="<?php echo $location.'publications/category/bulletins.php';?>"><span class="glyphicon glyphicon-book"> </span>  Bulletins</a></li>
            <li><a href="<?php echo $location.'publications/category/guides.php';?>"><span class="glyphicon glyphicon-book"> </span>  Guides</a></li>
            <li><a href="http://njae.naerls.gov.ng" target="_blank"><span class="glyphicon glyphicon-book" > </span>  Nigerian Journal of Agricultural Extension</a></li>
            <li><a href="<?php echo $location.'publications/category/newsletters.php';?>"><span class="glyphicon glyphicon-book"> </span>  Agric. Newsletters</a></li>
            <li><a href="<?php echo $location.'publications/category/seminar-papers.php';?>"><span class="glyphicon glyphicon-book"> </span>  Seminar Papers</a></li>
        </ul>
    </div>
</div>
</div><!-- /.col-md-3 -->
