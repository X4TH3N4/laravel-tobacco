<?php

return [

    'title' => 'Giriş',

    'heading' => 'Oturum aç',

    'actions' => [

        'register' => [
            'before' => 'veya',
            'label' => 'bir hesap oluşturun',
        ],

        'request_password_reset' => [
            'label' => 'Şifrenizi mi unuttunuz?',
        ],

    ],

    'form' => [

        'email' => [
            'label' => 'E-posta adresi',
        ],

        'password' => [
            'label' => 'Şifre',
        ],

        'remember' => [
            'label' => 'Beni hatırla',
        ],

        'actions' => [

            'authenticate' => [
                'label' => 'Oturum aç',
            ],

        ],

    ],

    'messages' => [

        'failed' => 'Bu kimlik bilgileri kayıtlarımızla eşleşmiyor.',

    ],

    'notifications' => [

        'throttled' => [
            'title' => 'Çok fazla giriş denemesi',
            'body' => ':seconds saniye içinde tekrar deneyin.',
        ],

    ],

];
