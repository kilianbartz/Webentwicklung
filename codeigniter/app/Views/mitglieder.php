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
                <th>In Projekt</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($mitglieder as $row){
                echo "<tr><td>".$row['username']."</td><td>".$row['email']."</td>
                <td><input type='checkbox' class='form-check-input'></td>
                <td><a href='".base_url("public/mitglieder/edit/".$row['id'])."'><i class='fa-solid fa-pen-to-square'></i></a>
                    <a href='#' onclick='remove(".$row['id'].")'><i class='fa-solid fa-trash-can'></i></a>
                    </td>
                </tr>";
            }
        ?>
        </tbody>
    </table>
</div>
<form action="<?=isset($mitglied_edit) ? base_url("public/mitglieder/update/".$mitglied_edit['id']) : base_url("public/mitglieder/new") ?>" method="post">
    <label for="project" class="big">Bearbeiten/erstellen:</label>
    <div class="form-group">
        <label for="name">Username:</label>
        <input type="text" class="form-control" id="name" name="username" value="<?=isset($mitglied_edit) ? $mitglied_edit['username'] : ""?>">
    </div>
    <div class="form-group">
        <label for="beschreibung">E-Mail Adresse:</label>
        <input type="email" id="beschreibung" class="form-control" name="email" value="<?=isset($mitglied_edit) ? $mitglied_edit['email'] : ""?>">
    </div>
    <?php
        if(!isset($mitglied_edit) || isset($allow_edit_password) && $allow_edit_password):?>
    <div class="form-group">
        <label for="pw">Passwort:</label>
        <input type="password" id="pw" class="form-control" name="password">
    </div>
    <?php endif ?>
    <div class="form-check">
        <input type="checkbox" name="assigned" id="assigned" class="form-check-input">
        <label for="assigned" class="form-check-label">Dem Projekt zugeordnet</label>
    </div>

    <div class="button-group">
        <button class="btn btn-primary" type="submit">Speichern</button>
        <button class="btn btn-primary" style="background: #17a2b8; border: 1px solid #17a2b8;" type="reset">Reset</button>
    </div>
</form>
<script>
    function remove(id){
        if(confirm("Sind Sie sich sicher, dass Sie diesen Nutzer löschen möchten?"))
            window.location.href = "<?=base_url("public/mitglieder/remove")?>/" + id
    }
</script>