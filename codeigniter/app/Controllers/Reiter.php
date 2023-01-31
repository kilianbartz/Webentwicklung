<?php

namespace App\Controllers;

use App\Models\ReiterModel;

class Reiter extends BaseController
{
    public function __construct()
    {
        $this->rm = new ReiterModel();
    }

    public function index()
    {
        $data['reiter'] = $this->rm->getReiter();
        $data['title'] = "Aufgabenplaner: Reiter";
        return view("templates/header").view("templates/standard_open", $data).view('reiter', $data)
            .view('templates/standard_close').view("templates/footer");
    }
    public function edit($id)
    {
        $data['title'] = "Aufgabenplaner: Reiter";
        $data['reiter_edit'] = $this->rm->getReiter($id);
        $data['reiter'] = $this->rm->getReiter();


        return view("templates/header").view("templates/standard_open", $data).view('reiter', $data)
            .view('templates/standard_close').view("templates/footer");
    }
    public function new(){
        $this->rm->createReiter();
        return redirect()->to(base_url("public/reiter"));
    }
    public function update($id){
        $this->rm->updateReiter($id);
        return redirect()->to(base_url("public/reiter"));
    }
    public function remove($id){
        $this->rm->deleteReiter($id);
        return redirect()->to(base_url("public/reiter"));
    }
}
