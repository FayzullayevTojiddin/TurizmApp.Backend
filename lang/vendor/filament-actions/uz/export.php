<?php

return [

    'label' => ':labelni eksport qilish',

    'modal' => [

        'heading' => ':labelni eksport qilish',

        'form' => [

            'columns' => [

                'label' => 'Ustunlar',

                'form' => [

                    'is_enabled' => [
                        'label' => ':column',
                    ],

                    'label' => [
                        'label' => 'Ustun belgisi',
                    ],

                ],

            ],

        ],

        'actions' => [

            'export' => [
                'label' => 'Eksport qilish',
            ],

        ],

    ],

    'notifications' => [

        'completed' => [

            'title' => 'Eksport yakunlandi',

            'actions' => [

                'download_csv' => [
                    'label' => '.csv yuklash',
                ],

                'download_xlsx' => [
                    'label' => '.xlsx yuklash',
                ],

            ],

        ],

        'max_rows' => [
            'title' => 'Eksport juda katta',
            'body' => 'Bir vaqtning o\'zida :count dan ortiq qatorni eksport qilib bo\'lmaydi.',
        ],

        'started' => [
            'title' => 'Eksport boshlandi',
            'body' => 'Eksportingiz boshlandi va :count ta qator fonda qayta ishlanadi.',
        ],

    ],

    'file_name' => 'eksport-:export_id-:model',

];
