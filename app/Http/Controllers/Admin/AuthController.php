<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Formulário de login
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Autenticar
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            session(['admin_id' => $admin->id, 'admin_nome' => $admin->nome]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas']);
    }

    // Logout
    public function logout()
    {
        session()->forget(['admin_id', 'admin_nome']);
        return redirect()->route('admin.login');
    }
}
