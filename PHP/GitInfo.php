<?php

/**
 * @return array
 * @throws \Exception
 */
function getGitInfo(): array
{
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://api.github.com/repos/P3D-Legacy/P3D-Legacy/releases/latest',
        CURLOPT_USERAGENT => 'Github API with CURL'
    ]);
    $response = curl_exec($curl);
    curl_close($curl);
    $decodedResponse = json_decode($response,true);
    $date = new \DateTime($decodedResponse['published_at']);
    return [
        'version' => $decodedResponse['tag_name'],
        'version_title' => $decodedResponse['name'],
        'release_date' => $date->format('d.m.Y H:i'),
        'release_page' => $decodedResponse['html_url'],
        'downloadable_url' => $decodedResponse['assets'][0]['browser_download_url'],
        'author' => [
            'name' =>$decodedResponse['author']['login'],
            'avatar' => $decodedResponse['author']['avatar_url'],
            'profile' => $decodedResponse['author']['url']
        ]
    ];
}