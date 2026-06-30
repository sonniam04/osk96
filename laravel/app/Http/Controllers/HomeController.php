<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Latest webboard posts (group 1 = กระดานข่าวทั่วไป)
        $latestPosts = DB::table('webboard_question')
            ->where('group_id', 1)
            ->where('question_status', 1)
            ->orderByDesc('question_id')
            ->limit(3)
            ->get();

        // Recent topics (all groups, for subject list) — sort by question_date เหมือน original
        $recentTopics = DB::table('webboard_question')
            ->join('webboard_group', function($join) {
                $join->on('webboard_question.group_id', '=', 'webboard_group.group_id')
                     ->on('webboard_question.old_group_id', '=', 'webboard_group.old_group_id');
            })
            ->where('webboard_question.question_status', 1)
            ->where('webboard_group.isShow', 1)
            ->orderByDesc('webboard_question.question_date')
            ->limit(20)
            ->select('webboard_question.*', 'webboard_group.group_name')
            ->get();

        // Recent activities
        $activities = DB::table('activity')
            ->orderByDesc('a_id')
            ->limit(4)
            ->get();

        // Visitor count
        $visitorCount = DB::table('counter')->where('countID', 1)->value('cont_num') ?? 0;

        return view('home.index', compact(
            'latestPosts',
            'recentTopics',
            'activities',
            'visitorCount'
        ));
    }
}
