<?php


namespace App\CustHelpers;


use Illuminate\Support\Facades\Http;
use RestCord\DiscordClient;

class XenforoHelper
{

    const BASE_URL = 'https://pokemon3d.net/forum/api';
    const METHOD_GET = 'get';
    const METHOD_POST = 'post';
    const NEWS_BOARD_ID = '4';

    private static function sendRequest($endpoint, $data = [], $method = self::METHOD_GET)
    {
        if (is_string($data)) {
            $method = $data;
            $data = [];
        }
        $url = self::BASE_URL . $endpoint;
        $response = Http::withHeaders([
            'XF-Api-Key' => config('xenforo.apikey')
        ])->$method($url, $data);
        $decodedResponse = json_decode($response, true);
        return $decodedResponse;
        dd($decodedResponse);
    }

    public static function getNewsItems()
    {
        return self::sendRequest('/forums/' . self::NEWS_BOARD_ID . '/threads');
    }

    public static function getUserCount()
    {
        return self::sendRequest('/users');
    }
}
