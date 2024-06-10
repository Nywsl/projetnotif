<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paiements extends Model
{
    use HasFactory;
    protected $fillable = [
        'montant',
        'transaction',
        'etat',
        'observation',
        'etudiant_id',
        'modalitepaiements_id',
    ];

    public function etudiants()
    {
        return $this->belongsTo(Etudiants::class);
    }

    public function modalitePaiements()
    {
        return $this->belongsTo(modalitePaiements::class);
    }
}
