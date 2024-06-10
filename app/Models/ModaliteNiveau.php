<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModaliteNiveau extends Model
{
    use HasFactory;

    protected $table = 'modalite_niveaux';

    protected $fillable = [
        'echeance',
        'montant',
        'niveaux_id',
    ];

    public function niveau()
    {
        return $this->belongsTo(Niveau::class);
    }
}
