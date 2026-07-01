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
            'name'    => 'required|max:50',
            'message' => 'required',
        ]);

        DB::table('guestbook')->insert([
            'name'       => strip_tags($request->name),
            'country'    => $request->country ?? 'Thailand',
            'website'    => $request->website ?? 'http://',
            'email'      => strip_tags($request->email ?? ''),
            'message'    => strip_tags($request->message),
            'rating'     => (int) $request->rating,
            'ip'         => $request->ip(),
            'host'       => $request->ip(),
            'st'         => 1,
            'image'      => '',
            'submitdate' => now(),
        ]);

        return redirect()->route('guestbook.index')->with('success', 'ลงนามในสมุดเยี่ยมเรียบร้อยแล้ว ขอบคุณครับ');
    }
}
