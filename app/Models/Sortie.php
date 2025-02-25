<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sortie extends Model
{
    use HasFactory;
    protected $fillable = ['libelle', 'type_sortie_id', 'user_id', 'caisse_id', 'date', 'montant'];

    public function typeSortie()
    {
        return $this->belongsTo(TypeSortie::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function caisse()
    {
        return $this->belongsTo(Caisse::class);
    }

}
