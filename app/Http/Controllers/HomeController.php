<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Modules\Article\Entities\Post;
use Modules\Events\Entities\Event;
use Modules\Announcement\Entities\Announcement;
use Spatie\Searchable\Search;
use Modules\Classified\Entities\Classified;
use Modules\Classified\Entities\ClassifiedCategory;

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

    public function search(Request $request)
    {
        $searchterm = $request->input('query');
        $searchResults = (new Search())
            ->registerModel(Post::class, 'title')
            ->registerModel(Announcement::class, 'title')
            ->registerModel(Classified::class, 'title')
            ->registerModel(ClassifiedCategory::class, 'name')
            ->registerModel(Event::class, 'title','venue')
            ->registerModel(User::class, 'name','profession','address')
            ->perform($searchterm);
        return view('home::search.index', compact('searchResults','searchterm'));
    }


    public function index()
    {
        return view('home');
    }

    public function aboutUs()
    {
        return view('aboutUs');
    }
}
