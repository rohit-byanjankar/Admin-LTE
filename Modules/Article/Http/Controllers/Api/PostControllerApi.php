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
use App\Http\Resources\Post as PostResource;

class PostControllerApi extends Controller
{
   public function index()
   {
    //    $post = Post::paginate(15);
    //    return PostResource::collection($post);

       $category = Category::all();
       return PostResource::collection($category);

   }

    
}

