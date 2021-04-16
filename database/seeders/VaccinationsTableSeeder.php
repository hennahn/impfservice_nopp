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
        $vaccination->from = new DateTime('2021-04-05 14:00:00');
        $vaccination->to = new DateTime('2021-04-05 18:00:00');
        $vaccination->maxParticipants = 8;

        $location = Location::all()->first();
        $vaccination->location()->associate($location);

        $vaccination->save();

        // zweiter Termin
        $vaccination2 = new Vaccination();
        $vaccination2->from = new DateTime('2021-04-06 15:00:00');
        $vaccination2->to = new DateTime('2021-04-06 16:30:00');
        $vaccination2->maxParticipants = 4;

        $location2 = Location::where('id', 2)->get()->first();
        $vaccination2->location()->associate($location2);

        $vaccination2->save();

        // dritter Termin
        $vaccination3 = new Vaccination();
        $vaccination3->from = new DateTime('2021-04-06 12:00:00');
        $vaccination3->to = new DateTime('2021-04-06 13:00:00');
        $vaccination3->maxParticipants = 4;

        $location3 = Location::where('id', 3)->get()->first();
        $vaccination3->location()->associate($location3);

        $vaccination3->save();

        // vierter Termin
        $vaccination4 = new Vaccination();
        $vaccination4->from = new DateTime('2021-04-05 12:00:00');
        $vaccination4->to = new DateTime('2021-04-05 14:00:00');
        $vaccination4->maxParticipants = 4;

        $location2 = Location::where('id', 2)->get()->first();
        $vaccination4->location()->associate($location2);

        $vaccination4->save();
    }
}
