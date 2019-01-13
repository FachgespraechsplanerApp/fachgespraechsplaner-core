<?php

namespace App\Http\Controllers;

use App\Schulform;
use Illuminate\Http\Request;

class SchulformController extends Controller
{
    /**
     * Create a new Schulform
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $schulform = new Schulform();
        $schulform->name = $request->input('name');
        $schulform->short = $request->input('short');
        $schulform->save();
        return response()->json(['schulform' => $schulform], 201);
    }

    /**
     * List all Schulformen
     * @return \Illuminate\Http\JsonResponse
     */
    public function list()
    {
        $schulformen = Schulform::all();
        $response = [
            'schulformen' => $schulformen
        ];
        return response()->json($response, 200);
    }

    /**
     * Get Schulform by Id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $schulform = Schulform::find($id);
        $response = [
            'schulform' => $schulform
        ];
        if(!$schulform)
        {
            return response()->json(['message' => 'Schulform not found'], 404);
        }
        return response()->json($response, 200);
    }

    /**
     * Update a Schulform by Id
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $schulform = Schulform::find($id);
        if(!$schulform)
        {
            return response()->json(['message' => 'Schulform not found'], 404);
        }
        $schulform->name = $request->input('name');
        $schulform->short = $request->input('short');
        $schulform->save();
        return response()->json(['schulform' => $schulform], 200);
    }

    /**
     * Delete a Schulform by Id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $schulform = Schulform::find($id);
        $schulform->delete();
        return response()->json(['message' => 'Schulform deleted'], 200);
    }
}
