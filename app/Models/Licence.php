<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Licence extends Model
{
    protected $fillable = ['expired_date', 'etat', 'jours_restants'];
}
