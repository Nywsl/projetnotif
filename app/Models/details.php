<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Thiagoprz\CompositeKey\HasCompositeKey;

class details extends Model
{
    use HasCompositeKey;

    protected $primaryKey = ['facture_id', 'modaliteetudiant_id'];

    public function factures()
    {
        return $this->belongsTo(facture::class);
    }

    public function modaliteEtudiants()
    {
        return $this->belongsTo(ModaliteEtudiants::class);
    }
}
