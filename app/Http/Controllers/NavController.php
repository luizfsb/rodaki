<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function estacoes()
    {
        return view('estacoes');
    }

    public function planos()
    {
        return view('planos');
    }

    public function Premium()
    {
        return view('premium');
    }

    public function Standard()
    {
        return view('standard');
    }

    public function Plus()
    {
        return view('plus');
    }
}
