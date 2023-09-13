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
    {        
        $preguntas = Pregunta::select('descripcion')->get();
        return view('home',compact('preguntas'));
    }
}
