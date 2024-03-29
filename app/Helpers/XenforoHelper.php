<?php


namespace App\CustHelpers;


use Illuminate\Support\Facades\Http;
use mysql_xdevapi\Exception;
use RestCord\DiscordClient;

class XenforoHelper
{
    const METHOD_GET = 'get';
    const METHOD_POST = 'post';
    const NEWS_BOARD_ID = '4';

    public static function sendRequest($endpoint, $data = [], $method = self::METHOD_GET)
    {
        if(config('xenforo.apikey') == null) {
            return ['errors' => []];
        }
        if (is_string($data)) {
            $method = $data;
            $data = [];
        }
        $url = config('xenforo.base_url') . $endpoint;
        $response = Http::withHeaders([
            'XF-Api-Key' => config('xenforo.apikey')
        ])->$method($url, $data);
        $decodedResponse = json_decode($response, true);
        return $decodedResponse;
    }

    public static function getNewsItems()
    {
        $data = self::sendRequest('/forums/' . self::NEWS_BOARD_ID . '/threads');

        if(array_key_exists('errors', $data)) {
            return ['threads' => []];
        }
        return $data;
    }

    public static function getUserCount()
    {
        $data = self::sendRequest('/users');
        if(array_key_exists('errors', $data)) {
            throw new \Exception('CAN NOT COUNT USERS!');
        }
        return $data['pagination']['total'];
    }
}
