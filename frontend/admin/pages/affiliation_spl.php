<div class="container mt-2 text-right">
    <a href="/admin/" ><i class="fa fa-home" ></i> Back to Dashboard</a>
</div>

<div class="container mt-2">
    <div class="row">   
        <div class="col-lg-6 col-md-6 col-sm-12 text-left"><a name="" id="" class="btn btn-danger" href="/admin/affiliations/" role="button">Affiliations Pending For Acceptance</a></div>
        <div class="col-lg-6 col-md-6 col-sm-12 text-right"><a name="" id="" class="btn btn-danger" href="/admin/affiliations/accepted/" role="button">Accepted Affiliations</a></div>
    </div>
    <br/>
    <?php

        if(explode("/admin/affiliations/", $array["route"])[1] == "accepted/") {
            $whereSTMT = "is_accepted=1";
            $tableTTL = "<h3>Accepted Affiliations";
        }
        else {
            $whereSTMT = "is_accepted=0";    
            $tableTTL = "<h3>Pending Affiliations";
        }
        $datas = "";
        if(!isset($_GET["LIMIT"])) {
            $extra = "ORDER BY last_update LIMIT 300";
            $tableTTL.="  (Showing Last 300 only)</h3><a href='?LIMIT=NA'>CLICK HERE TO VIEW ALL</a>";
        }
        else {
            $extra = "ORDER BY last_update";
            $tableTTL .= " (ALL)</h3>"; 
        }

        $db = new db;
        $res = $db->select("study_center_aff_req", "id, application_date, name, mob_1", $whereSTMT, NULL, $extra);
        if($res[0] == true && $res[1]->num_rows > 0) {
            while($r = mysqli_fetch_assoc($res[1])) {
                $href = "/online-affiliation/download/?id=".$r['id']."&mob=".$r['mob_1'];
                $datas .= '
                    <tr>
                        <td>'.$r['id'].'</td>
                        <td>'.ucfirst($r['name']).'</td>
                        <td>'. date("d-m-Y", strtotime($r["application_date"])).'</td>
                        <td><a name="" id="" class="btn btn-primary" href="'.$href.'" role="button">VIEW</a></td>
                    </tr>
                ';
            }
        } else {
            $datas = '<tr><td colspan=4>0 Affiliations Found</td></tr>';
        }
    ?>
    <?=$tableTTL?>
    
    <table id="admTbl" width="100%" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Institute Name</th>
                <th>Application Date</th>
                <th>#</th>
            </tr>
            </thead>
            <tbody>
                <?=$datas; ?> 
            </tbody>
    </table>
</div>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    $("#admTbl").DataTable();
} );
</script>