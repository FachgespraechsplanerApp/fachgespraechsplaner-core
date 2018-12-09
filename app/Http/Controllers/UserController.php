<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new User
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        $this->validate($request, [
           'name' => 'required',
           'username' => 'required',
           'classId' => 'required',
           'schulformId' => 'required',
           'institutionId' => 'required',
           'isAdmin' => 'required',
           'email' => 'required|email|unique:users',
           'password' => 'required'
        ]);

        $user = new User([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'classId' => $request->input('classId'),
            'schulformId' => $request->input('schulformId'),
            'institutionId' => $request->input('institutionId'),
            'isAdmin' => $request->input('isAdmin'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    /**
     * List all users in Institution
     */
    public function list()
    {
        //
    }

    /**
     * Get user by Id
     */
    public function get()
    {
        //
    }

    /**
     * Update a user by Id
     */
    public function update()
    {
        //
    }

    /**
     * Delete a user by Id
     */
    public function delete()
    {
        //
    }
}
