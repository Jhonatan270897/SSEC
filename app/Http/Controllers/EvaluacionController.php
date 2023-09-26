<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluacion;
use Illuminate\Support\Facades\DB;

class EvaluacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   $diaA=date("Y/m/d");
        $evaluaciones= Evaluacion::select('count(id) as CANT','sum(calificacion) as SUMA','DATE(updated_at) as DIA','pregunta_id')
        ->groupBy('pregunta_id')
        ->groupBy('DIA')->orderBy('DIA','DESC')->get();
        return view('reportes', compact('evaluaciones','diaA'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $evaluacion = new Evaluacion;
        $evaluacion->calificacion = $request->calif;
        $evaluacion->user_id = auth()->id();
        $evaluacion->pregunta_id = 1;
        $evaluacion->save();
        sleep(1);
        return redirect()->route('home');
    }

    public function show(Evaluacion $evaluacion)
    {
        //
    }


    public function edit(Evaluacion $evaluacion)
    {
        //
    }

    public function update(Request $request, Evaluacion $evaluacion)
    {
        //
    }

    public function destroy(Evaluacion $evaluacion)
    {
        //
    }
}
