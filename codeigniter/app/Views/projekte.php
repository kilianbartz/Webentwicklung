<div class="col">
    <form action="">
        <div class="form-group">
            <label for="project" class="big">Projekt Auswählen:</label>
            <select name="" id="project" class="form-select">
                <option value="" disabled selected>- bitte auswählen -</option>
            </select>
            <div class="button-group">
                <button class="btn btn-primary">Auswählen</button>
                <button class="btn btn-primary">Bearbeiten</button>
                <button class="btn btn-danger">Löschen</button>
            </div>
        </div>
        <label for="project" class="big">Projekt bearbeiten/erstellen:</label>
        <div class="form-group">
            <label for="name">Projektname:</label>
            <input type="text" class="form-control" id="name">
        </div>
        <div class="form-group">
            <label for="beschreibung">Projektbeschreibung:</label>
            <textarea id="beschreibung" class="form-control"></textarea>
        </div>
        <div class="button-group">
            <button class="btn btn-primary" type="submit">Speichern</button>
            <button class="btn btn-primary" style="background: #17a2b8; border: 1px solid #17a2b8;" type="reset">Reset</button>
        </div>
    </form>
</div>
