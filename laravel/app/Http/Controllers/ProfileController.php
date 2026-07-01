<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function edit()
    {
        $user = session('user');
        if (!$user) return redirect()->route('login');

        $member = DB::table('data')
            ->where('st', 1)
            ->where('username', $user['username'])
            ->first();

        if (!$member) abort(404);

        return view('profile.edit', compact('member'));
    }

    public function update(Request $request)
    {
        $user = session('user');
        if (!$user) return redirect()->route('login');

        $request->validate([
            'name'        => 'required|max:100',
            'surname'     => 'required|max:100',
            'e_mail'      => 'nullable|email|max:100',
            'tel_h'       => 'nullable|max:30',
            'password'    => 'nullable|min:4|max:50',
            'password2'   => 'nullable|same:password',
            'fname'       => 'nullable|image|mimes:jpg,jpeg|max:2048',
        ]);

        $member = DB::table('data')
            ->where('st', 1)
            ->where('username', $user['username'])
            ->first();

        if (!$member) abort(404);

        $data = [
            'title'          => $request->input('title', ''),
            'name'           => $request->input('name', ''),
            'surname'        => $request->input('surname', ''),
            'status'         => $request->input('status', ''),
            'work'           => $request->input('work', ''),
            'e_mail'         => $request->input('e_mail', ''),
            'tel_h'          => $request->input('tel_h', ''),
            'addr1_tambom'   => $request->input('addr1_tambom', ''),
            'addr2_amphur'   => $request->input('addr2_amphur', ''),
            'addr3_province' => $request->input('addr3_province', ''),
            'postal_code'    => $request->input('postal_code', ''),
            'telephone'      => $request->input('telephone', ''),
            'off'            => $request->input('off', ''),
            'off_amphur'     => $request->input('off_amphur', ''),
            'off_province'   => $request->input('off_province', ''),
            'off_post'       => $request->input('off_post', ''),
            'off_tel'        => $request->input('off_tel', ''),
            'sport'          => $request->input('sport', ''),
            'size'           => $request->input('size', ''),
            'hd'             => $request->input('hd', ''),
            'act_65'         => $request->input('act_65', ''),
            'act_66'         => $request->input('act_66', ''),
            'act_67'         => $request->input('act_67', ''),
            'act_68'         => $request->input('act_68', ''),
            'act_69'         => $request->input('act_69', ''),
            'act_70'         => $request->input('act_70', ''),
            'act_71'         => $request->input('act_71', ''),
            'facebook'       => $request->input('facebook', ''),
            'line_id'        => $request->input('line_id', ''),
            'last_donate'    => $request->input('last_donate', ''),
            'last_Edit'      => now()->format('d/m/Y H:i:s'),
            'ip'             => $request->ip(),
        ];

        if ($request->filled('password')) {
            $data['password'] = $request->input('password');
        }

        if ($request->hasFile('fname')) {
            $file = $request->file('fname');
            $ext  = strtolower($file->getClientOriginalExtension());
            $filename = now()->format('YmdHis') . '.' . $ext;
            $file->move(public_path('uploads/member'), $filename);
            $data['fname'] = $filename;
        }

        DB::table('data')
            ->where('autono', $member->autono)
            ->update($data);

        return redirect()->route('profile')->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }
}
