<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeanceCour extends Model
{
    use HasFactory;

    protected $table = 'seances_cours';

    protected $fillable = [
        'cours_id',
        'numero_seance',
        'date_seance',
        'heure_debut',
        'heure_fin',
        'duree_seance',
        'statut',
    ];

    public function cour()
    {
        return $this->belongsTo(Cours::class, 'cours_id');
    }

     //function pour creee automatiquement les seances d'un cour
    /**
     * @param int $coursId
     * @param int $nombreSeances
     * @param string $frequence
     * @param string $dateDebut
     * @param int $jourSemaine
     * @param string $heureDebut
     * @param float $dureeSeance
     * @return array
     */
    public static function genererSeances($coursId, $nombreSeances, $frequence, $dateDebut, $jourSemaine, $heureDebut, $dureeSeance)
    {
        $seances = [];
        $currentDate = Carbon::parse($dateDebut);


        $dayDiff = $jourSemaine - $currentDate->dayOfWeek;
        if ($dayDiff > 0) {
            $currentDate->addDays($dayDiff);
        } else if ($dayDiff < 0) {
            $currentDate->addDays(7 + $dayDiff);
        }


        $heureDebutCarbon = Carbon::parse($heureDebut);
        $heureFinCarbon = (clone $heureDebutCarbon)->addHours($dureeSeance);
        $heureFin = $heureFinCarbon->format('H:i');

        for ($i = 0; $i < $nombreSeances; $i++) {
            $seance = [
                'cours_id' => $coursId,
                'numero_seance' => $i + 1,
                'date_seance' => $currentDate->format('Y-m-d'),
                'duree_seance' => $dureeSeance,
                'heure_debut' => $heureDebut,
                'heure_fin' => $heureFin,
            ];

            $seances[] = $seance;


            if ($frequence === 'weekly') {
                $currentDate->addDays(7);
            } else if ($frequence === 'biweekly') {
                $currentDate->addDays(14);
            }
        }

        return $seances;
    }
}