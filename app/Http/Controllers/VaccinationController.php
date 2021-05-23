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
    /**
     * Alle Impfungen anzeigen
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllVaccinations() {
        $vaccinations = Vaccination::with(['location'])->get();
        return $vaccinations;
    }

    /**
     * Alle Termine pro Location anzeigen
     * @param $location_id
     * @return mixed
     */
    public function getByLocation($location_id) {
        $vaccinations = Vaccination::where('location_id', $location_id)->with(['location'])->get();
        return $vaccinations;
    }

    /**
     * Termin über ID holen
     * @param string $id
     * @return mixed
     */
    public function getById(string $id)
    {
        $vaccination = Vaccination::where('id', $id)->with(['location'])->get()->first();
        return $vaccination;
    }

    /**
     * Neuen Impftermin anlegen
     * @param Request $request
     * @return JsonResponse
     */
    public function save(Request $request): JsonResponse {
        $request = $this->parseRequest($request);

        DB::beginTransaction();
        try {
            $vaccination = Vaccination::create($request->all());

            // save location
            if (isset($request['location_id'])) {
                $location = Location::where('id', $request['location_id'])->get()->first();
                $vaccination->location()->associate($location);
            }

            DB::commit();
            return response()->json($vaccination, 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json('saving vaccination failed: ' . $e->getMessage(), 420);
        }
    }

    /**
     * Impftermin updaten
     *
     */
    public function update(Request $request, string $id) : JsonResponse
    {
        DB::beginTransaction();
        try {
            $vaccination = Vaccination::with(['location'])->where('id', $id)->first();

            if ($vaccination != null) {
                $request = $this->parseRequest($request);
                $vaccination->update($request->all());
                $vaccination->save();
            }

            DB::commit();
            $vaccination1 = Vaccination::with(['location'])->where('id', $id)->first();
            return response()->json($vaccination1, 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json("updating vaccination failed: " . $e->getMessage(), 420);
        }
    }

    /**
     * Impfung löschen
     * @param string $id
     * @return JsonResponse
     * @throws \Exception
     */
    public function delete(string $id) : JsonResponse
    {
        $vaccination = Vaccination::where('id', $id)->first();
        if ($vaccination != null) {
            $vaccination->delete();
        }
        else
            throw new \Exception("vaccination couldn't be deleted - it does not exist");
        return response()->json('vaccination (' . $id . ') successfully deleted', 200);
    }

    /**
     * User*in zu einem Termin anmelden
     * @param Request $request
     * @return JsonResponse
     */
    public function bookVaccination(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = User::where('id', $request->userId)->first(); //User*in holen
            if ($user != null) {
                if($user['vaccination_id'] == null){
                    $user['vaccination_id'] = $request->vaccinationId;
                    $user->save();
                } else {
                    return response()->json("User*in hat bereits einen Impftermin.", 201);
                }
            }
            DB::commit();
            return;
        }
        catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("updating vaccination failed: " . $e->getMessage(), 420);
        }

    }

    /**
     * From und zu holen und parsen
     * @param Request $request
     * @return Request
     */
    private function parseRequest(Request $request) : Request {
        $from = new \DateTime($request->from);
        $to = new \DateTime($request->to);
        $request['from'] = $from;
        $request['to'] = $to;
        return $request;
    }
}