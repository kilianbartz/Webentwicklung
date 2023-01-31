
            <div>
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">
                                Name
                            </th>
                            <th scope="col">
                                Beschreibung
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(isset($reiter)){
                        foreach($reiter as $row){
                            echo "<tr><td>".$row['name']."</td><td>".$row['beschreibung']."</td><td><a href='".base_url("public/reiter/edit/".$row['id'])."'><i class='fa-solid fa-pen-to-square'></i></a>
                    <a href='#' onclick='remove(".$row['id'].")'><i class='fa-solid fa-trash-can'></i></a></td></tr>";
                        }
                    }

                    ?>
                    </tbody>
                </table>
            </div>
            <form action="<?=isset($reiter_edit) ? base_url("public/reiter/update/".$reiter_edit['id']) : base_url("public/reiter/new") ?>" method="post">
                <label for="project" class="big">Bearbeiten/erstellen:</label>
                <div class="form-group">
                    <label for="name">Bezeichnung des Reiters:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?=isset($reiter_edit) ? $reiter_edit['name'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="beschreibung">Beschreibung:</label>
                    <textarea id="beschreibung" class="form-control" name="beschreibung"><?=isset($reiter_edit) ? $reiter_edit['beschreibung'] : '' ?></textarea>
                </div>
                <div class="button-group">
                    <button class="btn btn-primary" type="submit">Speichern</button>
                    <button class="btn btn-primary" style="background: #17a2b8; border: 1px solid #17a2b8;" type="reset">Reset</button>
                </div>
            </form>
            <script>
                function remove(id){
                    if(confirm("Sind Sie sich sicher, dass Sie diesen Reiter löschen möchten?"))
                        window.location.href = "<?=base_url("public/reiter/remove")?>/" + id
                }
            </script>