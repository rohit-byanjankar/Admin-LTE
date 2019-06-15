<?php

namespace Modules\Article\Http\Controllers\Api;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use Modules\Article\Entities\Post;
use Illuminate\Support\Facades\Storage;
use Modules\Article\Entities\Category;
use Modules\Article\Entities\Tag;
use Auth;

class PostControllerApi extends Controller
{
    public function __construct()
    {   
        $this->middleware('verifyCategoryCount')->only(['create','store']);
    }

    public function index()
    {
        $posts=Post::all();
        return response($posts, 200)
                  ->header('Content-Type', 'text/plain');

        
    }

    
}

