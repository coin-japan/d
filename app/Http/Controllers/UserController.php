<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index() 
    {
        $users = User::all();

        return response()->json([
            'status' => 'success',
            'users' => $users->toArray()
        ], 200);
    }

    public function show(Request $request, $id) 
    {
        $user = User::find($id);

        if(!$user){
            return response()->json([
                'status' => 'error',
                'message' => 'User not found!'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'user' => $user->toArray()
        ], 200);
    }

    public function update(Request $request, $id) 
    {
        $request->validate([
            'name' => 'required'
        ]);

        $user = User::find($id);

        if(!$user){
            return response()->json([
                'status' => 'error',
                'message' => 'User not found!'
            ], 404);
        }

        $user->name = $request->name;
        $user->role = $request->role;
        
        $user->save();

        return response()->json([
            'status' => 'success',
            'user' => $user->toArray()
        ], 200);
    }

    public function delete($id)
    {
        $user = User::find($id);
        
        if(!$user){
            return response()->json([
                'status' => 'error',
                'message' => 'User not found!'
            ], 404);
        }

        $user->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'User has been deleted.'
        ], 200);
    }
}
