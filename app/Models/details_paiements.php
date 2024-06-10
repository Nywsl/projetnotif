<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class details_paiements extends Model
{
    use HasFactory;
    protected $fillable = ['paiement_id'];


    public function paiements()
    {
        return $this->belongsTo(paiements::class);
    }
}
