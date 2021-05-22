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

        //dritter User
        $user3 = new User();
        $user3->firstName = "Kathrin";
        $user3->lastName = "Brunner";
        $user3->sex = "w";
        $user3->password = bcrypt('kathrinbrunner');
        $user3->phone = "+43650333333";
        $user3->email = "kathrin@brunner.at";
        $user3->ssno = "8473615209";
        $user3->street = "Bahnhofstraße";
        $user3->zipCode = "4320";
        $user3->houseNo = "9";
        $user3->city = "Allerheiligen";
        $user3->isAdmin = false;
        $user3->status = true;

        $user3->save();

        //vierter User
        $user4 = new User();
        $user4->firstName = "David";
        $user4->lastName = "Habring";
        $user4->sex = "m";
        $user4->password = bcrypt('davidhabring');
        $user4->phone = "+43650444444";
        $user4->email = "david@habring.at";
        $user4->ssno = "9463721223";
        $user4->street = "Musterstraße";
        $user4->zipCode = "4844";
        $user4->houseNo = "12";
        $user4->city = "Regau";
        $user4->isAdmin = false;
        $user4->status = true;

        $user4->save();

        //fünfter User
        $user5 = new User();
        $user5->firstName = "Hannes";
        $user5->lastName = "Wolfmayr";
        $user5->sex = "m";
        $user5->password = bcrypt('hanneswolfmayr');
        $user5->phone = "+43650555555";
        $user5->email = "hannes@wolfmayr.at";
        $user5->ssno = "4637293721";
        $user5->street = "Teststraße";
        $user5->zipCode = "4210";
        $user5->houseNo = "52";
        $user5->city = "Gallneukirchen";
        $user5->isAdmin = false;
        $user5->status = false;

        $user5->save();

        //sechster User
        $user6 = new User();
        $user6->firstName = "Eva";
        $user6->lastName = "Neuherz";
        $user6->sex = "w";
        $user6->password = bcrypt('evaneuherz');
        $user6->phone = "+43650666666";
        $user6->email = "eva@neuherz.at";
        $user6->ssno = "3728346109";
        $user6->street = "Hallostraße";
        $user6->zipCode = "4020";
        $user6->houseNo = "1";
        $user6->city = "Linz";
        $user6->isAdmin = false;
        $user6->status = true;

        $user6->save();

        //siebter User
        $user7 = new User();
        $user7->firstName = "Alan";
        $user7->lastName = "Gorgol";
        $user7->sex = "m";
        $user7->password = bcrypt('alangorgol');
        $user7->phone = "+43650777777";
        $user7->email = "alan@gorgol.at";
        $user7->ssno = "9987345612";
        $user7->street = "Ciaostraße";
        $user7->zipCode = "4020";
        $user7->houseNo = "92";
        $user7->city = "Linz";
        $user7->isAdmin = false;
        $user7->status = true;

        $user7->save();

        //achter User
        $user8 = new User();
        $user8->firstName = "Johanna";
        $user8->lastName = "Rammerstorfer";
        $user8->sex = "w";
        $user8->password = bcrypt('johannarammerstorfer');
        $user8->phone = "+43650888888";
        $user8->email = "johanna@rammerstorfer.at";
        $user8->ssno = "4787653091";
        $user8->street = "Servusstraße";
        $user8->zipCode = "4020";
        $user8->houseNo = "13";
        $user8->city = "Linz";
        $user8->isAdmin = false;
        $user8->status = true;

        $user8->save();
    }
}
