<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberAuthController extends Controller
{
    public function showLogin()
    {
        if (session('user')) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username', '');
        $password = $request->input('password', '');

        if ($username === '') {
            return back()->with('error', 'กรุณากรอกเลขประจำตัวนักเรียน');
        }
        if ($password === '') {
            return back()->with('error', 'กรุณากรอกรหัสผ่าน');
        }

        $member = DB::table('data')
            ->where('username', $username)
            ->where('password', $password)
            ->first();

        if (!$member) {
            return back()->with('error', 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
        }

        session([
            'user' => [
                'username' => $username,
                'autono'   => $member->autono ?? null,
                'name'     => ($member->name ?? '') . ' ' . ($member->surname ?? ''),
                'fname'    => $member->fname ?? '',
            ],
        ]);

        return redirect()->route('profile');
    }

    public function logout()
    {
        session()->forget(['user', 'user_id', 'user_name']);
        return redirect()->route('home');
    }
}
