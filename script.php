<?php

declare(strict_types=1);

require 'app/services/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

try {
    $accessToken = json_decode(
        (new Client)->post(
            sprintf(env('REDIRECT_URI'), env('AMOCRM_BASEDOMAIN'), env('AMOCRM_DEV_HOST')),
            [
                'json' => [
                    'client_id' => env('INTEGRATION_ID'),
                    'client_secret' => env('SECRET_KEY'),
                    'grant_type' => 'authorization_code',
                    'code' => env('AUTH_CODE'),
                    'redirect_uri' => env('AMOCRM_REDIRECT'),
                ],
                'verify' => false
            ]
            )->getBody()->getContents(),
        true
    );
} catch (GuzzleException $e) {
    dd($e->getTrace());
}

$isInserted = $capsule->getDatabaseManager()->table('token')->insert(
    [
        'access_token' => $accessToken['access_token'],
        'refresh_token' => $accessToken['refresh_token'],
        'expires_in' => $accessToken['expires_in'],
    ]
);

dd($isInserted ? 'Saved' : 'Not saved');
