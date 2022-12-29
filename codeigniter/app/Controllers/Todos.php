<?php

namespace App\Controllers;

class Todos extends BaseController
{
    public function index()
    {
        $data['mitglieder'] = [
            [
                "username" => "max",
                "name" => "Max Mustermann",
                "email" => "max@mustermann.de",
                "projektid" => 1,
            ],[
                "username" => "petra",
                "name" => "Petra Müller",
                "email" => "petra@mueller.de",
                "projektid" => 2,
            ],
        ];
        $data['todos'] = [
            [
                "reiterid" => 0,
                "text" => "HTML Datei erstellen",
                "beschreibung" => "HTML Datei erstellen",
                "userid" => 0
            ],[
                "reiterid" => 0,
                "text" => "CSS Datei erstellen",
                "beschreibung" => "CSS Datei erstellen",
                "userid" => 0
            ],[
                "reiterid" => 1,
                "text" => "PC einschalten",
                "beschreibung" => "PC einschalten",
                "userid" => 1
            ],[
                "reiterid" => 1,
                "text" => "Kaffee trinken",
                "beschreibung" => "Kaffee trinken",
                "userid" => 1,
            ],[
                "reiterid" => 2,
                "text" => "Für die Uni lernen",
                "beschreibung" => "Für die Uni lernen",
                "userid" => 0
            ],
        ];
        $data['reiter'] =
            [
                [
                    "name" => "ToDo",
                    "beschreibung" => "Dinge die erledigt werden müssen"
                ],[
                "name" => "Erledigt",
                "beschreibung" => "Dinge die erledigt sind"
            ],[
                "name" => "Verschoben",
                "beschreibung" => "Dinge die später erledigt werden"
            ],
            ];

        $data['title'] = "Aufgabenplaner: Todos (aktuelles Projekt)";
        return view("templates/header").view("templates/standard_open", $data).view('todos', $data)
            .view('templates/standard_close').view("templates/footer");
    }
}
