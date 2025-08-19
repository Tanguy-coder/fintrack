<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $fillable = [
        'matricule',
        'nom',
        'prenom',
        'email',
        'telephone',
        'poste',
        'actif',
        'salaire',
    ];

    /**
     * Get the full name of the employee.
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->prenom} {$this->nom}";
    }
    /**
     * Scope a query to only include active employees.
     */
    public function scopeActive($query)
    {
        return $query->where('actif', true);
    }

}
