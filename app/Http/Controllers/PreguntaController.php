<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pregunta;

class PreguntaController extends Controller
{
    public $preguntas;
    public function render()
    {
        $this->preguntas = Pregunta::select('description')->get();
        return view('home',compact('preguntas'));
    }
}
