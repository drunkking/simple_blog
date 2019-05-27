<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;

use App\Http\Requests\PostsRequest;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        return view('posts.index')
            ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id')->toArray();

        return view('posts.create')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PostsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('image')->storeAs('public/post_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'empty.jpg';
        }

        $post = new Post;
        $post->title = $request->input('title');
        $post->subtitle = $request->input('subtitle');
        $post->image = $fileNameToStore;
        $post->category_id = $request->input('category_id');
        $post->content = $request->input('content');
        $post->save();

        return redirect('/home/posts')->with('success','Post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::pluck('name','id')->toArray();
        $tags = Tag::pluck('name','id')->toArray();
        $post = Post::findOrFail($id);


        $my_tags = array();

        foreach ($post->tags as $tag) {
            $my_tags= $tag->name;
        }


        return view('posts.edit')
            ->with('post', $post)
            ->with('categories', $categories)
            ->with('tags', $tags)
            ->with('mytags', $my_tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PostsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsRequest $request, $id)
    {
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('image')->storeAs('public/post_images', $fileNameToStore);
        }

        $post =  Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->subtitle = $request->input('subtitle');
        if($request->hasFile('image')){
            $post->image = $fileNameToStore;
        }
        $post->category_id = $request->input('category_id');
        $post->tags()->attach($request->input('tags'));
        $post->content = $request->input('content');
        $post->save();

        return redirect('/home/posts')->with('success','Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->tags()->detach();

        if($post->image != 'empty.jpg'){
            Storage::delete('public/storage/post_images'. $post->image);
        }

        $post->delete();

        return redirect('/home/posts')->with('success','Post deleted');
    }
}
