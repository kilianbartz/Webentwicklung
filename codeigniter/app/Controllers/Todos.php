<?php

namespace App\Controllers;

use App\Models\AufgabenModel;

class Todos extends BaseController
{
    public function __construct()
    {
        $this->am = new AufgabenModel();
    }

    public function index()
    {
        $data['aufgaben'] = $this->am->getAufgabenMitMitgliedern();
        $data['title'] = "Projektübersicht ".$_SESSION['projektname'];
        return view("templates/header").view("templates/standard_open", $data).view('todos', $data)
            .view('templates/standard_close').view("templates/footer");
    }
}
