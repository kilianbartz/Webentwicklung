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
                    <input type="email" placeholder="Email-Adresse eingeben" id="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="pw">Passwort</label>
                    <input type="password" placeholder="Passwort" id="pw" class="form-control" name="password">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="agbs">
                    <label for="agbs">AGBs und Datenschutzbedingung akzeptieren</label>
                </div>
                <button class="btn btn-primary" type="submit">Einloggen</button>
                <p>Noch nicht registriert? <a href="register.html">Registrierung</a></p>
                <p>Da der Login Vorgang technisch noch nicht realisiert wurde: <a href="<?php echo base_url("");?>/public/todos">Überspringen</a></p>
            </form>
        </div>
    </div>
</div>