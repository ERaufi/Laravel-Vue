<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'password' => 'required|confirmed',
            'photo' => 'required',
        ]);

        $imageName = $request->photo->getClientOriginalName();
        $request->photo->move(public_path('images'), $imageName);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->photo = 'images/' . $imageName;
        $user->save();

        $token = $user->createToken('vue')->plainTextToken;

        return response()->json([
            'token' => $token,
        ], 200);
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Wrong User Name or Passwor'], 500);
        } else {
            $token = $user->createToken('vue')->plainTextToken;

            return response()->json($token, 200);
        }
    }

    public function getUser()
    {
        $item = User::latest()->first();

        return $item;
    }
}
