<?php

namespace App\Repositories\Interfaces;
use App\Post;


interface PostRepositoryInterface {
    
    public function all();

    public function get($post_id);

    public function getTimeTitle($time, $title);

    public function postsWithCategory($category_name);

    public function postsWithTag($tag_name);
    
    public function imageCreateSetup($request);

    public function imageUpdateSetup($request);

    public function usedTagsUpdateCheck($request, $post);

    public function remainingTagsUpdateCheck($request, $post);

    public function remainingTags($post_id);

    public function edit($post_id);

    public function update($request, $post_id);

    public function delete($post_id);

}