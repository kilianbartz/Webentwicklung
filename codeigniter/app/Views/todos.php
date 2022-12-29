
                    <?php
                        foreach(esc($reiter) as $id => $row){
                            echo '<div class="col-4"><div class="card">
                            <h4 class="card-header">'.$row["name"].'</h4>
                            <ul class="list-group list-group-flush">';
                                foreach($todos as $t){
                                    if($t["reiterid"] != $id) continue;
                                    echo '<li class="list-group-item">'.$t["text"].' ('.$mitglieder[$t["userid"]]["name"].')</li>';
                                }
                            echo '</ul>
                        </div>
                    </div>';
                        }
                    ?>