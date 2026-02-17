<?php

return [

    'builder' => [

        'actions' => [

            'clone' => [
                'label' => 'Nusxalash',
            ],

            'add' => [

                'label' => ':labelga qo\'shish',

                'modal' => [

                    'heading' => ':labelga qo\'shish',

                    'actions' => [

                        'add' => [
                            'label' => 'Qo\'shish',
                        ],

                    ],

                ],

            ],

            'add_between' => [

                'label' => 'Orasiga kiritish',

                'modal' => [

                    'heading' => ':labelga qo\'shish',

                    'actions' => [

                        'add' => [
                            'label' => 'Qo\'shish',
                        ],

                    ],

                ],

            ],

            'delete' => [
                'label' => 'O\'chirish',
            ],

            'edit' => [

                'label' => 'Tahrirlash',

                'modal' => [

                    'heading' => 'Tahrirlash',

                    'actions' => [

                        'save' => [
                            'label' => 'O\'zgarishlarni saqlash',
                        ],

                    ],

                ],

            ],

            'reorder' => [
                'label' => 'Ko\'chirish',
            ],

            'move_down' => [
                'label' => 'Pastga ko\'chirish',
            ],

            'move_up' => [
                'label' => 'Yuqoriga ko\'chirish',
            ],

            'collapse' => [
                'label' => 'Yig\'ish',
            ],

            'expand' => [
                'label' => 'Yoyish',
            ],

            'collapse_all' => [
                'label' => 'Barchasini yig\'ish',
            ],

            'expand_all' => [
                'label' => 'Barchasini yoyish',
            ],

        ],

    ],

    'checkbox_list' => [

        'actions' => [

            'deselect_all' => [
                'label' => 'Barchasini bekor qilish',
            ],

            'select_all' => [
                'label' => 'Barchasini tanlash',
            ],

        ],

    ],

    'file_upload' => [

        'editor' => [

            'actions' => [

                'cancel' => [
                    'label' => 'Bekor qilish',
                ],

                'drag_crop' => [
                    'label' => 'Kesish rejimi',
                ],

                'drag_move' => [
                    'label' => 'Ko\'chirish rejimi',
                ],

                'flip_horizontal' => [
                    'label' => 'Gorizontal aylantirish',
                ],

                'flip_vertical' => [
                    'label' => 'Vertikal aylantirish',
                ],

                'move_down' => [
                    'label' => 'Pastga ko\'chirish',
                ],

                'move_left' => [
                    'label' => 'Chapga ko\'chirish',
                ],

                'move_right' => [
                    'label' => 'O\'ngga ko\'chirish',
                ],

                'move_up' => [
                    'label' => 'Yuqoriga ko\'chirish',
                ],

                'reset' => [
                    'label' => 'Qayta o\'rnatish',
                ],

                'rotate_left' => [
                    'label' => 'Chapga burish',
                ],

                'rotate_right' => [
                    'label' => 'O\'ngga burish',
                ],

                'set_aspect_ratio' => [
                    'label' => 'Aspekt nisbati :ratio',
                ],

                'save' => [
                    'label' => 'Saqlash',
                ],

                'zoom_100' => [
                    'label' => '100% gacha kattalashtirish',
                ],

                'zoom_in' => [
                    'label' => 'Kattalashtirish',
                ],

                'zoom_out' => [
                    'label' => 'Kichiklashtirish',
                ],

            ],

            'fields' => [

                'height' => [
                    'label' => 'Balandlik',
                    'unit' => 'px',
                ],

                'rotation' => [
                    'label' => 'Aylanish',
                    'unit' => 'gradus',
                ],

                'width' => [
                    'label' => 'Kenglik',
                    'unit' => 'px',
                ],

                'x_position' => [
                    'label' => 'X',
                    'unit' => 'px',
                ],

                'y_position' => [
                    'label' => 'Y',
                    'unit' => 'px',
                ],

            ],

            'aspect_ratios' => [

                'label' => 'Aspekt nisbatlari',

                'no_fixed' => [
                    'label' => 'Erkin',
                ],

            ],

            'svg' => [

                'messages' => [
                    'confirmation' => 'SVG fayllarni tahrirlash tavsiya etilmaydi, chunki masshtab o\'tkazishda sifat yo\'qolishi mumkin.\n Davom etishni xohlaysizmi?',
                    'disabled' => 'SVG fayllarini tahrirlash bloklangan, chunki masshtab o\'zgartirishda sifat yo\'qolishi mumkin.',
                ],

            ],

        ],

    ],

    'key_value' => [

        'actions' => [

            'add' => [
                'label' => 'Qator qo\'shish',
            ],

            'delete' => [
                'label' => 'Qatorni o\'chirish',
            ],

            'reorder' => [
                'label' => 'Qatorni ko\'chirish',
            ],

        ],

        'fields' => [

            'key' => [
                'label' => 'Kalit so\'z',
            ],

            'value' => [
                'label' => 'Qiymat',
            ],

        ],

    ],

    'markdown_editor' => [

        'file_attachments_accepted_file_types_message' => 'Yuklangan fayllar quyidagi turda bo\'lishi kerak: :values.',

        'file_attachments_max_size_message' => 'Yuklangan fayllar :max kilobaytdan oshmasligi kerak.',

        'tools' => [
            'attach_files' => 'Fayl biriktirish',
            'blockquote' => 'Iqtibos',
            'bold' => 'Qalin',
            'bullet_list' => 'Nuqtali ro\'yxat',
            'code_block' => 'Kod bloki',
            'heading' => 'Sarlavha',
            'italic' => 'Kursiv',
            'link' => 'Havola',
            'ordered_list' => 'Raqamli ro\'yxat',
            'redo' => 'Qaytarish',
            'strike' => 'Chizilgan',
            'table' => 'Jadval',
            'undo' => 'Bekor qilish',
        ],

    ],

    'modal_table_select' => [

        'actions' => [

            'select' => [

                'label' => 'Tanlash',

                'actions' => [

                    'select' => [
                        'label' => 'Tanlash',
                    ],

                ],

            ],

        ],

    ],

    'radio' => [

        'boolean' => [
            'true' => 'Ha',
            'false' => 'Yo\'q',
        ],

    ],

    'repeater' => [

        'actions' => [

            'add' => [
                'label' => ':label qo\'shish',
            ],

            'add_between' => [
                'label' => 'Orasiga qo\'shish',
            ],

            'delete' => [
                'label' => 'O\'chirish',
            ],

            'clone' => [
                'label' => 'Nusxalash',
            ],

            'reorder' => [
                'label' => 'Ko\'chirish',
            ],

            'move_down' => [
                'label' => 'Pastga ko\'chirish',
            ],

            'move_up' => [
                'label' => 'Yuqoriga ko\'chirish',
            ],

            'collapse' => [
                'label' => 'Yig\'ish',
            ],

            'expand' => [
                'label' => 'Yoyish',
            ],

            'collapse_all' => [
                'label' => 'Barchasini yig\'ish',
            ],

            'expand_all' => [
                'label' => 'Barchasini yoyish',
            ],

        ],

    ],

    'rich_editor' => [

        'actions' => [

            'attach_files' => [

                'label' => 'Fayl yuklash',

                'modal' => [

                    'heading' => 'Fayl yuklash',

                    'form' => [

                        'file' => [

                            'label' => [
                                'new' => 'Fayl',
                                'existing' => 'Faylni almashtirish',
                            ],

                        ],

                        'alt' => [

                            'label' => [
                                'new' => 'Alt matn',
                                'existing' => 'Alt matnni o\'zgartirish',
                            ],

                        ],

                    ],

                ],

            ],

            'custom_block' => [

                'modal' => [

                    'actions' => [

                        'insert' => [
                            'label' => 'Kiritish',
                        ],

                        'save' => [
                            'label' => 'Saqlash',
                        ],

                    ],

                ],

            ],

            'grid' => [

                'label' => 'Tarmoq',

                'modal' => [

                    'heading' => 'Tarmoq',

                    'form' => [

                        'preset' => [

                            'label' => 'Shablon',

                            'placeholder' => 'Hech qaysi',

                            'options' => [
                                'two' => 'Ikkita',
                                'three' => 'Uchta',
                                'four' => 'To\'rtta',
                                'five' => 'Beshta',
                                'two_start_third' => 'Ikkita (Boshida uchdan biri)',
                                'two_end_third' => 'Ikkita (Oxirida uchdan biri)',
                                'two_start_fourth' => 'Ikkita (Boshida to\'rtdan biri)',
                                'two_end_fourth' => 'Ikkita (Oxirida to\'rtdan biri)',
                            ],
                        ],

                        'columns' => [
                            'label' => 'Ustunlar',
                        ],

                        'from_breakpoint' => [

                            'label' => 'Boshlang\'ich nuqta',

                            'options' => [
                                'default' => 'Barchasi',
                                'sm' => 'Kichik',
                                'md' => 'O\'rta',
                                'lg' => 'Katta',
                                'xl' => 'Juda katta',
                                '2xl' => 'Eng katta',
                            ],

                        ],

                        'is_asymmetric' => [
                            'label' => 'Ikkita nosimmetrik ustun',
                        ],

                        'start_span' => [
                            'label' => 'Boshlang\'ich kengligi',
                        ],

                        'end_span' => [
                            'label' => 'Oxirgi kengligi',
                        ],

                    ],

                ],

            ],

            'link' => [

                'label' => 'Havola',

                'modal' => [

                    'heading' => 'Havola',

                    'form' => [

                        'url' => [
                            'label' => 'URL',
                        ],

                        'should_open_in_new_tab' => [
                            'label' => 'Yangi oynada ochish',
                        ],

                    ],

                ],

            ],

            'text_color' => [

                'label' => 'Matn rangi',

                'modal' => [

                    'heading' => 'Matn rangi',

                    'form' => [

                        'color' => [
                            'label' => 'Rang',
                        ],

                        'custom_color' => [
                            'label' => 'Maxsus rang',
                        ],

                    ],

                ],

            ],

        ],

        'dialogs' => [

            'link' => [

                'actions' => [
                    'link' => 'Havola',
                    'unlink' => 'Havolani o\'chirish',
                ],

                'label' => 'URL',

                'placeholder' => 'URLni kiriting',

            ],

        ],

        'file_attachments_accepted_file_types_message' => 'Yuklangan fayllar quyidagi turda bo\'lishi kerak: :values.',

        'file_attachments_max_size_message' => 'Yuklangan fayllar :max kilobaytdan oshmasligi kerak.',

        'no_merge_tag_search_results_message' => 'Birlashtirish teglariga mos natija topilmadi.',

        'mentions' => [
            'no_options_message' => 'Variantlar mavjud emas.',
            'no_search_results_message' => 'Qidiruvingizga mos natija topilmadi.',
            'search_prompt' => 'Qidirish uchun yozing...',
            'searching_message' => 'Qidirilmoqda...',
        ],

        'tools' => [
            'align_center' => 'Markazga tekislash',
            'align_end' => 'Oxiriga tekislash',
            'align_justify' => 'Kengligi bo\'yicha tekislash',
            'align_start' => 'Boshiga tekislash',
            'attach_files' => 'Fayl biriktirish',
            'blockquote' => 'Iqtibos',
            'bold' => 'Qalin',
            'bullet_list' => 'Nuqtali ro\'yxat',
            'clear_formatting' => 'Formatlashni tozalash',
            'code' => 'Kod',
            'code_block' => 'Kod bloki',
            'custom_blocks' => 'Bloklar',
            'details' => 'Tafsilotlar',
            'h1' => 'Sarlavha',
            'h2' => 'Kichik sarlavha',
            'h3' => 'Pastki sarlavha',
            'grid' => 'Tarmoq',
            'grid_delete' => 'Tarmoqni o\'chirish',
            'highlight' => 'Belgilash',
            'horizontal_rule' => 'Gorizontal chiziq',
            'italic' => 'Kursiv',
            'lead' => 'Asosiy matn',
            'link' => 'Havola',
            'merge_tags' => 'Birlashtirish teglari',
            'ordered_list' => 'Raqamli ro\'yxat',
            'redo' => 'Qaytarish',
            'small' => 'Kichik matn',
            'strike' => 'Chizilgan',
            'subscript' => 'Pastki yozuv',
            'superscript' => 'Ustki yozuv',
            'table' => 'Jadval',
            'table_delete' => 'Jadvalni o\'chirish',
            'table_add_column_before' => 'Oldin ustun qo\'shish',
            'table_add_column_after' => 'Keyin ustun qo\'shish',
            'table_delete_column' => 'Ustunni o\'chirish',
            'table_add_row_before' => 'Yuqoriga qator qo\'shish',
            'table_add_row_after' => 'Pastga qator qo\'shish',
            'table_delete_row' => 'Qatorni o\'chirish',
            'table_merge_cells' => 'Katakchalarni birlashtirish',
            'table_split_cell' => 'Katakchani bo\'lish',
            'table_toggle_header_row' => 'Sarlavha qatorini almashtirish',
            'table_toggle_header_cell' => 'Sarlavha katakchani almashtirish',
            'text_color' => 'Matn rangi',
            'underline' => 'Pastki chiziq',
            'undo' => 'Bekor qilish',
        ],

        'uploading_file_message' => 'Fayl yuklanmoqda...',

    ],

    'select' => [

        'actions' => [

            'create_option' => [

                'label' => 'Yaratish',

                'modal' => [

                    'heading' => 'Yaratish',

                    'actions' => [

                        'create' => [
                            'label' => 'Yaratish',
                        ],

                        'create_another' => [
                            'label' => 'Yaratish va yana boshqa yaratish',
                        ],

                    ],

                ],

            ],

            'edit_option' => [

                'label' => 'Tahrirlash',

                'modal' => [

                    'heading' => 'Tahrirlash',

                    'actions' => [

                        'save' => [
                            'label' => 'Saqlash',
                        ],

                    ],

                ],

            ],

        ],

        'boolean' => [
            'true' => 'Ha',
            'false' => 'Yo\'q',
        ],

        'loading_message' => 'Yuklanmoqda...',

        'max_items_message' => 'Faqat :count ta tanlash mumkin.',

        'no_options_message' => 'Variantlar mavjud emas.',

        'no_search_results_message' => 'Qidiruvingizga mos variant topilmadi.',

        'placeholder' => 'Variant tanlang',

        'searching_message' => 'Qidirilmoqda...',

        'search_prompt' => 'Qidirish uchun yozing...',

    ],

    'tags_input' => [

        'actions' => [

            'delete' => [
                'label' => 'O\'chirish',
            ],

        ],

        'placeholder' => 'Yangi teg',

    ],

    'text_input' => [

        'actions' => [

            'copy' => [
                'label' => 'Nusxalash',
                'message' => 'Nusxalandi',
            ],

            'hide_password' => [
                'label' => 'Parolni yashirish',
            ],

            'show_password' => [
                'label' => 'Parolni ko\'rsatish',
            ],

        ],

    ],

    'toggle_buttons' => [

        'boolean' => [
            'true' => 'Ha',
            'false' => 'Yo\'q',
        ],

    ],

];
