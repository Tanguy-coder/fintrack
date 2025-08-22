<?php

namespace App\Http\Middleware;

use App\Models\Licence as ModelsLicence;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Licence
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         $license =ModelsLicence::first();

        $today = Carbon::today();
        $expirationDate = Carbon::parse($license->expired_date);
        $oneWeekBeforeExpiration = Carbon::parse($license->expired_date)->subDays(7);

        if ( $today->gte($expirationDate) && $license->etat==0) {

            return redirect()->route('licence')->with('alert-danger','Votre licence est expirée. Veuiller contacter l\'administrateur pour le renouvellement');
        }

        if ($today->gte($expirationDate) && $license->etat == 1) {

            $license->update(['etat' => 0]);


            return redirect()->route('home')->with('alert-danger','Votre licence est expirée. Veuiller contacter l\'administrateur pour le renouvellement');
        }

        if ($license->jours_restants<=0) {

            $license->update(['etat' => 0]);

            return redirect()->route('ogin')->with('alert-danger','Votre licence est expirée. Veuiller contacter l\'administrateur pour le renouvellement');
        }


        // Vérifier si la licence est dans la période d'une semaine avant l'expiration
        if ($today->between($oneWeekBeforeExpiration, $expirationDate)) {
            // Afficher le modal si la date est dans la période d'une semaine avant l'expiration
            // if (auth()->user()->role_id == 1) {
                session(['toaster' => true]);
            // }
        }
        // dd('sortie');

        return $next($request);
    }
    }

