<div class="container">
    <table id="coursesTable" class="table table-bordered table-responsive table-inverse">
        <thead class="thead-inverse">
            <tr>
                <th>Sr No</th>
                <th>Course Name</th>
                <th>Eligibility</th>
                <th>Duration (Months)</th>
                <th>Exam Fees (Rs)</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $db = new db;
                $res = $db->select("courses", "*");
                if($res[0] == true && $res[1]->num_rows > 0) {
                    $i=0;
                    while($row = mysqli_fetch_assoc($res[1])) {
                        echo "<tr>"; 
                        echo "<td scope='row'>".++$i."</td>";
                        echo "<td>".$row['course_name']."</td>";
                        echo "<td>".$row['eligibility']."</td>";
                        echo "<td>".$row['duration']."</td>";
                        echo "<td>".$row["exam_fees"]."</td>";
                        echo "</tr>"; 
                    }
                } else {
                    echo "<tr><td colspan='5'>No Courses Found</td></tr>";
                }

            ?>            
                
        </tbody>
    </table>
</div>


<script>
$(document).ready(function() {
    $('#coursesTable').DataTable();
} );
</script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>



