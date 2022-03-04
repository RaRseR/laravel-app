<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function signUp(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'userName' => 'required|regex:/^[a-zA-Z ]+$/',
            'userEmail' => 'required|email:rfc',
            'password1' => 'required|string',
            'password2' => 'required|string'
        ]);
        if ($validator->fails()) return response()->json(['result' => 'error', 'errors' => $validator->errors()], 400);

        if ($r->password1 === $r->password2) {
            User::create([
                'name' => $r->userName,
                'email' => $r->userEmail,
                'password' => Hash::make($r->password1),
            ]);

            return response()->json(['result' => 'success'], 200);
        }
        return response()->json(['result' => 'error', 'errors'=>['Error in signig up']], 400);
    }
}
