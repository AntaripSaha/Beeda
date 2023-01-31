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

    'firebase' => [
        'api_key'=> "AIzaSyBI62C3Y_Rz1N78xK6XC3JboMrFCbsTRFk",
        'auth_domain'=> "wrabbit-cc77f.firebaseapp.com",
        'database_url'=> "https://wrabbit-cc77f.firebaseio.com",
        'project_id'=> "wrabbit-cc77f",
        'storage_bucket'=> "wrabbit-cc77f.appspot.com",
        'messaging_sender_id'=> "1078792944510",
        'app_id'=> "1:1078792944510:web:35f0a1168ed751b6e0112f",
        'measurement_id'=> "G-7RWPT0E2YE",
    ],

];
