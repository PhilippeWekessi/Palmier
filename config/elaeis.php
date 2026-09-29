<?php

// Configuration spécifique à Elaeis Prestige.
// Les valeurs modifiables par l'admin (nom, logo, horaires...) seront stockées
// en base (table `settings`). Ce fichier ne contient que les valeurs par défaut / techniques.

return [

    'whatsapp_number' => env('ELAEIS_WHATSAPP_NUMBER', '+22900000000'),
    'phone' => env('ELAEIS_PHONE'),
    'contact_email' => env('ELAEIS_CONTACT_EMAIL'),

    'admin_email' => env('ELAEIS_ADMIN_EMAIL', 'admin@elaeis-prestige.com'),
    'admin_password' => env('ELAEIS_ADMIN_PASSWORD'),

    'order_prefix' => 'EP',

    'order_statuses' => [
        'pending' => 'En attente',
        'confirmed' => 'Confirmée',
        'processing' => 'En préparation',
        'ready' => 'Prête',
        'shipped' => 'Expédiée',
        'delivered' => 'Livrée',
        'cancelled' => 'Annulée',
    ],

    'roles' => [
        'client' => 'client',
        'admin' => 'administrateur',
    ],

    'low_stock_default_threshold' => 5,

];