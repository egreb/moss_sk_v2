<?php

namespace App\Jobs;

use App\Tournament;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchTournamentResults implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $tournaments = Tournament::where('active', true)->get();

        $tournaments->map(function($tournament) {
            $client = new Client();

            foreach($tournament->groups_array as $group) {
                $res = $client->request('POST', $tournament->url, [
                    'form_params' => [
                        'GruppeVelger1:GruppeBtnList' => $group,
                        'RundeVelger1:RundeBtnList' =>  $tournament->rounds,
                    ]
                ]);

                var_dump($res->getBody());
            }

        });
    }
}
