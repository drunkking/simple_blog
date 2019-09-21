<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostsRequest;

use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Http\Requests\PostStoreRequest;

use App\Post;
use App\Category;





class PostsController extends Controller
{

    private $postRepository;


    public function __construct(PostRepositoryInterface $postRepository){
        $this->postRepository = $postRepository;
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postRepository->all();

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
        $fileNameToStore = $this->postRepository->imageCreateSetup($request);

        Post::create([
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'image' => $fileNameToStore,
            'category_id' => $request->input('category_id'),
            'content' => $request->input('content')
        ]);

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
        $data = $this->postRepository->edit($id);

        return view('posts.edit',$data);
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
        $this->postRepository->update($request,$id);

        return redirect('/home/posts')
            ->with('success','Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->postRepository->delete($id);

        return redirect('/home/posts')
            ->with('success','Post deleted');
    }
}
