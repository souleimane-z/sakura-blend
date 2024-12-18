<?php
// Configuration des horaires d'ouverture
$horaires = [
    'Lundi' => [
        'midi' => ['11:30', '14:30'],
        'soir' => ['18:30', '22:30']
    ],
    'Mardi' => [
        'midi' => ['11:30', '14:30'],
        'soir' => ['18:30', '22:30']
    ],
    'Mercredi' => [
        'midi' => ['11:30', '14:30'],
        'soir' => ['18:30', '22:30']
    ],
    'Jeudi' => [
        'midi' => ['11:30', '14:30'],
        'soir' => ['18:30', '22:30']
    ],
    'Vendredi' => [
        'midi' => ['11:30', '14:30'],
        'soir' => ['18:30', '23:00']
    ],
    'Samedi' => [
        'midi' => ['11:30', '14:30'],
        'soir' => ['18:30', '23:00']
    ],
    'Dimanche' => false // Fermé
];

// Fonction pour générer les créneaux de 30 minutes
function getCreneauxDisponibles($jour) {
    global $horaires;

    $creneaux = [];
    $jourSemaine = date('l', strtotime($jour));
    $francaisJours = [
        'Monday' => 'Lundi',
        'Tuesday' => 'Mardi',
        'Wednesday' => 'Mercredi',
        'Thursday' => 'Jeudi',
        'Friday' => 'Vendredi',
        'Saturday' => 'Samedi',
        'Sunday' => 'Dimanche'
    ];

    $jourFr = $francaisJours[$jourSemaine];

    if($horaires[$jourFr] === false) {
        return [];
    }

    foreach(['midi', 'soir'] as $service) {
        if(isset($horaires[$jourFr][$service])) {
            $debut = strtotime($horaires[$jourFr][$service][0]);
            $fin = strtotime($horaires[$jourFr][$service][1]);

            for($time = $debut; $time <= $fin - 1800; $time += 1800) {
                $creneaux[] = date('H:i', $time);
            }
        }
    }

    return $creneaux;
}
?>