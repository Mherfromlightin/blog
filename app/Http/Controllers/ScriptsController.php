<?php

namespace App\Http\Controllers;

class ScriptsController
{
    public function index()
    {
        return view('scripts.slide', compact('scripts'));
    }

    public function dataTable()
    {
        return view('scripts.dataTable');

    }

    public function articlesTable()
    {
        return view('scripts.articlesTable');
    }

    public function map()
    {
        return view('scripts.map');
    }
}