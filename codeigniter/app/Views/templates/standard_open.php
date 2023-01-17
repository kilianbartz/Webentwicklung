<div class="container-fluid">
    <div class="bg-light mb-3" id="title">
        <h1><?= $title ?? 'Standardtitel' ?></h1>
    </div>
    <div class="row">
        <div class="col-2">
            <ul class="list-group">
                <li class="list-group-item"><a href="<?=base_url("public/login/logout")?>">Logout</a></li>
                <li class="list-group-item"><a href="<?=base_url("public/projekte")?>">Projekte</a></li>
                <?php if(isset($_SESSION['projektname'])): ?>
                <li class="list-group-item"><a href="<?=base_url("public/todos")?>"><?=$_SESSION['projektname']?></a></li>
                <li class="list-group-item indented"><a href="<?=base_url("public/reiter")?>">Reiter</a></li>
                <li class="list-group-item indented"><a href="<?=base_url("public/aufgaben")?>">Aufgaben</a></li>
                <li class="list-group-item indented"><a href="<?=base_url("public/mitglieder")?>">Mitglieder</a></li>
                <?php endif;?>
            </ul>
        </div>
        <div class="col">
            <div class="row">