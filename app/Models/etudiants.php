<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModaliteEtudiants;
use Illuminate\Database\Eloquent\Relations\HasMany;

class etudiants extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'contact',
        'matricule',
        'photo',
        'classe_id',
    ];

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }

    public function modaliteetudiants(): HasMany
    {
        return $this->hasMany(ModaliteEtudiants::class, 'etudiant_id');
    }
}
