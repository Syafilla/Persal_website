<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ResetOtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
   public function checkEmailDirect(Request $request)
    {
        $email = $request->input('email');

        if (!$email) {
            return response()->json([
                'status' => 'error',
                'message' => 'Email tidak ditemukan di request'
            ], 400);
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Email tidak terdaftar'
            ]);
        }

        return response()->json([
            'status' => 'success'
        ]);
    }



    public function resetDirect(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User tidak ditemukan'
            ]);
        }

        if (Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Password baru tidak boleh sama dengan password lama'
            ]);
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'status' => 'success'
        ]);
    }


}
