<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facture extends Model
{
    use HasFactory;
    protected $fillable = ['date_facture',
    'etudiant_id',
    'numero_facture',
    'etat'
];
public function etudiants()
{
    return $this->belongsTo(etudiants::class);
}

}
