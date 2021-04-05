<?php

namespace App\Http\Controllers;

use App\Models\Vaccination;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Location;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class VaccinationController extends Controller
{
    public function getAllVaccinations() {
        $vaccinations = Vaccination::with(['location'])->get();
        return $vaccinations;
    }

    public function getByLocation($location_id) {
        $vaccinations = Vaccination::where('location_id', $location_id)->with(['location'])->get();
        return $vaccinations;
    }



    /*public function deleteVaccination(string $vaccination_id) : JsonResponse
    {
        $vaccination = Vaccination::where('vaccination_id', $vaccination_id)->first();
        if ($vaccination != null) {
            $vaccination->delete();
        }
        else
            throw new \Exception("Vaccination couldn't be deleted - it does not exist");
        return response()->json('Vaccination (' . $vaccination_id . ') successfully deleted', 200);
    }*/
}
