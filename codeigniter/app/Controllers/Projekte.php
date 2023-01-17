<?php

namespace App\Controllers;

use App\Models\MitgliederModel;
use App\Models\ProjekteModel;

class Projekte extends BaseController
{
    public function __construct()
    {
        $this->projektModel = new ProjekteModel();
    }

    public function index()
    {
        $data['title'] = "Aufgabenplaner: Projekte";
        $data['projekte'] = $this->projektModel->getAllProjekte();
        return view("templates/header").view("templates/standard_open", $data).view('projekte')
            .view('templates/standard_close').view("templates/footer");
    }
    public function edit($id){
        $data['title'] = "Aufgabenplaner: Projekte";
        $data['projekte'] = $this->projektModel->getAllProjekte();
        $data['editProjekt'] = $this->projektModel->getProject($id);
        if($this->session->get('projektid') != $id) $data['hide_links'] = true;
        //Ich habe Aufgabe 2b so verstanden, dass die 3 genannten Links des Seitemenues nur ausgeblendet werden sollen,
        // wenn der Nutzer ein Projekt bearbeitet und dieses nicht mit der ProjektID aus der Session uebereinstimmt,
        // ansonsten werden sie immer angezeigt
        return view("templates/header").view("templates/standard_open", $data).view('projekte')
            .view('templates/standard_close').view("templates/footer");
    }
    public function new(){
        $this->projektModel->createProjekt();
        return redirect()->to(base_url("public/projekte"));
    }
    public function update($id){
        $this->projektModel->updateProjekt($id);
        return redirect()->to(base_url("public/projekte"));
    }
    public function remove($id){
        $this->projektModel->deleteProjekt($id);
        if($this->session->get('projektid') == $id) unset($_SESSION['projektid']);
        return redirect()->to(base_url("public/projekte"));
    }
    public function select($id){
        $this->session->set('projektid', $id);
        $this->session->set('projektname', $this->projektModel->getProject($id)['name']);
        return redirect()->to(base_url("public/projekte"));
    }
}
