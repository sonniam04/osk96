<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestbookController extends Controller
{
    public function index()
    {
        $entries = DB::table('guestbook')
            ->where('st', 1)
            ->orderByDesc('id_guestbook')
            ->paginate(15);

        return view('guestbook.index', compact('entries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|max:100',
            'detail' => 'required|max:2000',
        ]);

        DB::table('guestbook')->insert([
            'name'       => $request->name,
            'country'    => $request->country ?? 'ไทย',
            'detail'     => $request->detail,
            'submitdate' => now(),
            'st'         => 1,
            'ip'         => $request->ip(),
        ]);

        return redirect()->route('guestbook.index')->with('success', 'บันทึกข้อความสำเร็จ');
    }
}
