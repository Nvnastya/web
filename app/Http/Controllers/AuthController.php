<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['name' => $validated['username'], 'password' => $validated['password']])) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Неверные данные для входа'], 401);
    }
}
