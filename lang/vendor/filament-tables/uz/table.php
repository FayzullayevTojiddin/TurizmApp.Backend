<?php

return [

    'column_manager' => [

        'heading' => 'Ustunlar',

        'actions' => [

            'apply' => [
                'label' => 'Ustunlarni qo\'llash',
            ],

            'reset' => [
                'label' => 'Qayta o\'rnatish',
            ],

        ],

    ],

    'columns' => [

        'actions' => [
            'label' => 'Amal|Amallar',
        ],

        'select' => [

            'loading_message' => 'Yuklanmoqda...',

            'no_options_message' => 'Variantlar mavjud emas.',

            'no_search_results_message' => 'Qidiruvingizga mos variant topilmadi.',

            'placeholder' => 'Variantni tanlang',

            'searching_message' => 'Qidirilmoqda...',

            'search_prompt' => 'Qidirish uchun yozing...',

        ],

        'text' => [

            'actions' => [
                'collapse_list' => ':counttadan kamroq ko\'rsatish',
                'expand_list' => ':counttadan ko\'proq ko\'rsatish',
            ],

            'more_list_items' => 'va :counttadan ko\'proq',

        ],

    ],

    'fields' => [

        'bulk_select_page' => [
            'label' => 'Ommaviy amallar uchun tanlash/bekor qilish.',
        ],

        'bulk_select_record' => [
            'label' => ':key elementi ommaviy harakatlari uchun tanlash/bekor qilish.',
        ],

        'bulk_select_group' => [
            'label' => ':title guruhi uchun tanlash/bekor qilish.',
        ],

        'search' => [
            'label' => 'Qidirish',
            'placeholder' => 'Qidirish',
            'indicator' => 'Qidirish',
        ],

    ],

    'summary' => [

        'heading' => 'Xulosa',

        'subheadings' => [
            'all' => 'Barcha :label',
            'group' => ':group xulosa',
            'page' => 'Ushbu sahifa',
        ],

        'summarizers' => [

            'average' => [
                'label' => 'O\'rtacha',
            ],

            'count' => [
                'label' => 'Soni',
            ],

            'sum' => [
                'label' => 'Jami',
            ],

        ],

    ],

    'actions' => [

        'disable_reordering' => [
            'label' => 'Qayta tartiblashni tugatish',
        ],

        'enable_reordering' => [
            'label' => 'Qayta tartiblash',
        ],

        'filter' => [
            'label' => 'Filtrlash',
        ],

        'group' => [
            'label' => 'Guruhlash',
        ],

        'open_bulk_actions' => [
            'label' => 'Ommaviy amallar',
        ],

        'column_manager' => [
            'label' => 'Ustunlar',
        ],

    ],

    'empty' => [

        'heading' => ':model mavjud emas',

        'description' => 'Boshlash uchun :model yarating',

    ],

    'filters' => [

        'actions' => [

            'apply' => [
                'label' => 'Filtrlarni qo\'llash',
            ],

            'remove' => [
                'label' => 'Filtrni olib tashlash',
            ],

            'remove_all' => [
                'label' => 'Barcha filtrlarni olib tashlash',
                'tooltip' => 'Barcha filtrlarni olib tashlash',
            ],

            'reset' => [
                'label' => 'Qayta o\'rnatish',
            ],

        ],

        'heading' => 'Filtrlar',

        'indicator' => 'Faol filtrlar',

        'multi_select' => [
            'placeholder' => 'Barchasi',
        ],

        'select' => [

            'placeholder' => 'Barchasi',

            'relationship' => [
                'empty_option_label' => 'Hech qaysi',
            ],

        ],

        'trashed' => [

            'label' => 'O\'chirilgan yozuvlar',

            'only_trashed' => 'Faqat o\'chirilgan yozuvlar',

            'with_trashed' => 'O\'chirilgan yozuvlar bilan',

            'without_trashed' => 'O\'chirilgan yozuvlarsiz',

        ],

    ],

    'grouping' => [

        'fields' => [

            'group' => [
                'label' => 'Guruhlash',
                'placeholder' => 'Guruhlash',
            ],

            'direction' => [

                'label' => 'Guruh yo\'nalishi',

                'options' => [
                    'asc' => 'O\'sish tartibida',
                    'desc' => 'Kamayish tartibida',
                ],

            ],

        ],

    ],

    'reorder_indicator' => 'Yozuvlarni tartibga solish uchun sudrab olib tashlang.',

    'selection_indicator' => [

        'selected_count' => '1 ta yozuv tanlangan|:count ta yozuv tanlangan',

        'actions' => [

            'select_all' => [
                'label' => 'Barcha :count tani tanlash',
            ],

            'deselect_all' => [
                'label' => 'Barchasini bekor qilish',
            ],

        ],

    ],

    'sorting' => [

        'fields' => [

            'column' => [
                'label' => 'Saralash',
            ],

            'direction' => [

                'label' => 'Saralash yo\'nalishi',

                'options' => [
                    'asc' => 'O\'sish tartibida',
                    'desc' => 'Kamayish tartibida',
                ],

            ],

        ],

    ],

    'default_model_label' => 'yozuv',

];
