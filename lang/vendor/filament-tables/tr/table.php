<?php

return [

    'column_toggle' => [

        'heading' => 'Sütunlar',

    ],

    'columns' => [

        'text' => [
            'more_list_items' => 've :count daha',
        ],

    ],

    'fields' => [

        'bulk_select_page' => [
            'label' => 'Toplu işlemler için tüm öğeleri seçme/iptal etme.',
        ],

        'bulk_select_record' => [
            'label' => 'Toplu işlemler için öğe :key\'i seçme/iptal etme.',
        ],

        'search' => [
            'label' => 'Ara',
            'placeholder' => 'Ara',
            'indicator' => 'Ara',
        ],

    ],

    'summary' => [

        'heading' => 'Özet',

        'subheadings' => [
            'all' => 'Tüm :label',
            'group' => ':group özeti',
            'page' => 'Bu sayfa',
        ],

        'summarizers' => [

            'average' => [
                'label' => 'Ortalama',
            ],

            'count' => [
                'label' => 'Sayı',
            ],

            'sum' => [
                'label' => 'Toplam',
            ],

        ],

    ],

    'actions' => [

        'disable_reordering' => [
            'label' => 'Kayıtları sıralama işlemini bitir',
        ],

        'enable_reordering' => [
            'label' => 'Kayıtları yeniden sırala',
        ],

        'filter' => [
            'label' => 'Filtrele',
        ],

        'group' => [
            'label' => 'Grupla',
        ],

        'open_bulk_actions' => [
            'label' => 'Toplu işlemler',
        ],

        'toggle_columns' => [
            'label' => 'Sütunları aç/kapat',
        ],

    ],

    'empty' => [

        'heading' => ':model Bulunamadı',

        'description' => ':model oluşturarak başlayın.',

    ],

    'filters' => [

        'actions' => [

            'remove' => [
                'label' => 'Filtreyi kaldır',
            ],

            'remove_all' => [
                'label' => 'Tüm filtreleri kaldır',
                'tooltip' => 'Tüm filtreleri kaldır',
            ],

            'reset' => [
                'label' => 'Sıfırla',
            ],

        ],

        'heading' => 'Filtreler',

        'indicator' => 'Aktif filtreler',

        'multi_select' => [
            'placeholder' => 'Tümü',
        ],

        'select' => [
            'placeholder' => 'Tümü',
        ],

        'trashed' => [

            'label' => 'Silinmiş kayıtlar',

            'only_trashed' => 'Sadece silinmiş kayıtlar',

            'with_trashed' => 'Silinmiş kayıtlarla birlikte',

            'without_trashed' => 'Silinmiş kayıtlar olmadan',

        ],

    ],

    'grouping' => [

        'fields' => [

            'group' => [
                'label' => 'Gruplama',
                'placeholder' => 'Gruplama',
            ],

            'direction' => [

                'label' => 'Gruplama yöntemi',

                'options' => [
                    'asc' => 'Artan',
                    'desc' => 'Azalan',
                ],

            ],

        ],

    ],

    'reorder_indicator' => 'Kayıtları sıralamak için sürükle ve bırak.',

    'selection_indicator' => [

        'selected_count' => '1 kayıt seçildi|:count kayıt seçildi',

        'actions' => [

            'select_all' => [
                'label' => 'Tümünü Seç :count',
            ],

            'deselect_all' => [
                'label' => 'Tümünü Kaldır',
            ],

        ],

    ],

    'sorting' => [

        'fields' => [

            'column' => [
                'label' => 'Şuna göre sırala',
            ],

            'direction' => [

                'label' => 'Sıralama yöntemi',

                'options' => [
                    'asc' => 'Artan',
                    'desc' => 'Azalan',
                ],

            ],

        ],

    ],

];
