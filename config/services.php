<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => '2812402659069257',
        'client_secret' => '3ca4ad86262998101f2783c4a7240728',
        'redirect' => 'https://monolist.io/social/auth/callback/facebook',
    ],

    'google' => [
        'client_id' => '1086884301623-0ku0psbdi7fk9p3oa9vdarnvc140qjn1.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://monolist.io/social/auth/callback/google',
    ],

    'apple' => [
        'App ID' => '7V4W85NG7C.com.monolists.monolist',
        'client_secret' => 'MIGTAgEAMBMGByqGSM49AgEGCCqGSM49AwEHBHkwdwIBAQQgzXNNcEhqGH75wNafYQCcdl3v3tQfRCU+TTt9zNBrdkigCgYIKoZIzj0DAQehRANCAAR6XI6fKrRls1PzG9RB0LeE/rNS9nt91BlQg4Pjpn7mPBQ4DdhEnflHyusl/J9ozne7TWJE1kdZujfS73/f4VWu',
        'redirect' => 'https://monolist.io/social/auth/callback/apple',
    ],

];
