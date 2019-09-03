<?php
    if((isset($_GET["id"]) && is_numeric($_GET["id"])) && (isset($_GET["ac"]) && ($_GET["ac"] == "yes" || $_GET["ac"] == "no")))  {
        if($_GET["ac"] == "yes") {
            $data = array(
                "is_accepted"=>1,
                "accepted_by"=>$_SESSION["admin_username"]
            );
            $db = new db;
            $res = $db->update("study_center_aff_req", $data, "is");
            if($res[0] == true)
                echo "
                    <script>
                        alert('affiliation accepted successfully by ".$_SESSION['admin_username']."');
                        window.location.href = '/admin/affiliations/'
                    </script>
                ";
                die();
        }
        echo "
                    <script>
                        alert('affiliation in pending by ".$_SESSION['admin_username']."');
                        window.location.href = '/admin/affiliations/'
                    </script>
                ";
    }
    else {
        echo "
                <script>
                    alert('Failed to accept affiliation request');
                    window.location.href = '/admin/affiliations/'
                </script>
            ";
    }
?>