<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;
use Modules\Article\Entities\Post;
use Modules\Article\Entities\Category;
use Modules\Article\Entities\Tag;
use Modules\Events\Entities\Event;
use Illuminate\Support\Facades\Auth;
use Modules\Announcement\Entities\Announcement;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

// use Illuminate\Console\Scheduling\Event;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function aboutUs()
    {
        return view('aboutUs');
    }
}
