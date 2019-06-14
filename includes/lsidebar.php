<?php
/**
 * Created by PhpStorm.
 * User: HP USER
 * Date: 1/3/2017
 * Time: 5:44 PM
 */?>
<script>
    $(document).ready(function(){
        $('#sample-query a').click(function(e) {
            var txt = $(e.target).prop('id');
            //document.write(txt);
            $('#query-editor').val(txt);
        });
    })

</script>
<?php
 function dashLink($obj){
     return str_replace(" ","-",$obj);
 }
?>
<div class="col-md-3">
	<div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading" >Browse by subjects</div>

        <div class="list-group" align="left" style="font-weight:bold;">
            <?php
            $sql1 = "SELECT * FROM subjects";
            $qresult1 = mysqli_query($con,$sql1);
            while($row = mysqli_fetch_array($qresult1)) {
                $subName = $row['subjectName'];
                $subID = $row['subjectID'];
                $sql2 = "SELECT * FROM sub_subjects WHERE sub_subjects.subjectID=$subID";
                $qresult2 = mysqli_query($con,$sql2);

                if(mysqli_num_rows($qresult2)>0){
                    $list= '&#187 &nbsp;';
                    echo '<a data-toggle="collapse"  class="list-group-item" href="#collapse'.$subID.'"> '. $list.$subName.'</a>';
                    echo '<div id="collapse'.$subID.'" class="panel-collapse collapse">';
                    echo '<ul class="list-group" id="sample-query" style="list-style-type: circle; color: red">';

                    while($row2=mysqli_fetch_assoc($qresult2)){
                        $sub_subjectName = $row2['ssName'];
                        $subsubjectID = $row2['ssID'];
                        $sql3 = "SELECT * FROM sub_sub_subjects WHERE sub_sub_subjects.ssID=$subsubjectID";
                        $qresult3 = mysqli_query($con,$sql3);
                        if(mysqli_num_rows($qresult3)>0){
                            $list= '&#187&#187 ';
                            echo '<a data-toggle="collapse"  class="list-group-item" href="#collapse2'.$subID.$subsubjectID.'"> '. $list.$sub_subjectName.'</a>';
                            echo '<div id="collapse2'.$subID.$subsubjectID.'" class="panel-collapse collapse">';
                            echo '<ul class="list-group" id="sample-query" style="list-style-type: circle; color: red">';
                            while($row3=mysqli_fetch_assoc($qresult3)){
                                $sub_sub_subjectName = $row3['sssName'];
                                $sub_sub_subjectID = $row3['sssID'];
                                $list= '&#187&#187&#187 ';
                                $link= $publocation.'subjects/'.dashLink($subName).'/'.dashLink($sub_subjectName).'/'.dashLink($sub_sub_subjectName).'.php';
                                echo '<li class="list-group-item">
                                <a href="'.$link.'" id="">&nbsp;&nbsp; '.$list.$sub_sub_subjectName.'
                                </a>
                                </li>';                            }

                            echo '</ul></div>';
                        }else {
                            $link= $publocation.'subjects/'.dashLink($subName).'/'.dashLink($sub_subjectName).'.php';
                            echo '<li class="list-group-item">
                                <a href="'.$link.'" id="">&nbsp;&nbsp; '.$sub_subjectName.'
                                </a>
                         </li>';
                        }

                    }
                    echo '</ul></div>';

                }else {
                    $link= $publocation.'subjects/'.dashLink($subName).'.php';
                    echo '<a data-toggle="collapse"  class="list-group-item" href="'.$link.'"> '.$subName.'</a>';
                }
            }
            ?>

        </div>
    </div>
</div>