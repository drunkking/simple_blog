<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\TagRepositoryInterface;

use App\Tag;
use App\Http\Requests\TagsRequest;

class TagsController extends Controller
{

    private $tagRepository;


    public function __construct(TagRepositoryInterface $tagRepository){
        $this->tagRepository = $tagRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = $this->tagRepository->all();
        return view('tags.index')
            ->with('tags', $tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\TagsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagsRequest $request)
    {
        Tag::create([
            'name' => $request->input('name')
        ]);

        return redirect('/home/tags')
            ->with('success','Tag created');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = $this->tagRepository->get($id);

        return view('tags.edit')
            ->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\TagsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagsRequest $request, $id)
    {
        $this->tagRepository->update($request, $id);

        return redirect('/home/tags')
            ->with('success','Tag updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->tagRepository->delete($id);

        return redirect('/home/tags')
            ->with('success','Tag deleted');
    }
}
