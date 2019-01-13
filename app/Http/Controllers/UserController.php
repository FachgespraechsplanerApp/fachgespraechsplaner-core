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
           'isAdmin' => 'required',
           'email' => 'required|email|unique:users',
           'password' => 'required'
        ]);

        $user = new User([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'classId' => $request->input('classId'),
            'schulformId' => $request->input('schulformId'),
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
     * List all users
     * @return \Illuminate\Http\JsonResponse
     */
    public function list()
    {
        $users = User::all();
        $response = [
            'users' => $users
        ];
        return response()->json($response, 200);
    }

    /**
     * Get user by Id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $user = User::find($id);
        $response = [
            'user' => $user
        ];
        if(!$user)
        {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($response, 200);
    }

    /**
     * Update a user by Id
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        if (!auth()->guard('api')->user()->isAdmin)
        {
            return response()->json(['error' => 'Permission Denied'], 403);
        }
        $user = User::find($id);
        if(!$user)
        {
            return response()->json(['message' => 'User not found'], 404);
        }

        $this->validate($request, [
            'email' => 'email|unique:users'
        ]);

        if(isset($user->name))
        {
            $user->name = $request->input('name');
        }
        if(isset($user->username))
        {
            $user->username = $request->input('username');
        }
        if(isset($user->classId))
        {
            $user->classId = $request->input('classId');
        }
        if(isset($user->schulformId))
        {
            $user->schulformId = $request->input('schulformId');
        }
        if(isset($user->isAdmin))
        {
            $user->isAdmin = $request->input('isAdmin');
        }
        if(isset($user->email))
        {
            $user->email = $request->input('email');
        }
        if(isset($user->password))
        {
            $user->password = $request->input('password');
        }

        $user->save();
        return response()->json(['user' => $user], 200);
    }

    /**
     * Delete a user by Id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        if (!auth()->guard('api')->user()->isAdmin)
        {
            return response()->json(['error' => 'Permission Denied'], 403);
        }
        $user = User::find($id);
        $user->delete();
        return response()->json(['message' => 'User deleted'], 200);
    }
}
