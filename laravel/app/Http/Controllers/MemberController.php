<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    private array $groupLabels = [
        16 => 'มาจากทุกที่',
        1  => 'ห้องเรียน ม.ต.1',
        2  => 'ห้องเรียน ม.ต.2',
        3  => 'ห้องเรียน ม.ต.3',
        4  => 'ห้องเรียน ม.ต.4',
        5  => 'ห้องเรียน ม.ต.5',
        6  => 'ยกเลิกเรียน',
        7  => 'เสียชีวิต',
        8  => 'ไม่ทราบสถานที่',
        9  => 'ยังอยู่ต่างประเทศ',
        10 => 'มาจากอาชีพ',
        11 => 'เพื่อน/ญาติสนับสนุน',
        13 => 'เพื่อนที่ยังหาไม่เจอ',
        14 => 'เพื่อนที่อยู่ในแพทย์',
        15 => 'เพื่อนที่รับราชการตำรวจ',
    ];

    public function search(Request $request)
    {
        $type  = (int) $request->get('type', 16);
        $room  = $request->get('room', '');
        $label = $this->groupLabels[$type] ?? 'ทั้งหมด';

        $query = DB::table('data')->where('st', 1);

        match ($type) {
            1, 2, 3, 4, 5 => $query->where("class{$type}", 'LIKE', "%{$room}%"),
            6  => $query->where('class5', 'LIKE', '%-%'),
            7  => $query->where(function($q) {
                $q->where('status', 'LIKE', '%เสียชีวิต%')
                  ->orWhere('work', 'LIKE', '%ตาย%');
            }),
            8  => $query->whereRaw("(addr3_province = '' OR addr3_province IS NULL)"),
            9  => $query->where('status', 'LIKE', '%-ต่าง%'),
            10 => $query->where('status', 'NOT LIKE', '%เสียชีวิต%')
                        ->where('status', 'NOT LIKE', '-%'),
            11 => $query->where('sport', '!=', ''),
            13 => $query->where('fname', ''),
            14 => $query->where('status', 'LIKE', '%แพทย์%'),
            15 => $query->where('status', 'LIKE', '%ตำรวจ%'),
            default => null, // 16 = all
        };

        $members = $query
            ->select('name', 'surname', 'fname', 'status', 'work', 'addr3_province')
            ->orderBy('name')
            ->paginate(30);

        return view('members.search', compact('members', 'type', 'label', 'room'));
    }
}
