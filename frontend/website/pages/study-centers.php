<?php
    $res = $db->select("study_center_aff_req", "name, address, mob_1, mob_2", "is_accepted=1");
    if($res[0] == true) {
        $i = 0;
        if($res[1]->num_rows > 0) {

                while($row = mysqli_fetch_assoc($res[1])) {
                    $ins[$i] = $row;
                    $i++;
                }
        }
        
    }
    

?>

<section id="study-center-list">
    <div class="container">
        <h3 class="text-center">List of Affiliated Study centers</h3>
        <hr />
        <div class="row">
            <?php 
                $i = 0;
                if($res[1]->num_rows > 0) {
                
                    foreach ($ins as $insm => $insti) {
                        echo '
                    
                        <div class="col-sm-12 col-md-6 col-lg-6" style="padding:10px">
                            <div class="container border pt-3 pb-3">
                                <h4 style="color:red">' . ++$i .') '. $insti['name']. '</h4><br />
                                <address class="lead"> <i class="fa fa-map-marker" style="color:#039dfc" aria-hidden="true"></i> &nbsp;&nbsp;'. $insti['address'] .'</address>
                                <p class="lead"><i class="fa fa-phone" style="color:#039dfc" aria-hidden="true"></i> &nbsp;&nbsp;'. $insti['mob_1'] . ' ,' .$insti['mob_1'] .'</p>
                            </div>
                        </div>
                        ';
                        # code...
                    }
                } else {
                    echo "<h3>No study centers Found</h3>";
                }
            ?>
        </div>
    </div>

</section>