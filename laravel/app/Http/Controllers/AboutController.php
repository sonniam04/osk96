<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function committee()  { return view('about.committee'); }
    public function rooms()      { return view('about.rooms'); }
    public function vision()     { return view('about.vision'); }
    public function manage()     { return view('about.manage'); }
    public function money()      { return view('about.money'); }
    public function donate()     { return view('about.donate'); }
}
