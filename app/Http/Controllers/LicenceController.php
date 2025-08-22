<?php

namespace App\Http\Controllers;

use App\Models\Sortie;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LicenceController extends Controller
{
    public function index()
    {
         // Récupération des données pour la page d'accueil
        $depAuj = Sortie::whereDate('date', now())->sum('montant');
        $depMois = Sortie::whereMonth('date', now())->sum('montant');
        $depAnnee = Sortie::whereYear('date', now())->sum('montant');
        $depTotal = Sortie::sum('montant');

        // Préparer les données pour le graphique des dépenses par mois
        $chartLabels = [];
        $chartDepenseData = [];
        $chartRecetteData = [];
        for ($i = 1; $i <= 12; $i++) {
            $chartLabels[] = Carbon::create()->month($i)->format('F');
            $chartRecetteData[] = Sortie::where('type_operation',1)->whereMonth('date', $i)->whereYear('date', Carbon::now()->year)->sum('montant');
            $chartDepenseData[] = Sortie::where('type_operation',2)->whereMonth('date', $i)->whereYear('date', Carbon::now()->year)->sum('montant');
        }
        return view('welcome', compact('depAuj', 'depMois', 'depAnnee', 'depTotal','chartLabels', 'chartDepenseData', 'chartRecetteData'));
    }

}
