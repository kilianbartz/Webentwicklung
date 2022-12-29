<?php

namespace App\Controllers;

use App\Models\MitgliederModel;

class Login extends BaseController
{
    public function __construct()
    {
        $this->mm = new MitgliederModel();
    }

    public function index()
    {
                return view("templates/header").
        view('login').
        view("templates/footer");
    }
    public function performLogin(){
        if(!isset($_POST['password'])  || !isset($_POST['email']))
            die("Ungültiger Loginvorgang");
        $mitglied = $this->mm->getMitgliederByEmail($_POST['email']);
        if(!$mitglied)  //Mitglied mit dieser Adresse existiert nicht
            die("Nutzer mit dieser E-Mail Adresse existiert nicht.");
        if(!password_verify($_POST['password'], $mitglied['password']))
            die("Ungültiges Passwort.");
        $this->session->set('username', $mitglied['username']);
        $this->session->set('userid', $mitglied['id']);
        return redirect()->to(base_url("public/todos"));
    }
    public function logout(){

    }
}
