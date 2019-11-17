<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->insert([
           'title' => 'Høsten 2019',
           'active' => true
        ]);

        $schedule = \App\Schedule::first();

        DB::table('schedule_events')->insert([
           'title' => 'Klubbmesterskapet runde 1',
           'date' => '2019-12-1',
           'schedule_id' => $schedule->id,
        ]);
    }
}
