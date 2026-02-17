<?php

return [

    'label' => ':labelni import qilish',

    'modal' => [

        'heading' => ':labelni import qilish',

        'form' => [

            'file' => [
                'label' => 'Fayl',
                'placeholder' => 'CSV faylini yuklang',
            ],

            'columns' => [
                'label' => 'Ustunlar',
                'placeholder' => 'Ustunni tanlang',
            ],

        ],

        'actions' => [

            'download_example' => [
                'label' => 'Namuna CSV faylni yuklab oling',
            ],

            'import' => [
                'label' => 'Import qilish',
            ],

        ],

    ],

    'notifications' => [

        'completed' => [

            'title' => 'Import yakunlandi',

            'body' => ':label import qilindi va :success_count ta qator muvaffaqiyatli import qilindi.',

        ],

        'completed_with_failures' => [

            'title' => 'Import yakunlandi',

            'body' => ':label import qilindi, :success_count ta qator muvaffaqiyatli va :failure_count ta qatorda xato.',

        ],

        'max_rows' => [
            'title' => 'Import juda katta',
            'body' => 'Bir vaqtning o\'zida :count dan ortiq qatorni import qilib bo\'lmaydi.',
        ],

        'started' => [
            'title' => 'Import boshlandi',
            'body' => 'Importingiz boshlandi va :count ta qator fonda qayta ishlanadi.',
        ],

    ],

    'example_csv' => [
        'file_name' => ':model-namuna',
    ],

    'failure_csv' => [
        'file_name' => 'import-:import_id-:csv_name-muvaffaqiyatsiz-qatorlar',
        'error_header' => 'xatolik',
        'system_error' => 'Tizim xatosi, yordam xizmatiga murojaat qiling.',
    ],

];
