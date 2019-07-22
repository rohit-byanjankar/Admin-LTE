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
use Spatie\Searchable\Search;
use Modules\Classified\Entities\Classified;
use Modules\Classified\Entities\ClassifiedCategory;
use Modules\TelephoneDirectory\Entities\PhoneCategory;
use Modules\TelephoneDirectory\Entities\PhoneDirectory;
use App\User;

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
            ->registerModel(Category::class, 'name')
            ->registerModel(Announcement::class, 'title')
            ->registerModel(Classified::class, 'title')
            ->registerModel(ClassifiedCategory::class, 'name')
            ->registerModel(Event::class, 'title','venue')
            ->registerModel(PhoneDirectory::class, 'first_name','middle_name','surname','home_number','office_number','mobile_number','profession','city','street')
            ->registerModel(PhoneCategory::class, 'name')

            
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
