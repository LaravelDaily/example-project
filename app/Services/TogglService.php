<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class TogglService
{

    private $auth;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://www.toggl.com/api/v8/',
        ]);

        $this->auth = [
            env('TOGGL_API_KEY'),
            'api_token'
        ];

    }

    public function me()
    {
        try {
            $response = $this->client->request('GET', 'me?with_related_data=true', [
                'auth' => $this->auth,
            ]);
        } catch (RequestException $e) {
            $this->handleRequestException($e);
        }

        return json_decode($response->getBody());

    }

    private function handleRequestException(RequestException $e)
    {
        if ($e->getCode() == 403) {
            throw new \Exception('Authentication error, please check your toggl api key.', 403, $e);
        }
    }

}