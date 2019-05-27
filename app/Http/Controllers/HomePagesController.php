<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePagesController extends Controller
{
    public function index(){

        $posts = Post::orderBy('created_at','desc')->paginate(7);
        $categories = Category::all();
        $tags = Tag::all();

        return view('homePages.index')
            ->with('posts', $posts)
            ->with('categories', $categories)
            ->with('tags',$tags);
    }

    public function admin(){
        return view('homePages.admin');
    }

    public function show($time, $title){

        $title = preg_replace('/[\s_-]/',' ',$title);

        $post = DB::table('posts')
            ->where(['date' => $time, 'title' => $title])
            ->get();

        $categories = Category::all();
        $tags = Tag::all();

        return view('homePages.show')
            ->with('post', $post)
            ->with('categories', $categories)
            ->with('tags',$tags);
    }

}
