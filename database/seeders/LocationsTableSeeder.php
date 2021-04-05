<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // erste Location
        $location = new Location();
        $location->name = "Sportpark Walding";
        $location->street = "Hauptstraße";
        $location->houseNo = "19";
        $location->zipCode = "4111";
        $location->city = "Walding";

        $location->save();

        // zweite Location
        $location2 = new Location();
        $location2->name = "Design Center Linz";
        $location2->street = "Europaplatz";
        $location2->houseNo = "1";
        $location2->zipCode = "4020";
        $location2->city = "Linz";

        $location2->save();

        // dritte Location
        $location3 = new Location();
        $location3->name = "Ausbildungszentrum Kepler Universitätsklinikum";
        $location3->street = "Krankenhausstraße";
        $location3->houseNo = "26";
        $location3->zipCode = "4020";
        $location3->city = "Linz";

        $location3->save();

    }
}
