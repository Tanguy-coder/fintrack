<?php

namespace App\Repositories;

use App\Gateway\RapportRepositoryInterface;
use App\Models\Sortie;
use Illuminate\Database\Eloquent\Collection;

class RapportRepository implements RapportRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getDepensesParTypeEntreDates(string $dateDebut, string $dateFin, ?int $typeSortieId = null): Collection
    {
        // Convertir les dates en début et fin de journée
        $startDate = \Carbon\Carbon::parse($dateDebut)->startOfDay();
        $endDate = \Carbon\Carbon::parse($dateFin)->endOfDay();

        $query = Sortie::whereBetween('date', [$startDate, $endDate])
            ->with(['typeSortie', 'caisse', 'user']);

        if ($typeSortieId) {
            $query->where('type_sortie_id', $typeSortieId);
        }

        return $query->get();
    }

    public function getSalairesEntreDates(string $dateDebut, string $dateFin): Collection
    {
        // Convertir les dates en début et fin de journée
        $startDate = \Carbon\Carbon::parse($dateDebut)->startOfDay();
        $endDate = \Carbon\Carbon::parse($dateFin)->endOfDay();

        return \App\Models\Salaire::whereBetween('mois', [$startDate, $endDate])
            ->with(['employe', 'assurance'])
            ->get();
    }

    public function getDepensesParTypeGroupeEntreDates(string $dateDebut, string $dateFin, ?int $typeSortieId = null): Collection
    {
        // dd($typeSortieId);
        // Convertir les dates en début et fin de journée
        $startDate = \Carbon\Carbon::parse($dateDebut)->startOfDay();
        $endDate = \Carbon\Carbon::parse($dateFin)->endOfDay();

        $query = Sortie::whereBetween('date', [$startDate, $endDate])
            ->with(['typeSortie', 'caisse', 'user'])
            ->join('type_sorties', 'sorties.type_sortie_id', '=', 'type_sorties.id')
            ->where('sorties.type_operation', $typeSortieId)
            ->groupBy('sorties.type_sortie_id', 'type_sorties.numero_compte')
            ->selectRaw('sorties.type_sortie_id, type_sorties.numero_compte, SUM(sorties.montant) as montant, type_sorties.libelle')
            ->get();

        return $query;
    // return Sortie::whereBetween('date', [$startDate, $endDate])
    }

    public function getSalairesGroupeEntreDates(string $dateDebut, string $dateFin): Collection
    {
        // Convertir les dates en début et fin de journée
        $startDate = \Carbon\Carbon::parse($dateDebut)->startOfDay();
        $endDate = \Carbon\Carbon::parse($dateFin)->endOfDay();

        return \App\Models\Salaire::whereBetween('mois', [$startDate, $endDate])
            ->with(['employe', 'assurance'])
            ->groupBy('mois')
            ->selectRaw('mois, SUM(salaire_brut) as salaire_brut, SUM(cotisations_employeur) as cotisation_employeur, SUM(salaire_net) as salaire_net')
            ->get();
    }

    public function getDatasEntreDates(array $types, string $dateDebut, string $dateFin)
    {
        $depenses = null;
        $entrees = null;
        $salaires = null;

        foreach ($types as $t) {
            // Comme chaque $t est du genre [0 => "1"], on prend la première valeur
            $val = (int) $t[0];

            if ($val === 2) {
                $depenses = $this->getDepensesParTypeGroupeEntreDates($dateDebut, $dateFin,$val);

            } elseif ($val === 1) {
                $entrees = $this->getDepensesParTypeGroupeEntreDates($dateDebut, $dateFin, $val);

            } elseif ($val === 3) {
                $salaires = $this->getSalairesGroupeEntreDates($dateDebut, $dateFin);
            }
        }

        // dd(collect([
        //     'depenses' => $depenses,
        //     'entrees'  => $entrees,
        //     'salaires' => $salaires,
        // ]));
        return collect([
            'depenses' => $depenses,
            'entrees'  => $entrees,
            'salaires' => $salaires,
        ]);
    }


}
