<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function show()
    {
        $user = session('user');
        if (!$user) return redirect()->route('home');

        $member = DB::table('data')
            ->where('st', 1)
            ->where('username', $user['username'])
            ->first();

        if (!$member) abort(404);

        return view('profile.show', compact('member'));
    }
}
