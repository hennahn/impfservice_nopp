<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // erster User
        $user = new User();
        $user->firstName = "Hannah";
        $user->lastName = "Nopp";
        $user->sex = "w";
        $user->password = bcrypt('hannahnopp');
        $user->phone = "+43650111111";
        $user->email = "hannah@nopp.at";
        $user->ssno = "1234270699";
        $user->street = "St. Gotthard";
        $user->zipCode = "4112";
        $user->houseNo = "9";
        $user->city = "St. Gotthard";
        $user->isAdmin = false;
        $user->status = false;

        $user->save();

        //zweiter User
        $user2 = new User();
        $user2->firstName = "Viktoria";
        $user2->lastName = "Ferstl";
        $user2->sex = "w";
        $user2->password = bcrypt('viktoriaferstl');
        $user2->phone = "+43650222222";
        $user2->email = "viktoria@ferstl.at";
        $user2->ssno = "1234291296";
        $user2->street = "Ahornstraße";
        $user2->zipCode = "4102";
        $user2->houseNo = "4";
        $user2->city = "Goldwörth";
        $user2->isAdmin = true;
        $user2->status = false;

        $user2->save();
    }
}
