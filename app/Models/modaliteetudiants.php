<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModaliteEtudiants extends Model
{
    use HasFactory;
    protected $table = 'modaliteetudiants';
    protected $fillable = [
        'echeance',
        'montant',
        'sms_envoye',
        'date_sms',
        'etat',
        'etudiant_id',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiants::class, 'etudiant_id');
    }
}
