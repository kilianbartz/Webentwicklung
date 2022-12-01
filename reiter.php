<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>Title</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="bg-light mb-3" id="title">
    <h1>Aufgabenplaner: Reiter</h1>
</div>
<div class="container-fluid">
    <div class="row">
        <?php require "sidemenu.php"; ?>
        <div class="col">
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
                        require "data.php";
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
        </div>
    </div>
</div>
</body>
</html>