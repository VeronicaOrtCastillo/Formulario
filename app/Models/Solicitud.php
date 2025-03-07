<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitudes'; // Nombre correcto de la tabla

    protected $fillable = [
        'name',
        'email',
        'curp',
        'rfc',
        'clabe',
        'files',
        'status',
        'user_id'
    ];
    
    protected $casts = [
        'files' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
