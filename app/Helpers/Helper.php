<?php

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