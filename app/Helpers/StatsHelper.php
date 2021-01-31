<?php


namespace App\CustHelpers;


use RestCord\DiscordClient;

class StatsHelper
{

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
        return 'Coming soon';
    }


}
