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
        if($this->discordClient == null) {
            return null;
        }
        return $this->getDiscordServer()->approximate_member_count;
    }

    public function countForumMembers(){
        return 'Coming soon';
        $count = XenforoHelper::getUserCount();
        dd($count);
        return $count;
    }

    public function countPlayers(){
        return 'Coming soon';
    }


}
