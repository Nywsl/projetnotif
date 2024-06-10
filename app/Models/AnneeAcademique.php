<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnneeAcademique extends Model
{
    use HasFactory;
    protected $table = 'annee_academiques';

    protected $fillable = [
        'debut',
        'fin',
        'date_debut',
        'date_fin',
        'description',
        'actif',
    ];

    protected $casts = [
        'actif' => 'boolean',
    ];
}

