<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Thiagoprz\CompositeKey\HasCompositeKey;

class Panier extends Model
{
    use HasCompositeKey;



    protected $primaryKey = ['section', 'modaliteetudiant_id'];


    public function modaliteEtudiants()
    {
        return $this->belongsTo(ModaliteEtudiants::class,'modaliteetudiant_id');
    }



}
