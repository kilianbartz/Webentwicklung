<div class="bg-light mb-3" id="title">
    <h1>Aufgabenplaner: Login</h1>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-2">

        </div>
        <div class="col">
            <form action="<?=base_url("public/login")?>" method="post">
                <div class="form-group">
                    <label for="email">Email-Adresse</label>
                    <input type="email" placeholder="Email-Adresse eingeben" id="email"
                           class="form-control <?=isset($error['email']) ? 'is-invalid' : ''?>" name="email"
                    value="<?=$login['email'] ?? ''?>">
                    <div class="invalid-feedback">
                        <?= $error['email'] ?? '' ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pw">Passwort</label>
                    <input type="password" placeholder="Passwort" id="pw"
                           class="form-control <?=isset($error['password']) ? 'is-invalid' : ''?>" name="password">
                    <div class="invalid-feedback">
                        <?= $error['password'] ?? '' ?>
                    </div>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input <?=isset($error['agbs']) ? 'is-invalid' : ''?>" id="agbs" name="agbs">
                    <label for="agbs">AGBs und Datenschutzbedingung akzeptieren</label>
                    <div class="invalid-feedback">
                        <?= $error['agbs'] ?? '' ?>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Einloggen</button>
                <p>Noch nicht registriert? <a href="register.html">Registrierung</a></p>
                <p>Da der Login Vorgang technisch noch nicht realisiert wurde: <a href="<?php echo base_url("");?>/public/todos">Überspringen</a></p>
                <div class="card" style="<?= !isset($other_errors) ? 'display: none' : ''  ?>">
                    <div class="card-header">Fehler</div>
                    <div class="card-body">
                        <p class="card-text text-danger"><?= $other_errors ?? ''?></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>