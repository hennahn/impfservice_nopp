<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Vaccination;
use DateTime;
use Illuminate\Database\Seeder;

class VaccinationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // erster Termin
        $vaccination = new Vaccination();
        $vaccination->date = new DateTime('2021-04-05');
        $vaccination->from = new DateTime('14:00:00');
        $vaccination->to = new DateTime('18:00:00');
        $vaccination->maxParticipants = 8;

        $location = Location::all()->first();
        $vaccination->location()->associate($location);

        $vaccination->save();

        // zweiter Termin
        $vaccination2 = new Vaccination();
        $vaccination2->date = new DateTime('2021-04-06');
        $vaccination2->from = new DateTime('15:00:00');
        $vaccination2->to = new DateTime('16:30:00');
        $vaccination2->maxParticipants = 4;

        $location2 = Location::where('id', 2)->get()->first();
        $vaccination2->location()->associate($location2);

        $vaccination2->save();
    }
}
