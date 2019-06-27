<?php

namespace App\Http\Controllers\User;

use App\Model\user\post;
use App\Model\user\category;
use App\Model\user\tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $posts = post::where('status',1)->orderBy('created_at','DESC')->paginate(2);
    	return view('user.blog',compact('posts'));
    }

    public function tag(tag $tag)
    {
        $posts = $tag->posts();
        return view('user.blog',compact('posts'));
    }

    public function category(category $category)
    {
        $posts = $category->posts();
        return view('user.blog',compact('posts'));
    }
}
