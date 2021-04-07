<?php


namespace App\CustHelpers;


use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use RestCord\DiscordClient;

class TrainercardHelper
{

    CONST BACKGROUND_CLEAR = 0;
    CONST BACKGROUND_BLUE_TILES = 1;
    CONST BACKGROUND_BOARDS = 2;
    CONST BACKGROUND_GRASS = 3;
    const BACKGROUNDS = [
        self::BACKGROUND_CLEAR => [
            'name'=>'White',
            'filling' => '#ffffff'
        ],
        self::BACKGROUND_BLUE_TILES => [
            'name'=>'Blue tiles',
            'filling' => 'images/layout/bg_lab_floor.png'
        ],
        self::BACKGROUND_BOARDS => [
            'name'=>'Home wall',
            'filling' => 'images/layout/tile_boards.png'
        ],
        self::BACKGROUND_GRASS => [
            'name'=>'Grass',
            'filling' => 'images/layout/tile_grass.png'
        ],
    ];

    private $gameJoltHelper;

    private $playerName;
    private $playerScore;
    private $playerLevel;
    private $playerSpriteSheet;
    private $playerParty;
    private $playerBadges;
    private $backgroundId;
    private $imagemanager;

    public function __construct($name, $background = self::BACKGROUND_CLEAR)
    {
        $this->gameJoltHelper = new GameJoltHelper();
        $this->collectTrainerData($name);
        $this->collectSkinData($name);
        $this->backgroundId = $background;
        $this->imagemanager = new ImageManager(array('driver' => 'gd'));
    }

    private function setBackground(\Intervention\Image\Image $image) {
        if ($this->backgroundId == self::BACKGROUND_CLEAR) {
            $image->fill(self::BACKGROUNDS[$this->backgroundId]['filling'], 89, 29);
        } else{

            $canvas = $this->imagemanager->canvas($image->width(), $image->height());
            $canvas->fill(public_path(self::BACKGROUNDS[$this->backgroundId]['filling']), 89, 29);
            $canvas->insert($image);
            $image = $canvas;
        }

        return $image;
    }

    private function collectTrainerData($name)
    {
        // Get info from upcoming APIs
        $this->playerName = 'Mrmacgeek';
        $this->playerLevel = 5;
        $this->playerScore = 361;
        $this->playerBadges = 10;
        $this->playerParty = [
            [
                'dexID' => 1,
                'name' => 'Bulbasaur',
                'shiny' => true,
            ],
            [
                'dexID' => 2,
                'name' => 'Ivysaur',
                'shiny' => false,
            ],
            [
                'dexID' => 3,
                'name' => 'Venasaur',
                'shiny' => true,
            ],
            [
                'dexID' => 4,
                'name' => 'Charmander',
                'shiny' => false,
            ],
            [
                'dexID' => 5,
                'name' => 'Charmeleon',
                'shiny' => true,
            ],
            [
                'dexID' => 6,
                'name' => 'Charizard',
                'shiny' => false,
            ]
        ];
    }

    private function collectSkinData($name)
    {
        // Get info from upcoming APIs
        $this->playerSpriteSheet = file_get_contents(resource_path('img/trainercard/spritesheet_dummy.png'));

    }

    private function prepareSprite()
    {
        if(!file_exists(storage_path('app/public/trainercards/sprites/'))){
            mkdir(storage_path('app/public/trainercards/sprites/'));
        }
        $spritePath = storage_path('app/public/trainercards/sprites/' . $this->playerName . '.png');
        $sprite = $this->imagemanager->make($this->playerSpriteSheet);
        $spriteHeight =  $sprite->getHeight() / 4;
        $spriteWidth =  $sprite->getWidth() / 3;
        $offsetX = 0;
        $offsetY = $spriteHeight * 2;
        $resizeFactor = 2;
            $sprite->crop(round($spriteWidth), round($spriteHeight), $offsetX, $offsetY)
                ->resize($spriteWidth * $resizeFactor, $spriteHeight * $resizeFactor)
                ->save($spritePath);
        return $spritePath;
    }

    public function makeTrainerCardPng()
    {
        if(!file_exists(storage_path('app/public/trainercards/'))){
            mkdir(storage_path('app/public/trainercards/'));
        }

        $PlayerNameX = 138;
        $PlayerNameY = 3;

        $secondLineText = 'Lv. ' . $this->playerLevel . ' - Score: ' . $this->playerScore;

        $secondLineX = 144;
        $secondLineY = 24;
        $spriteX = 8;
        $spriteY = 25;
        $trainercard = $this->imagemanager->make(public_path('images/trainercard/template.png'));
        $trainercard->text($this->playerName, $PlayerNameX, $PlayerNameY, function ($font) {
                $font->file(public_path('fonts/Pokmon-DP-Pro.ttf'));
                $font->size(19);
                $font->color('#000000');
                $font->align('center');
                $font->valign('top');
            })
            ->text($secondLineText, $secondLineX, $secondLineY, function ($font) {
                $font->file(public_path('fonts/Pokmon-DP-Pro.ttf'));
                $font->size(13);
                $font->color('#000000');
                $font->align('center');
                $font->valign('top');
            })
            ->insert($this->prepareSprite(), 'top-left', $spriteX, $spriteY);


        // Badges
        $badgeSheet = $this->imagemanager->make(public_path('images/trainercard/badgesheet.png'));
        $kantoBadgeRowOffset = 0;
        $johtoBadgeRowOffset = $badgeSheet->getHeight() / 2;

        $johtoBadgePlaceRowOffset = 163;
        $kantoBadgePlaceRowOffset = 128;
        $badgeSize = 22;

        for ($i = 0; $i < $this->playerBadges; $i++) {
            $useRowOffset = $johtoBadgeRowOffset;
            $usePlaceRowOffset = $johtoBadgePlaceRowOffset;
            $useColOffset = ($badgeSheet->getWidth() / 8) * $i;
            $usePlaceColOffset =  ($i * $badgeSize) + ($i * 6) + 7;
            if($i > 7) {
                $useRowOffset = $kantoBadgeRowOffset;
                $num = $i - 8;
                $useColOffset = ($badgeSheet->getWidth() / 8) * $num;
                $usePlaceRowOffset = $kantoBadgePlaceRowOffset;
                $placenum = $i - 8;
                $usePlaceColOffset = ($placenum * $badgeSize) + ($placenum * 6) + 7;
            }
            $badge = $this->imagemanager->make(public_path('images/trainercard/badgesheet.png'))->crop($johtoBadgeRowOffset,$johtoBadgeRowOffset,$useColOffset, $useRowOffset)->resize($badgeSize, $badgeSize);

            $trainercard->insert($badge, 'top-left', $usePlaceColOffset, $usePlaceRowOffset);

        }

        // Pokemon to party
        $partySlot = 1;
        foreach($this->playerParty as $mon){
            switch ($partySlot) {
                case 1:
                    $partySlotOffsetX = 85;
                    $partySlotOffsetY = 29;
                    break;
                case 2:
                    $partySlotOffsetX = 145;
                    $partySlotOffsetY = 29;
                    break;
                case 3:
                    $partySlotOffsetX = 205;
                    $partySlotOffsetY = 29;
                    break;
                case 4:
                    $partySlotOffsetX = 85;
                    $partySlotOffsetY = 65;
                    break;
                case 5:
                    $partySlotOffsetX = 145;
                    $partySlotOffsetY = 65;
                    break;
                case 6:
                    $partySlotOffsetX = 205;
                    $partySlotOffsetY = 65;
                    break;
            }

            $pokeData = Cache::get("pokemon_id_".$mon['dexID'],
                function () use ($mon){

                    $ApiUrl = 'https://pokeapi.co/api/v2/pokemon/' . $mon['dexID'];

                    $response = Http::get($ApiUrl);

                    $decodedResponse = json_decode($response, true);
                    Cache::put("pokemon_id_".$mon['dexID'], $decodedResponse, 60*60);
                    return $decodedResponse;
                });

            $name = Str::ucfirst($pokeData['name']);
            $sprite = $this->imagemanager->make(resource_path('img/Pokemon_Sprites/'.$name.'.png'));
            $cutOutWidth = $sprite->getWidth() / 2;
            $cutOutHeight = $sprite->getHeight() / 2;
            $cutOutOffsetX = 0;
            $cutOutOffsetY = 0;
            if($mon['shiny']) {
                $cutOutOffsetY = $cutOutHeight;
            }
            $sprite->crop($cutOutWidth,$cutOutHeight,$cutOutOffsetX,$cutOutOffsetY);

            $resizeFactor = 2.3;
            $sprite->resize($cutOutWidth / $resizeFactor, $cutOutHeight / $resizeFactor);

            $trainercard->insert($sprite, 'top-left', $partySlotOffsetX, $partySlotOffsetY);
            $partySlot++;
        }
            $trainercard = $this->setBackground($trainercard);

            return $trainercard;

    }
}
