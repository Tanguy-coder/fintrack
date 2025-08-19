<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assurance extends Model
{
    protected $fillable = [
        'nom',
        'rate_employe',
        'rate_employeur',
        'description',
    ];


}
