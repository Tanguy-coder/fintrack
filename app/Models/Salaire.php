<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Rmunate\Utilities\SpellNumber;

use function PHPUnit\Framework\returnSelf;

class Salaire extends Model
{
    protected $guarded = ['id'];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }

    public function assurance()
    {
        return $this->belongsTo(Assurance::class);
    }

    public function date_to_mois()
    {
        return Carbon::parse($this->mois)->format('Y-m');
    }

    public static function getModesPaiements()
    {
        return collect([
            ['id' => 1, 'libelle' => 'Virement bancaire'],
            ['id' => 2, 'libelle' => 'Chèque'],
            ['id' => 3, 'libelle' => 'Espèces'],
            ['id' => 4, 'libelle' => 'Mobile Money']
        ])->map(function ($item) {
            return (object) $item;
        });
    }

    public function getModePaiementLibelleAttribute()
    {
        $mode = self::getModesPaiements()->firstWhere('id', $this->mode_paiement_id, $this->mode_paiement);
        return $mode ? $mode->libelle : null;
    }

    public function getFrencDateAttribute()
    {
       return Carbon::parse($this->mois)->locale('fr')->translatedFormat('F Y');
    }

    public function getAmountToWordAttribute()
    {
       return SpellNumber::value(round($this->salaire_net))->locale('fr')->toLetters();
    }

}
