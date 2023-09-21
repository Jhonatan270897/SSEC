<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pregunta;

class HomeController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   $cont=0;
        $preguntas = Pregunta::select('id','descripcion')->get();
        return view('home', compact('preguntas','cont'));
    }

    public function store(Request $request)
    {

    }
}
