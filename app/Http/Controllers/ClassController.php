<?php

namespace App\Http\Controllers;

use App\Classes;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Create a new Class
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $class = new Classes();
        $class->name = $request->input('name');
        $class->save();
        return response()->json(['class' => $class], 201);
    }

    /**
     * List all Classes
     * @return \Illuminate\Http\JsonResponse
     */
    public function list()
    {
        $classes = Classes::all();
        $response = [
            'classes' => $classes
        ];
        return response()->json($response, 200);
    }

    /**
     * Get a Class by Id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $class = Classes::find($id);
        $response = [
            'class' => $class
        ];
        if(!$class)
        {
            return response()->json(['message' => 'Class not found'], 404);
        }
        return response()->json($response, 200);
    }

    /**
     * Update a Class by Id
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $class = Classes::find($id);
        if(!$class)
        {
            return response()->json(['message' => 'Class not found'], 404);
        }
        $class->name = $request->input('name');
        $class->save();
        return response()->json(['class' => $class], 200);
    }

    /**
     * Delete a Class by Id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $class = Classes::find($id);
        $class->delete();
        return response()->json(['message' => 'Class deleted'], 200);
    }
}
