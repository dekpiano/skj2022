<?php

namespace App\Controllers;

class ConMaintenance extends BaseController
{
    public function index()
    {
        // Simply return the maintenance view
        return view('PageMaintenance/index');
    }
}
