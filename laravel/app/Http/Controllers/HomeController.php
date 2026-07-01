<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Latest webboard posts — cache 5 min (เปลี่ยนบ่อย)
        $latestPosts = Cache::remember('home.latest_posts', 300, fn() =>
            DB::table('webboard_question')
                ->where('group_id', 1)
                ->where('question_status', 1)
                ->orderByDesc('question_id')
                ->limit(3)
                ->get()
        );

        // Recent topics — cache 5 min
        $recentTopics = Cache::remember('home.recent_topics', 300, fn() =>
            DB::table('webboard_question')
                ->join('webboard_group', function($join) {
                    $join->on('webboard_question.group_id', '=', 'webboard_group.group_id')
                         ->on('webboard_question.old_group_id', '=', 'webboard_group.old_group_id');
                })
                ->where('webboard_question.question_status', 1)
                ->where('webboard_group.isShow', 1)
                ->orderByDesc('webboard_question.question_date')
                ->limit(20)
                ->select('webboard_question.*', 'webboard_group.group_name')
                ->get()
        );

        // Random activity photos — cache 10 min (เปลี่ยนช้า)
        $activityPhotos = Cache::remember('home.activity_photos', 600, fn() =>
            DB::table('photo')->inRandomOrder()->limit(10)->pluck('pic_name')
        );

        // Photo/clip posts — cache 5 min
        $photoClips = Cache::remember('home.photo_clips', 300, fn() =>
            DB::table('webboard_question')
                ->where('group_id', 6)
                ->where('question_status', 1)
                ->orderByDesc('question_date')
                ->limit(16)
                ->get()
        );

        // Activities — cache 10 min
        $activities = Cache::remember('home.activities', 600, fn() =>
            DB::table('activity')->orderByDesc('a_id')->limit(4)->get()
        );

        // Visitor count — cache 1 min
        $visitorCount = Cache::remember('home.visitor_count', 60, fn() =>
            DB::table('counter')->where('countID', 1)->value('cont_num') ?? 0
        );

        return view('home.index', compact(
            'latestPosts',
            'recentTopics',
            'activityPhotos',
            'photoClips',
            'activities',
            'visitorCount'
        ));
    }
}
