<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modalitepaiements extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
    ];
}

