<?php

namespace App\Http\Controllers;

use App\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    /**
     * Create a new Institution
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $institution = new Institution();
        $institution->name = $request->input('name');
        $institution->save();
        return response()->json(['institution' => $institution], 201);
    }

    /**
     * List all Institutions
     * @return \Illuminate\Http\JsonResponse
     */
    public function list()
    {
        $institutions = Institution::all();
        $response = [
            'institutions' => $institutions
        ];
        return response()->json($response, 200);
    }

    /**
     * Get a Institution by Id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $institution = Institution::find($id);
        $response = [
            'institution' => $institution
        ];
        if(!$institution)
        {
            return response()->json(['message' => 'Institution not found'], 404);
        }
        return response()->json($response, 200);
    }

    /**
     * Update a Institution by Id
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $institution = Institution::find($id);
        if(!$institution)
        {
            return response()->json(['message' => 'Institution not found'], 404);
        }
        $institution->name = $request->input('name');
        $institution->save();
        return response()->json(['institution' => $institution], 200);
    }

    /**
     * Delete a Institution by Id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $institution = Institution::find($id);
        $institution->delete();
        return response()->json(['message' => 'Institution deleted'], 200);
    }
}
