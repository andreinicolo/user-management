<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function users()
    {
        $users = User::all();

        return view('users', compact('users'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255|email|unique:users',
            'username' => 'required|max:255|unique:users',
            'password' => 'required|confirmed|max:255',
            'address' => 'required|max:255',
            'contact_number' => 'required|max:255',
            'post_code' => 'required|max:255',
        ]);

        $item = User::create($attributes);

        return response()->json(['status' => 'success', 'message' => 'Success', 'item' => $item], 200);
    }

    public function update(Request $request, $id)
    {
        $item = User::find($id);

        $attributes = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255|email|unique:users,email,'.$item->id,
            'username' => 'required|max:255|unique:users,username,'.$item->id,
            'password' => 'confirmed|max:255',
            'address' => 'required|max:255',
            'contact_number' => 'required|max:255',
            'post_code' => 'required|max:255',
        ]);

        if(isset($attributes['password'])) {
            $attributes['password'] = Hash::make($attributes['password']);
        }

        $item->update($attributes);

        $users = User::all();

        return response()->json(['status' => 'success', 'message' => 'Success', 'users' => $users], 200);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if(auth()->user()->id!=$id) {
            $user->delete();
        }

        $users = User::all();

        return response()->json(['status' => 'success', 'message' => 'Success', 'users' => $users], 200);
    }
}
