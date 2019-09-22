<?php

namespace App\Repositories;

use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Tag;

class TagRepository implements TagRepositoryInterface {

    public function all(){
        return Tag::orderBy('name','desc')->get();
    }

    public function get($tag_id){
        return Tag::findOrFail($tag_id);
    }

    public function update($request, $tag_id){

        $tag = $this->get($tag_id);

        $tag->update([
            'name' => $request->input('name')
        ]);
    }

    public function delete($tag_id){

        $tag = $this->get($tag_id);
        $tag->delete();
    }
}