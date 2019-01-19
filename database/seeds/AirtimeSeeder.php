<?php

use Illuminate\Database\Seeder;
use App\Airtime\Domain\Models\Airtime;

class AirtimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('airtimes')->delete();
        AirTime::create([	'key' => 'sms', 	 	'credits' => 1		]);
        AirTime::create([	'key' => 'load-10', 	'credits' => 10		]);
    }
}
