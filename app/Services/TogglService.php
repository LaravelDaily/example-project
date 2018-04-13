<?php

namespace App\Services;

use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

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

    public function getTimeEntries($startDate, $endDate)
    {
        $startDate = urlencode(Carbon::parse($startDate)->toIso8601String());
        $endDate = urlencode(Carbon::parse($endDate)->toIso8601String());

        try {
            $response = $this->client->request('GET', 'time_entries?start_date=' . $startDate . '&end_date=' . $endDate, [
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
        } else {
            throw new \Exception('Unexpected error occured', 500, $e);
        }
    }

}