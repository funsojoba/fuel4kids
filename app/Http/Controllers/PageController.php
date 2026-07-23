<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function ourWork()
    {
        return view('pages.our-work');
    }

    public function leadership()
    {
        return view('pages.leadership', [
            'team' => config('fuel4kids.team'),
            'ambassadors' => config('fuel4kids.ambassadors'),
        ]);
    }

    public function partnership()
    {
        return view('pages.partnership');
    }

    public function volunteer()
    {
        return view('pages.volunteer');
    }
}
