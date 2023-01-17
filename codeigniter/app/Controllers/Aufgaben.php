<?php

namespace App\Controllers;

use App\Models\AufgabenModel;
use App\Models\MitgliederModel;
use App\Models\ReiterModel;

class Aufgaben extends BaseController
{
    public function __construct()
    {
        $this->am = new AufgabenModel();
        $this->rm = new ReiterModel();
        $this->mm = new MitgliederModel();
    }

    public function index()
    {
        $data['aufgaben'] = $this->am->getAufgabenMitMitgliedern();
        $data['title'] = "Aufgabenplaner: Aufgaben";
        $data['reiter'] = $this->rm->getReiter();
        $data['mitglieder'] = $this->mm->getMitglieder();
        return view("templates/header").view("templates/standard_open", $data).view('aufgaben', $data)
            .view('templates/standard_close').view("templates/footer");
    }
    public function edit($id){
        $data['aufgaben'] = $this->am->getAufgabenMitMitgliedern();
        $data['title'] = "Aufgabenplaner: Aufgaben";
        $data['reiter'] = $this->rm->getReiter();
        $data['mitglieder'] = $this->mm->getMitglieder();
        $data['editAufgabe'] = $this->am->getAufgabeMitMitgliedern($id);
        return view("templates/header").view("templates/standard_open", $data).view('aufgaben', $data)
            .view('templates/standard_close').view("templates/footer");
    }
    public function new(){
        if(isset($_POST['zust']) && !empty($_POST['zust']))
            $this->am->createAufgabe();
        return redirect()->to(base_url("public/aufgaben"));
    }
    public function update($id){
        $this->am->updateAufgabe($id);
        return redirect()->to(base_url("public/aufgaben"));
    }
    public function remove($id){
        $this->am->deleteAufgabe($id);
        return redirect()->to(base_url("public/aufgaben"));
    }
}
