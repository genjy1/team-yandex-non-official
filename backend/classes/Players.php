<?php

namespace Classes;

use Classes\Response;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
class Players
{

    public static function get_players($discipline = 'dota2', $team = 'Team_Yandex')
    {
        $url = "https://liquipedia.net/$discipline/$team";

        $client = new Client([
            'timeout' => 10,
            'verify' => false,
        ]);

        try {
            $response = $client->request('GET', $url);
            $html = $response->getBody()->getContents();

            $crawler = new Crawler($html);

            $playerRows = $crawler->filter('tr.Player')->slice(0, 5);

            $players = [];

            $playerRows->each(function (Crawler $row) use (&$players) {
                // Пример структуры — адаптируйте под реальный HTML
                // Получаем ячейки таблицы
                $cells = $row->filter('td');

                $name = trim($cells->eq(2)->text());
                $name = preg_replace('/\s*\(.*?\)\s*/u', '', $name);
                $nickname = trim($cells->eq(0)->text());
                $joinDate = trim($cells->eq(4)->text());
                $position = trim($cells->eq(3)->text());

                $players['players'][] = [
                    'name' => mb_trim($name),
                    'nickname' => mb_trim($nickname),
                    'joinDate' => mb_trim(substr($joinDate, 10,12)),
                    'position' => mb_trim(substr($position, 11, 3)),
                ];
            });

            Response::json($players);

        } catch (\Exception $e) {
            Response::json(['error' => $e->getMessage()]);

        }
    }

}