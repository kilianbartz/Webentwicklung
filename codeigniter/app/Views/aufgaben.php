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
            foreach($aufgaben as $row){
                echo "<tr><td>".$row['name']."</td><td>".$row['beschreibung']."</td><td>".$row["rname"]."</td><td>(".
                    $row["zustaendige"].")</td><td>
                    <a href='#' onclick='remove(".$row['id'].")'><i class='fa-solid fa-trash-can'></i></a>
                    <a href='".base_url("public/aufgaben/edit/".$row['id'])."'><i class='fa-solid fa-pen-to-square'></i></a></td></tr>";
            }
        ?>
        </tbody>
    </table>
</div>
<form action="<?= isset($editAufgabe) ? base_url("public/aufgaben/update/".$editAufgabe['id']) : base_url("public/aufgaben/new")?>" method="post">
    <label for="project" class="big">Bearbeiten/erstellen:</label>
    <div class="form-group">
        <label for="name">Aufgabenbezeichnung:</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= isset($editAufgabe) ? $editAufgabe['name'] : '' ?>">
    </div>
    <div class="form-group">
        <label for="beschreibung">Beschreibung der Aufgabe:</label>
        <textarea id="beschreibung" name="beschreibung" class="form-control"><?= isset($editAufgabe) ? $editAufgabe['beschreibung'] : '' ?></textarea>
    </div>
    <div class="form-group">
        <label for="faellig">fällig bis:</label>
        <input type="date" class="form-control" name="faelligkeitsdatum" id="faellig" value="<?= isset($editAufgabe) ? $editAufgabe['faelligkeitsdatum'] : '' ?>">
    </div>
    <div class="form-group">
        <label for="reiter">Zugehöriger Reiter:</label>
        <select name="reiterid" id="reiter" class="form-select">
            <?php
                foreach($reiter as $row){
                    $selected = isset($editAufgabe) && $editAufgabe['reiterid'] ==  $row['id'] ? "selected" : "";
                    echo "<option $selected value='".$row['id']."'>".$row["name"]."</option>";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="zust">Zuständig:</label>
        <select name="zust[]" id="zust" class="form-select" multiple>
            <?php
                foreach($mitglieder as $row){
                    $id = $row['id'];
                    $selected = isset($editAufgabe) && str_contains($editAufgabe['zustaendige'], $row['username']) ? "selected" : "";
                    echo "<option $selected value='$id'>".$row["username"]."</option>";
                }
            ?>
        </select>
    </div>
    <div class="button-group">
        <button class="btn btn-primary" type="submit">Speichern</button>
        <button class="btn btn-primary" style="background: #17a2b8; border: 1px solid #17a2b8;" type="reset">Reset</button>
    </div>
</form>
<script>
    function remove(id){
        if(confirm("Sind Sie sich sicher, dass Sie diese Aufgabe löschen möchten?"))
            window.location.href = "<?=base_url("public/aufgaben/remove")?>/" + id
    }
</script>