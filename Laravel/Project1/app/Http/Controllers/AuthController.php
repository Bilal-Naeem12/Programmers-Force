<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }

    public function me(Request $request)
    {
        return response()->json($request->user());
    }
public function logout(Request $request)
{
    try {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'message' => 'User not authenticated.'
            ], 401);
        }

        // Attempt to delete all tokens
        $user->tokens()->delete();

        return response()->json([
            'message' => 'Logged out successfully.'
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Logout failed.',
            'error' => $e->getMessage()
        ], 500);
    }
}



    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed', // Make sure request includes 'password_confirmation'
    ]);

    // Create the student
    $student = Student::create([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    // Create the user linked to the student
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'student',
        'userable_id' => $student->id,
        'userable_type' => Student::class,
    ]);

    // Create Sanctum token
    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json([
        'token' => $token,
        'user' => $user
    ], 201);
}
}
