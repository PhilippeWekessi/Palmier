<?php

// Configuration specifique a Elaeis Prestige.
// Les valeurs modifiables par l'admin (nom, logo, horaires...) sont stockees
// en base (table `settings`) et geree via App\Services\SettingsService.
// Ce fichier ne contient que les valeurs par defaut / techniques.

return [

    'whatsapp_number' => env('ELAEIS_WHATSAPP_NUMBER', '+22900000000'),

    'order_prefix' => 'EP',

    'order_statuses' => [
        'pending' => 'En attente',
        'confirmed' => 'Confirmee',
        'processing' => 'En preparation',
        'ready' => 'Prete',
        'shipped' => 'Expediee',
        'delivered' => 'Livree',
        'cancelled' => 'Annulee',
    ],

    'roles' => [
        'client' => 'client',
        'admin' => 'administrateur',
    ],

    'low_stock_default_threshold' => 5,

];
