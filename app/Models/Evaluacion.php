<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    public $table = 'evaluaciones';
    public $timestamps = true;
    
    protected $fillable = [
        'calificacion',
        'user_id',
        'pregunta_id',
        'personas_id',
    ];

    public function pregunta()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function persona()
    {
        return $this->belongsTo(Pregunta::class, 'persona_id', 'id');
    }

}
