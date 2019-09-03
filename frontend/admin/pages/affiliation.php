<?php
    if($this->accessLevelRequired("access_admissions", 2) == false) {
        echo' 
        <div class="container mt-2 text-center">
            <a href="/admin/" ><i class="fa fa-home" ></i> Back to Dashboard</a><br/><br/>
            <h3 class="text-danger">You do not have access to admissions section, If you think this is a mistake please contact administrator</h3>; 
        </div>
        ';
    } else {
        require_once("affiliation_spl.php"); 
    }
    ?>