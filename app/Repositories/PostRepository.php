<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Storage;

use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Post;
use App\Tag;
use App\Category;


class PostRepository implements PostRepositoryInterface {

    public function all(){
        return Post::orderBy('created_at', 'desc')->paginate(10);
    }

    public function get($post_id){
        return Post::findOrFail($post_id);
    }

    
    public function imageCreateSetup($request){

        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('image')->storeAs('public/post_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'empty.jpg';
        }

        return $fileNameToStore;
    }

    public function imageUpdateSetup($request) {

        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('image')->storeAs('public/post_images', $fileNameToStore);

            return $fileNameToStore;
        } 
    }

    public function usedTagsUpdateCheck($request, $post){

        if($request->input('used_tags')) {
            $post->tags()->detach($request->input('used_tags'));
        }
    }

    public function remainingTagsUpdateCheck($request, $post){

        if($request->input('remaining_tags')){
            $post->tags()->attach($request->input('remaining_tags'));
        }
    }

    public function remainingTags($post_id){

        $tags = Tag::all();
        $post = Post::findOrFail($post_id);
        $diff = $tags->diff($post->tags);

        return  $diff;
    }


    public function edit($post_id){

        $categories = Category::pluck('name','id')->toArray();
        $post = $this->get($post_id);
        $remainingTags = $this->remainingTags($post_id);

        $currentTags = [];

        foreach ($post->tags as $tag) {
            $currentTags[] = $tag;
        }

        $data = [
            'post' => $post,
            'categories' => $categories,
            'tags' => $remainingTags,
            'postTags' => $currentTags
        ];

        return $data;

    }

    public function update($request, $post_id){

        $post = $this->get($post_id);
        $fileNameToStore = $this->imageUpdateSetup($request);

        $this->usedTagsUpdateCheck($request, $post);
        $this->remainingTagsUpdateCheck($request, $post);


        $post->update([
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'image' => $request->hasFile('image') ? $fileNameToStore : $post->image,
            'category_id' => $request->input('category_id'),
            'content' => $request->input('content')
        ]);

    }

    public function delete($post_id){

        $post = $this->get($post_id);
        $post->tags()->detach();

        if($post->image != 'empty.jpg'){
            Storage::delete('public/storage/post_images'. $post->image);
        }

        $post->delete();
    }



}