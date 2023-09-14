<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pregunta;
use App\Models\Evaluacion;
use DateTime;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $preguntas = Pregunta::select('descripcion')->get();
        return view('home', compact('preguntas'));
    }

    public function store(Request $request)
    {
        $evaluacion = new Evaluacion;
        $evaluacion->calificacion = $request->calif;
        $evaluacion->user_id = auth()->id();
        $evaluacion->pregunta_id = 1;
        $evaluacion->save();
        return redirect()->route('home');
    }
}
