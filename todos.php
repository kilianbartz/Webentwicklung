<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Todos</title>
    <style>
        h1 {
            text-align: center;
            color: #242424;
            width: 100%;
        }
        #title {
            padding: 1.5rem;
        }
        .indented {
            margin-left: 1em;
        }
        a {
            text-decoration: none;
        }

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="bg-light mb-3" id="title">
            <h1>Aufgabenplaner: Todos (Aktuelles Projekt)</h1>
        </div>
        <div class="row">
            <div class="col-2">
                <ul class="list-group">
                    <li class="list-group-item"><a href="#">Login</a></li>
                    <li class="list-group-item"><a href="#">Projekte</a></li>
                    <li class="list-group-item"><a href="#">Aktuelles Projekt</a></li>
                    <li class="list-group-item indented"><a href="#">Reiter</a></li>
                    <li class="list-group-item indented"><a href="#">Aufgaben</a></li>
                    <li class="list-group-item indented"><a href="#">Mitglieder</a></li>
                </ul>
            </div>
            <div class="col">
                <div class="row">
                    <?php
                        require "data.php";
                        foreach($reiter as $id => $row){
                            echo '<div class="col-4"><div class="card">
                            <h4 class="card-header">'.$row["name"].'</h4>
                            <ul class="list-group list-group-flush">';
                                foreach($todos as $t){
                                    if($t["reiterid"] != $id) continue;
                                    echo '<li class="list-group-item">'.$t["text"].' ('.$mitglieder[$t["userid"]]["name"].')</li>';
                                }
                            echo '</ul>
                        </div>
                    </div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>