<?php

return [

    'label' => 'Sahifalar navigatsiyasi',

    'overview' => '{1} 1 ta natija ko\'rsatilmoqda|[2,*] :first dan :last gacha, jami :total ta natija',

    'fields' => [

        'records_per_page' => [

            'label' => 'Har sahifada',

            'options' => [
                'all' => 'Barchasi',
            ],

        ],

    ],

    'actions' => [

        'first' => [
            'label' => 'Birinchi',
        ],

        'go_to_page' => [
            'label' => ':page-sahifaga o\'tish',
        ],

        'last' => [
            'label' => 'Oxirgi',
        ],

        'next' => [
            'label' => 'Keyingi',
        ],

        'previous' => [
            'label' => 'Oldingi',
        ],

    ],

];
