<?php

namespace App\Controllers;

class Projekte extends BaseController
{
    public function index()
    {
        return view("templates/header").view("templates/standard_open").view('projekte')
            .view('templates/standard_close').view("templates/footer");
    }
}
