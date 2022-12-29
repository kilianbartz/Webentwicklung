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
                echo "<tr><td>".$row['name']."</td><td>".$row['email']."</td><td><input type='checkbox' class='form-check-input'></td><td><i class='fa-solid fa-pen-to-square'></i><i class='fa-solid fa-trash-can'></i></td></tr>";
            }
        ?>
        </tbody>
    </table>
</div>
<form action="">
    <label for="project" class="big">Bearbeiten/erstellen:</label>
    <div class="form-group">
        <label for="name">Username:</label>
        <input type="text" class="form-control" id="name">
    </div>
    <div class="form-group">
        <label for="beschreibung">E-Mail Adresse:</label>
        <input type="email" id="beschreibung" class="form-control">
    </div>
    <div class="form-group">
        <label for="pw">Passwort:</label>
        <input type="password" id="pw" class="form-control">
    </div>
    <div class="form-check">
        <input type="checkbox" name="assigned" id="assigned" class="form-check-input">
        <label for="assigned" class="form-check-label">Dem Projekt zugeordnet</label>
    </div>

    <div class="button-group">
        <button class="btn btn-primary" type="submit">Speichern</button>
        <button class="btn btn-primary" style="background: #17a2b8; border: 1px solid #17a2b8;" type="reset">Reset</button>
    </div>
</form>