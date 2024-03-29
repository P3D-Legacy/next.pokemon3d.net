<?php


namespace App\CustHelpers;


use Illuminate\Support\Facades\Http;
use RestCord\DiscordClient;

class StatsHelper
{

    const METHOD_GET = 'get';
    const METHOD_POST = 'post';
    private $discordClient;

    public function __construct()
    {
        $this->discordClient = config('discord.token') ? new DiscordClient(['token' => config('discord.token')]) : null;
    }

    public function getDiscordServer(){
        return $this->discordClient->guild->getGuild(['guild.id' => config('discord.server_id'), 'with_counts' => true]);
    }

    public function countDiscordMembers(){

        try {
            return $this->getDiscordServer()->approximate_member_count;
        }
        catch(\Exception $e) {
            return 'Coming soon';
        }
    }

    public function countForumMembers(){
        try{
            $count = XenforoHelper::getUserCount();
            return $count;
        } catch (\Exception $exception){
            return 'Coming soon';
        }
    }

    public function countPlayers(){
        $data = self::sendRequest("/server/status");

        return count($data['players']);
    }

    public function getInGameSeason(){
        $season = date('W') % 4;
        $seasonName = "spring";
#echo "Season (WOY % 4): " . $season;
        if($season == 0) {
            $seasonName = "fall";
        } elseif($season == 1) {
            $seasonName = "winter";
        } elseif($season == 2) {
            $seasonName = "spring";
        } elseif($season == 3) {
            $seasonName = "summer";
        }
        return $seasonName;
    }

    public static function sendRequest($endpoint, $data = [], $method = self::METHOD_GET)
    {
        if(config('gameserver.base_url') == null) {
            return ['errors' => []];
        }
        if (is_string($data)) {
            $method = $data;
            $data = [];
        }


        $url = config('gameserver.base_url') . $endpoint;
        $response = Http::withHeaders([
        ])->$method($url, $data);
        $decodedResponse = json_decode($response, true);
        return $decodedResponse;
    }

}
