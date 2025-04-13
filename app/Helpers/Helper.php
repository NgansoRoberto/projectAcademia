<?php

use Illuminate\Support\Carbon;

    if (!function_exists('toast_success')) {
        function toast_success($message)
        {
            session()->flash('toast', [
                'type' => 'success',
                'message' => $message,
                'toastClass' => 'custom-toast-success',
            ]);
        }
    }
    if (!function_exists('toast_success_img')) {
        function toast_success_img($message)
        {
            session()->flash('toast', [
                'type' => 'success',
                'message' => $message,
                'toastClass' => 'custom-toast-success',

            ]);
        }
    }
    if (!function_exists('toast_error')) {
        function toast_error($message)
        {
            session()->flash('toast', [
                'type' => 'error',
                'message' => $message,
                'toastClass' => 'custom-toast-success',
            ]);
        }
    }

    if (!function_exists('toast_info')) {
        function toast_info($message)
        {
            session()->flash('toast', [
                'type' => 'info',
                'message' => $message,
                'toastClass' => 'custom-toast-success',
            ]);
        }
    }

    if (!function_exists('sweet_alert_success')) {
        function sweet_alert_success($message)
        {
            session()->flash('sweet_alert', [
                'type' => 'success',
                'message' => $message,
                'toastClass' => 'custom-toast-success',
            ]);
        }
    }

    if (!function_exists('get_initials')) {
        function get_initials($fullName)
        {
            // Séparer le nom complet en parties (prénom et nom)
            $nameParts = explode(' ', $fullName);

            // Vérifier s'il y a au moins deux parties
            // if (count($nameParts) < 2) {
            //     $firstNameInitial = substr($nameParts[0], 0, 1);
            //     $firstNameInitial2 = substr($nameParts[0], 1, 1);
            //     return strtoupper($firstNameInitial);
            // }

            // Récupérer la première lettre du prénom et du nom
            $firstNameInitial = substr($nameParts[0], 0, 1);
            // $lastNameInitial = substr($nameParts[1], 0, 1);

            // Combiner les initiales et les convertir en majuscules
            return strtoupper($firstNameInitial);
        }
    }
    if (!function_exists('Ladate')) {
        function Ladate($ladate) {
            $mois = ['Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Decembre'];
            // $mois = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            $ladate = new DateTime($ladate);
            return $ladate->format('d').' '.$mois[$ladate->format('m')-1].' '.$ladate->format('Y');
        }
    }
    if (!function_exists('Ladate_heure')) {
        function Ladate_heure($ladate) {
            $mois = ['Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Decembre'];
            $ladate = new DateTime($ladate);
            return $ladate->format('d ').$mois[$ladate->format('m')-1].$ladate->format(' Y').' à '.$ladate->format(' H').'h'.$ladate->format(' i').'min';
        }
    }
    function getCodeColor($userId)
    {
        $colors = [
            '#FF5630', '#FF8B00', '#FFC400', '#36B37E',
            '#00B8D9', '#6554C0', '#8777D9', '#998DD9',
            '#4C9AFF', '#2684FF', '#0065FF', '#57D9A3'
        ];
        return $colors[$userId % count($colors)];
    }

   