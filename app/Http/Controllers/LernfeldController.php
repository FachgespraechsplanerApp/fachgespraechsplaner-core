<?php

namespace App\Http\Controllers;

use App\Lernfeld;
use Illuminate\Http\Request;

class LernfeldController extends Controller
{
    /**
     * Create a new Lernfeld
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $lernfeld = new Lernfeld();
        $lernfeld->number = $request->input('number');
        $lernfeld->name = $request->input('name');
        $lernfeld->schulformId = $request->input('schulformId');
        $lernfeld->year = $request->input('year');
        $lernfeld->save();
        return response()->json(['lernfeld' => $lernfeld], 201);
    }

    /**
     * List all Lernfelder
     * @return \Illuminate\Http\JsonResponse
     */
    public function list()
    {
        $lernfelder = Lernfeld::all();
        $response = [
            'lernfelder' => $lernfelder
        ];
        return response()->json($response, 200);
    }

    /**
     * Get a Lernfeld by Id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $lernfeld = Lernfeld::find($id);
        $response = [
            'lernfeld' => $lernfeld
        ];
        if(!$lernfeld)
        {
            return response()->json(['message' => 'Lernfeld not found'], 404);
        }
        return response()->json($response, 200);
    }

    /**
     * Update a Lernfeld by Id
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $lernfeld = Lernfeld::find($id);
        if(!$lernfeld)
        {
            return response()->json(['message' => 'Lernfeld not found'], 404);
        }
        $lernfeld->number = $request->input('number');
        $lernfeld->name = $request->input('name');
        $lernfeld->schulformId = $request->input('schulformId');
        $lernfeld->year = $request->input('year');
        $lernfeld->save();
        return response()->json(['lernfeld' => $lernfeld], 200);
    }

    /**
     * Delete a Lernfeld by Id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $lernfeld = Lernfeld::find($id);
        $lernfeld->delete();
        return response()->json(['message' => 'Lernfeld deleted'], 200);
    }
}
