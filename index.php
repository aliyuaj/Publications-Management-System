<?php
$title='Publications: Home';
$location='';
$publocation='publications/';
include 'includes/header.php';
include 'includes/lsidebar.php';
?>
<div class="col-md-6">
    <div id="carousel-example-generic" class="carousel slide" style="margin-bottom:10px;">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1" ></li>
            <li data-target="#carousel-example-generic" data-slide-to="2" ></li>
            <li data-target="#carousel-example-generic" data-slide-to="3" ></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img src="img/naerls.jpg" alt="First slide" class="img-thumbnail">
                <div class="container">
                    <div class="carousel-caption">
                        <h3>NAERLS Admin Building, ABU, Zaria</h3>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="img/naerls1.jpg" alt="Second slide" class="img-thumbnail">
                <div class="container">
                    <div class="carousel-caption">
                        <h3>NAERLS Books collections</h3>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="img/naerls3.jpg" alt="Third slide" class="img-thumbnail">
                <div class="container">
                    <div class="carousel-caption">
                        <h3>NAERLS Publications Shelves</h3>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="img/naerls4.jpg" alt="Fourth slide" class="img-thumbnail">
                <div class="container">
                    <div class="carousel-caption">
                        <h3>NAERLS E-Library</h3>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->
    <div class="panel panel-default">
        <div class="panel-heading" id="navigation">
            <h3 class="panel-title" >New Publications</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <?php
                $query=mysqli_query($con,"Select * from materials INNER JOIN pub_media on materials.matID=pub_media.pub_id && type='image' ORDER by today DESC ");
                echo '
								<ul id="flexiselDemo2">';
                while($mats=mysqli_fetch_assoc($query)){
                    $id=$mats['matID'];
                    $title=$mats['title'];
                    $img=$mats['source'];
                    echo '<li>
									  <a href="publications/?id='.$id.'" class="btn-info" data-toggle="tooltip"  title="'.$title.'">';

                    echo '<img alt="File Image" style="height:120px;width:100px" class="img-responsive  img-thumbnail" src="uploads/images/'.$img.'">
									  </a>
									</li>';
                }
                echo '</ul>';
                ?>
                <script>
                    $(window).load(function() {
                            $("#flexiselDemo2").flexisel({
                                visibleItems: 5,
                                itemsToScroll: 1,
                                animationSpeed: 1000,
                                infinite: true,
                                navigationTargetSelector: null,
                                autoPlay: {
                                    enable: false,
                                    interval: 3000,
                                    pauseOnHover: true
                                },
                                enableResponsiveBreakpoints: true,
                                responsiveBreakpoints: {
                                    portrait: {
                                        changePoint:480,
                                        visibleItems: 1,
                                        itemsToScroll: 1
                                    },
                                    landscape: {
                                        changePoint:640,
                                        visibleItems: 2,
                                        itemsToScroll: 2
                                    },
                                    tablet: {
                                        changePoint:768,
                                        visibleItems: 3,
                                        itemsToScroll: 3
                                    }
                                }
                            });
                    });
                </script>
                <script  src="dist/js/jquery.flexisel.js"></script>
            </div>
            <div class="text-center" style="font-family:'Comic Sans MS', cursive, sans-serif;color:green;"> Hover over images to see the publication title</div>
        </div>
    </div>
</div>
<?php include 'includes/rsidebar.php';?>
</div></div></div><!-- /.container -->
<script>
    $(window).load(function() {
        $('.carousel').carousel({
            animSpeed: 500,
            pauseTime: 5000,
            directionNav: true,
            controlNav: false,
            controlNavThumbs: false,
            pauseOnHover: true,
            manualAdvance: false,
            prevText: 'Next',
            nextText: 'Prev',
            randomStart: false
        });
    });
</script>
<div id="push"></div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="dist/js/bootstrap.min.js"></script>
<script src="includes/footer.js"></script>
</body>
</html>
