<div class="col-12 row p-3 ">
    <h2 class="col-12  text-center">Statistics</h2>

    <a href="#FORUM_LINK" class="col-12 showoff_item pb-2 pt-2">
        <div class="row">
            <span><i class="fa fa-mail-bulk"></i>
            Forum users:
            {{(new \App\CustHelpers\StatsHelper())->countForumMembers()}}</span>
        </div>
    </a>
    <a href="#DISCORD_INVITE_LINK" class="col-12 showoff_item pb-2 pt-2">
        <div class="row">
            <span><i class="fab fa-discord"></i>
            Discord server members:
            {{(new \App\CustHelpers\StatsHelper())->countDiscordMembers()}}</span>
        </div>
    </a>
    <a href="#DOWNLOAD_LINK" class="col-12 showoff_item pb-2 pt-2">
        <div class="row">
            <span><i class="fas fa-gamepad"></i>
            Players:
            {{(new \App\CustHelpers\StatsHelper())->countPlayers()}}</span>
        </div>
    </a>
</div>
