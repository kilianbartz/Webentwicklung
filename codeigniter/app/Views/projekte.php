<div class="col">
        <div class="form-group">
            <label for="project" class="big">Projekt Auswählen:</label>
            <select name="" id="project" class="form-select">
                <option value="" disabled>- bitte auswählen -</option>
                <?php
                    if(isset($projekte)){
                        foreach($projekte as $projekt){
                            $selected = isset($editProjekt) && $projekt['id'] == $editProjekt['id'] ? "selected" : "";
                            echo "<option $selected value='".$projekt['id']."'>".$projekt['name']."</option>";
                        }
                    }
                ?>
            </select>
            <div class="button-group">
                <button class="btn btn-primary" onclick="select()">Auswählen</button>
                <button class="btn btn-primary" onclick="edit()">Bearbeiten</button>
                <button class="btn btn-danger" onclick="remove()">Löschen</button>
            </div>
        </div>
        <label for="project" class="big">Projekt bearbeiten/erstellen:</label>
    <form action="<?=isset($editProjekt) ? base_url("public/projekte/update/".$editProjekt['id']) :
        base_url("public/projekte/new") ?>" method="post">
        <div class="form-group">
            <label for="name">Projektname:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= isset($editProjekt) ? $editProjekt['name'] : '' ?>">
        </div>
        <div class="form-group">
            <label for="beschreibung">Projektbeschreibung:</label>
            <textarea id="beschreibung" class="form-control" name="beschreibung"><?= isset($editProjekt) ? $editProjekt['beschreibung'] : '' ?></textarea>
        </div>
        <div class="button-group">
            <button class="btn btn-primary" type="submit">Speichern</button>
            <button class="btn btn-primary" style="background: #17a2b8; border: 1px solid #17a2b8;" type="reset">Reset</button>
        </div>
    </form>
</div>
<script>
    function edit(){
        let selected = document.getElementById("project").value;
        window.location.href = window.location.href.substring(0, window.location.href.indexOf("projekte")) + "projekte/edit/" + selected
    }
    function remove(){
        if(!confirm("Sind Sie sich sicher, dass Sie dieses Projekt löschen möchten?")) return
        let selected = document.getElementById("project").value;
        window.location.href = window.location.href.substring(0, window.location.href.indexOf("projekte")) + "projekte/remove/" + selected
    }
    function select(){
        let selected = document.getElementById("project").value;
        window.location.href = window.location.href.substring(0, window.location.href.indexOf("projekte")) + "projekte/select/" + selected
    }
</script>
