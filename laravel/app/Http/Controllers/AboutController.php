<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function committee()  { return view('about.committee'); }
    public function rooms()      { return view('about.rooms'); }
    public function vision()     { return view('about.vision'); }
    public function manage()     { return view('about.manage'); }
    public function money()      { return view('about.money'); }
    public function donate()     { return view('about.donate'); }

    public function bill()
    {
        $accounts = DB::table('bill')
            ->orderBy('B_ID')
            ->get();

        $summaries = DB::table('bill_detail')
            ->select('Numbill',
                DB::raw('SUM(get_bill) as yodma'),
                DB::raw('SUM(recivese_bill) as total_in'),
                DB::raw('SUM(paid_bill) as total_out'),
                DB::raw('SUM(get_bill) + SUM(recivese_bill) - SUM(paid_bill) as balance')
            )
            ->groupBy('Numbill')
            ->get()
            ->keyBy('Numbill');

        return view('about.bill', compact('accounts', 'summaries'));
    }
}
