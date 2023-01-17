<?php

namespace App\Controllers;

use App\Models\MitgliederModel;
use App\Models\ProjekteModel;

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
        $data['login'] = $_POST;
        if(!$this->validation->run($_POST, 'login')){
            $data['error'] = $this->validation->getErrors();
            return view("templates/header").
                view('login', $data).
                view("templates/footer");
        }
        $mitglied = $this->mm->getMitgliederByEmail($_POST['email']);
        if(!$mitglied) {
            $data['other_errors'] = "Nutzer mit dieser E-Mail Adresse existiert nicht.";
            return view("templates/header").
                view('login', $data).
                view("templates/footer");
        } if(!password_verify($_POST['password'], $mitglied['password'])){
            $data['other_errors'] = "Ungültiges Passwort.";
            return view("templates/header").
                view('login', $data).
                view("templates/footer");
        }
        $this->session->set('username', $mitglied['username']);
        $this->session->set('userid', $mitglied['id']);
        $this->session->set('loggedIn', true);
//          Anstatt beim Login die ProjektID in der Session zu speichern, habe ich das Verhalten von
//          todoliste.web-entwicklung.eu imitiert: Nach dem Login landet man auf der Projektseite und kann dort ein
//          Projekt auswählen, was in der Session gespeichert wird. Danach werden die in Ü6_A2 angesprochenen Links eingeblendet
//        $userProject = $this->mm->getUserProject($mitglied['id']);
//        if(!empty($userProject))
//            $this->session->set('projektid', $userProject['projektid']);
//        else {
//            $projektM = new ProjekteModel();
//            $projekt = $projektM->getFirstProjekt();
//            if($projekt) $this->session->set('projektid', $projekt['id']);
//        }
        return redirect()->to(base_url("public/projekte"));
    }
    public function logout(){
        $this->session->destroy();
        return redirect()->to(base_url("public"));
    }
}
