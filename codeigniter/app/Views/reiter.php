
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
                        foreach($reiter as $row){
                            echo "<tr><td>".$row['name']."</td><td>".$row['beschreibung']."</td><td><i class='fa-solid fa-pen-to-square'></i><i class='fa-solid fa-trash-can'></i></td></tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            <form action="">
                <label for="project" class="big">Bearbeiten/erstellen:</label>
                <div class="form-group">
                    <label for="name">Bezeichnung des Reiters:</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="beschreibung">Beschreibung:</label>
                    <textarea id="beschreibung" class="form-control"></textarea>
                </div>
                <div class="button-group">
                    <button class="btn btn-primary" type="submit">Speichern</button>
                    <button class="btn btn-primary" style="background: #17a2b8; border: 1px solid #17a2b8;" type="reset">Reset</button>
                </div>
            </form>