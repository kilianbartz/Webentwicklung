<div>
    <table class="table">
        <thead class="table-light">
            <tr>
                <th scope="col">
                    Aufgabenbezeichnung
                </th>
                <th scope="col">
                    Beschreibung der Aufgabe
                </th>
                <th>Reiter:</th>
                <th>Zuständig:</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($todos as $row){
                echo "<tr><td>".$row['text']."</td><td>".$row['beschreibung']."</td><td>".$reiter[$row["reiterid"]]["name"]."</td><td>".$mitglieder[$row["userid"]]["name"]."</td><td><i class='fa-solid fa-trash-can'></i><i class='fa-solid fa-pen-to-square'></i></td></tr>";
            }
        ?>
        </tbody>
    </table>
</div>
<form action="">
    <label for="project" class="big">Bearbeiten/erstellen:</label>
    <div class="form-group">
        <label for="name">Aufgabenbezeichnung:</label>
        <input type="text" class="form-control" id="name">
    </div>
    <div class="form-group">
        <label for="beschreibung">Beschreibung der Aufgabe:</label>
        <textarea id="beschreibung" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="erstellung">Erstellungsdatum:</label>
        <input type="date" class="form-control" id="erstellung">
    </div>
    <div class="form-group">
        <label for="faellig">fällig bis:</label>
        <input type="date" class="form-control" id="faellig">
    </div>
    <div class="form-group">
        <label for="reiter">Zugehöriger Reiter:</label>
        <select name="reiter" id="reiter" class="form-select">
            <?php
                foreach($reiter as $id => $row){
                    echo "<option value='$id'>".$row["name"]."</option>";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="zust">Zuständig:</label>
        <select name="zust" id="zust" class="form-select">
            <?php
                foreach($mitglieder as $id => $row){
                    echo "<option value='$id'>".$row["name"]."</option>";
                }
            ?>
        </select>
    </div>
    <div class="button-group">
        <button class="btn btn-primary" type="submit">Speichern</button>
        <button class="btn btn-primary" style="background: #17a2b8; border: 1px solid #17a2b8;" type="reset">Reset</button>
    </div>
</form>