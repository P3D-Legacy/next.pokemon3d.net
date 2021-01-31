<?php


namespace App\CustHelpers;


use Illuminate\Support\Facades\Http;
use RestCord\DiscordClient;

class XenforoHelper
{
    const METHOD_GET = 'get';
    const METHOD_POST = 'post';
    const NEWS_BOARD_ID = '4';

    private static function sendRequest($endpoint, $data = [], $method = self::METHOD_GET)
    {
        if (is_string($data)) {
            $method = $data;
            $data = [];
        }
        $url =  config('xenforo.base_url') . $endpoint;
        $response = Http::withHeaders([
            'XF-Api-Key' => config('xenforo.apikey')
        ])->$method($url, $data);
        $decodedResponse = json_decode($response, true);
        return $decodedResponse;
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
