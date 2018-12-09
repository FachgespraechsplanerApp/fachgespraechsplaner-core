<?php

namespace App\Http\Controllers;

use App\Timeslot;
use Illuminate\Http\Request;

class TimeslotController extends Controller
{
    /**
     * Create a new Timeslot
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $timeslot = new Timeslot();
        $timeslot->lernfeldId = $request->input('lernfeldId');
        $timeslot->slot = $request->input('slot');
        $timeslot->classId = $request->input('classId');
        $timeslot->available = $request->input('available');
        $timeslot->save();
        return response()->json(['timeslot' => $timeslot], 201);
    }

    /**
     * List all Timeslots in Institution
     * @return \Illuminate\Http\JsonResponse
     */
    public function list()
    {
        $timeslots = Timeslot::all();
        $response = [
            'timeslots' => $timeslots
        ];
        return response()->json($response, 200);
    }

    /**
     * Get Timeslot by Id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $timeslot = Timeslot::find($id);
        $response = [
            'timeslot' => $timeslot
        ];
        if(!$timeslot)
        {
            return response()->json(['message' => 'Timeslot not found'], 404);
        }
        return response()->json($response, 200);
    }

    /**
     * Update a Timeslot by Id
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $timeslot = Timeslot::find($id);
        if(!$timeslot)
        {
            return response()->json(['message' => 'Timeslot not found'], 404);
        }
        $timeslot->lernfeldId = $request->input('lernfeldId');
        $timeslot->slot = $request->input('slot');
        $timeslot->classId = $request->input('classId');
        $timeslot->available = $request->input('available');
        $timeslot->save();
        return response()->json(['timeslot' => $timeslot], 200);
    }

    /**
     * Delete a Timeslot by Id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $timeslot = Timeslot::find($id);
        $timeslot->delete();
        return response()->json(['message' => 'Timeslot deleted'], 200);
    }
}
