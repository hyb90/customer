<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function view(){
        return view('routes_controlpanel');
    }
    public function home(){
        return view('controlpanel');
    }
}
