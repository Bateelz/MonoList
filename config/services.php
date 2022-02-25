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
        'client_id' => '1132076184204492',
        'client_secret' => 'd9f4a4d696eed1c00ea7d2bc25f33528',
        'redirect' => 'https://monolist.io/social/auth/callback/facebook',
    ],

    'google' => [
        'client_id' => '584174852874-010m814jp4asi9kh76jmupsgi9eqslrq.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://monolist.io/social/auth/callback/google',
    ],
];
