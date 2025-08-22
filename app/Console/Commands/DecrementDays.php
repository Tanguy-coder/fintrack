<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DecrementDays extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'decrement-days';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $licence = \App\Models\Licence::first();

         if (date('Y-m-d', strtotime($licence->updated_at)) != date('Y-m-d', strtotime(today()))) {
            // Décrémenter le nombre de jours restants
            $licence->jours_restants -= 1;
            $licence->save();

            // Vérifier si la licence est expirée
            if ($licence->jours_restants <= 0) {
                $licence->etat = 0; // Mettre l'état à 0 (inactif)
                $licence->save();
                $this->info('Licence expirée, état mis à 0.');
            } else {
                $this->info('Jours restants mis à jour : ' . $licence->jours_restants);
            }
        } else {
            $this->error('Aucune licence trouvée.');
        }
    }
}
