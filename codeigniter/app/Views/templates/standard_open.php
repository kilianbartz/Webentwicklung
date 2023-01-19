<div class="container-fluid">
    <div class="bg-light mb-3" id="title">
        <h1><?= $title ?? 'Standardtitel' ?></h1>
    </div>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 flex-grow-1">
                    <li class="nav-item">
                        <a href="<?=base_url("public/projekte")?>" class="nav-link">Projekte</a>
                    </li>
                    <?php if(isset($_SESSION['projektname'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?=$_SESSION['projektname']?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?=base_url("public/todos")?>">Projektübersicht</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?=base_url("public/reiter")?>">Reiter</a></li>
                            <li><a class="dropdown-item" href="<?=base_url("public/aufgaben")?>">Aufgaben</a></li>
                            <li><a class="dropdown-item" href="<?=base_url("public/mitglieder")?>">Mitglieder</a></li>
                        </ul>
                    </li>
                    <li class="nav-item" style="margin-left: auto">
                        <a href="<?=base_url("public/login/logout")?>" class="nav-link ms-auto btn btn-primary" style="color: white; margin-bottom: 0;">Logout</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row mt-4">
        <?php /*<div class="col-2">
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
        </div>*/?>
        <div class="col">
            <div class="row">