<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectContoller extends Controller
{
    public function index()
    {
        return view('projects');
    }
}
