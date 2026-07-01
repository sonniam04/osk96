<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebboardController extends Controller
{
    // group label map เหมือน original
    private const GROUPS = [
        '1_0'   => 'ได้ข่าวว่า...',
        '2_22'  => 'จดหมายเวียน',
        '5_24'  => 'เพื่อน ช่วย เพื่อน',
        '6_0'   => 'ภาพเด็ดคลิปโดน',
        '7_16'  => 'คำคม/ปรัชญาชีวิต',
        '7_17'  => 'ข่าวสารวิชาการ',
        '7_18'  => 'สันทนาการ/บันเทิง',
        '7_20'  => 'ลูกสวน 92',
        '7_26'  => 'ซุปซิป นานาสาระ',
        '11_0'  => 'ฝากส่งเมล์ถึงเพื่อนทุกคน',
        '12_0'  => 'รักรุ่นจริงไม่ทิ้งกัน',
        '13_0'  => 'คุยกับท่านประธาน',
        '14_0'  => 'ติดต่อเว็บมาสเตอร์',
        '29_29' => 'เพื่อนประกอบธุรกิจ',
        '30_30' => 'การทำบุญและบริจาคโลหิต',
        '31_31' => 'เนื้อคำร้องเพลงสวนฯ',
    ];

    public function index(Request $request)
    {
        $groupId    = (int) $request->get('group_id', 1);
        $oldGroupId = (int) $request->get('old_group_id', 0);
        $search     = trim($request->get('search', ''));
        $perPage    = 30;

        $key        = "{$groupId}_{$oldGroupId}";
        $groupName  = self::GROUPS[$key] ?? 'กระดาน';

        $query = DB::table('webboard_question')
            ->join('webboard_group', function ($join) {
                $join->on('webboard_question.group_id', '=', 'webboard_group.group_id')
                     ->on('webboard_question.old_group_id', '=', 'webboard_group.old_group_id');
            })
            ->where('webboard_group.isShow', 1)
            ->where('webboard_question.question_status', 1)
            ->where('webboard_group.group_id', $groupId)
            ->where('webboard_group.old_group_id', $oldGroupId)
            ->select(
                'webboard_question.*',
                'webboard_group.group_name',
                DB::raw('DATEDIFF(NOW(), webboard_question.question_date) AS _new'),
                DB::raw('DATEDIFF(NOW(), webboard_question.question_date_update) AS _update')
            )
            ->orderByDesc('webboard_question.question_id');

        if ($search !== '') {
            $query->where('webboard_question.question_title', 'like', "%{$search}%");
        }

        $posts = $query->paginate($perPage)->withQueryString();

        return view('webboard.index', compact('posts', 'groupId', 'oldGroupId', 'groupName', 'search'));
    }
}
