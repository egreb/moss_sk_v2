<?php

namespace App\Console\Commands;

use App\Tournament;
use App\TournamentPlayer;
use App\TournamentResult;
use duncan3dc\DomParser\HtmlElement;
use duncan3dc\DomParser\HtmlParser;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class FetchTournamentsResults extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ts:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update tournaments results';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tournaments = Tournament::where('active', true)->get();

        $tournaments->map(function ($tournament) {
            $client = new Client();

            foreach ($tournament->groups_array as $group) {
                $res = $client->request('POST', $tournament->url, [
                    'form_params' => [
                        'GruppeVelger1:GruppeBtnList' => $group,
                        'RundeVelger1:RundeBtnList' => $tournament->rounds,
                    ]
                ]);

                $body = (string)$res->getBody();

                $parser = new HtmlParser($body);

                /** @var HtmlElement $tableHeader */
                $tableHeader = $parser->getElementByClassName('ts_top');

                $nameIndex = 0;
                $clubIndex = 0;
                $ratingIndex = 0;
                $roundsIndexes = [];

                /** @var HtmlElement $th */
                foreach ($tableHeader->getElementsByTagName('th') as $index => $th) {

                    switch ($th->nodeValue) {
                        case 'Name':
                            $nameIndex = $index;
                            break;
                        case 'i-Rtg':
                            $ratingIndex = $index;
                            break;
                        case 'Club':
                            $clubIndex = $index;
                            break;
                        default:
                            if (is_numeric($th->nodeValue)) {
                                $roundsIndexes[] = $index;
                            }
                    }
                }

                $rows = $parser->getElementsByClassName('ts_tabell');

                /** @var HtmlElement $row */
                foreach ($rows as $row) {
                    $columns = $row->getElementsByTagName('td');

                    $player = TournamentPlayer::where('name', $columns[$nameIndex])->first();
                    if (is_null($player)) {
                        $player = (new TournamentPlayer([
                            'name' => $columns[$nameIndex],
                            'rating' => $columns[$ratingIndex],
                            'club' => $columns[$clubIndex]
                        ]))->save();
                    }

                    // img/res3s.gif = seier
                    // img/res1s.gif = tap
                    // img/res2s.gif = remis

                    // img/col2s.gif = hvit
                    // img/col1s.gif = svart
                    foreach($roundsIndexes as $roundIndex) {
                        $round = $columns[$roundIndex];
                        $result = TournamentResult::where([
                            'tournament_id' => $tournament->id,
                            'tournament_player_id' => $player->id,
                            'round' => $round,
                        ])->firstOrCreate();
                    }
                }

            }
        });
    }
}
