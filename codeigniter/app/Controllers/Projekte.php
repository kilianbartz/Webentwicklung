<?php

namespace App\Controllers;

class Projekte extends BaseController
{
    public function index()
    {
        $data['title'] = "Aufgabenplaner: Projekte";
        return view("templates/header").view("templates/standard_open", $data).view('projekte')
            .view('templates/standard_close').view("templates/footer");
    }
}
