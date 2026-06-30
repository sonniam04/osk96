<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    private array $admins = [
        'admin1' => 'Tigeroom2503@',
        'admin2' => 'Teerapol96',
        'admin3' => 'Peter',
    ];

    public function showLogin()
    {
        if (session('admin')) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username', '');
        $password = $request->input('password', '');

        if (isset($this->admins[$username]) && $this->admins[$username] === $password) {
            session(['admin' => $username]);
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'กรุณาตรวจสอบ Username และ Password');
    }

    public function logout()
    {
        session()->forget('admin');
        return redirect()->route('admin.login');
    }
}
