
                    <?php
                        if(isset($aufgaben)){
                            $reiterid = $aufgaben[0]['reiterid'];
                            echo '<div class="col-4"><div class="card">
                                    <h4 class="card-header">'.$aufgaben[0]["rname"].'</h4>
                                    <ul class="list-group list-group-flush">';
                            foreach($aufgaben as $row){
                                if($row['reiterid'] != $reiterid){
                                    $reiterid = $row['reiterid'];
                                    echo '</ul></div></div>';
                                    echo '<div class="col-4"><div class="card">
                                    <h4 class="card-header">'.$row["rname"].'</h4>
                                    <ul class="list-group list-group-flush">';
                                }
                                echo '<li class="list-group-item">'.$row['name'].' ('.$row['zustaendige'].')</li>';
                            }
                            echo '</ul></div></div>';
                        }
                    ?>