<?php

namespace App\Controllers;

use App\Models\MitgliederModel;

class Mitglieder extends BaseController
{
    public function __construct() {

        $this->mm = new MitgliederModel();

    }
    public function index()
    {
        $data['title'] = "Aufgabenplaner: Mitglieder";
        $data['mitglieder'] = $this->mm->getMitglieder();
        return view("templates/header").view("templates/standard_open", $data).view('mitglieder', $data)
            .view('templates/standard_close').view("templates/footer");
    }
    public function edit($id)
    {
        $data['title'] = "Aufgabenplaner: Mitglieder";
        $data['mitglieder'] = $this->mm->getMitglieder();
        $data['mitglied_edit'] = $this->mm->getMitglieder($id);
        $data['allow_edit_password'] = $id == $this->session->get('userid');


        return view("templates/header").view("templates/standard_open", $data).view('mitglieder', $data)
            .view('templates/standard_close').view("templates/footer");
    }
    public function new(){
        $this->mm->createMitglied();
        return redirect()->to(base_url("public/mitglieder"));
    }
    public function update($id){
        $this->mm->updatePerson($id);
        return redirect()->to(base_url("public/mitglieder"));
    }
    public function remove($id){
        $this->mm->deletePerson($id);
        return redirect()->to(base_url("public/mitglieder"));
    }
}
