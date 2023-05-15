<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PageViewLog extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // set maximum of daily seed entries 
        $maxDailyEntries = 5;
        // set number of months that we need to seed
        $months          = 6;
        // set some URLs to seed
        $urls            = ['/', '/home', '/login', '/register'];


        // set initial date
        $date = now()->subMonths($months);

        // loop untill we reach present day
        while ($date->isPast())
        {
            // figure out how many daily entries we will generate
            $dailyEntries = rand(0, $maxDailyEntries);

            for ($i = 0; $i < $dailyEntries; $i++)
            {
                // get random user_id, in case of UID = 0 that means user is not authorized thus we set NULL
                $user_id = rand(0, 10);
                $user_id = $user_id ? $user_id : null;

                // pick random visited URL
                $key = array_rand($urls);

                // fill data in DB
                \App\Models\PageViewLog::create([
                    'url'        => $urls[$key],
                    'user_id'    => $user_id,
                    'created_at' => $date,
                    'updated_at' => $date
                ]);
            }

            // add another day with each loop
            $date->addDay();
        }
    }
}
