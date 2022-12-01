<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Title</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="bg-light mb-3" id="title">
        <h1>Aufgabenplaner: Projekte</h1>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php require "sidemenu.php"; ?>
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
        </div>
    </div>
</body>
</html>