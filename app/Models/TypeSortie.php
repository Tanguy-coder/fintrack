<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeSortie extends Model
{
    protected $fillable = ['libelle','type','numero_compte'];

     public static function getTypeOperationAttribute()
    {
        return collect([
            ['id' => 1, 'libelle' => 'ENTREE'],
            ['id' => 2, 'libelle' => 'SORTIE'],
        ])->map(function ($item) {
            return (object) $item;
        });
    }


}
