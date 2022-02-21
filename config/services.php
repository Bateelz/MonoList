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

    "apple" => [
        "client_id" => "AKXWGNS6FN",
        "client_secret" =>"MIGTAgEAMBMGByqGSM49AgEGCCqGSM49AwEHBHkwdwIBAQQgzXNNcEhqGH75wNaf
        YQCcdl3v3tQfRCU+TTt9zNBrdkigCgYIKoZIzj0DAQehRANCAAR6XI6fKrRls1Pz
        G9RB0LeE/rNS9nt91BlQg4Pjpn7mPBQ4DdhEnflHyusl/J9ozne7TWJE1kdZujfS73/f4VWu",
    ],

    'apple' => [
        'client_id' => env('APPLE_CLIENT_ID'),
        'client_secret' => env('APPLE_CLIENT_SECRET'),
        'redirect' => env('APPLE_REDIRECT_URI')
      ],
];
