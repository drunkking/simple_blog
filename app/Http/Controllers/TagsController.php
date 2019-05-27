<?php

namespace App\Http\Controllers;


use App\Tag;
use App\Http\Requests\TagsRequest;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('name','desc')->get();
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
        $tag = new Tag();
        $tag->name = $request->input('name');
        $tag->save();

        return redirect('/home/tags')->with('success','Tag created');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);

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
        $tag = Tag::findOrFail($id);
        $tag->name = $request->input('name');
        $tag->save();

        return redirect('/home/tags')->with('success','Tag updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect('/home/tags')->with('success','Tag deleted');
    }
}
