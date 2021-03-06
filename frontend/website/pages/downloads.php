<section id="downloads">
    <div class="container">
        <h2 class="text-uppercase text-center">Downloads</h2>
        <hr>
        <div class=" table-responsive">
            <table class="table table-bordered table-striped table-inverse">
                <thead class="thead-inverse">
                    <tr>
                        <th class="text-center" width="5%">#</th>
                        <th class="text-left" width="90%">File Name</th>
                        <th class="text-center" width="5%">Download</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $notifTable = "notifs_circus_downlds";
                        $db = new db;
                        $data = "text,flag,link"; 
                        $whereStmt = "type = 'D'"; 
                        $res = $db->select($notifTable, $data, $whereStmt, NULL, "ORDER BY id DESC");
                        if($res[0] == true && $res[1]->num_rows > 0) {
                            
                            $i = $res[1]->num_rows;
                            $j=0;
                            while($row = mysqli_fetch_assoc($res[1])) {
                                if($row['flag'] == "new") 
                                    $label = '<span class="badge badge-danger">New</span>&nbsp;&nbsp;';
                                else if($row['flag'] == "imp")
                                    $label = '<span class="badge badge-secondary">Important</span>&nbsp;&nbsp;';
                                else if($row['flag'] == "na")
                                    $label ="";
                                echo "<tr>";
                                    echo "<td class='text-center'>".++$j."</td>";
                                    echo "<td>".$label. " ".$row['text']."</td>";
                                    echo "<td class='text-center'><a href='".$row['link']."' download><i class='fa fa-download'></i></a>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No downloads available yet</td></tr>";
                        }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>