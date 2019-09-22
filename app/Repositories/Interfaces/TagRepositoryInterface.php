<?php

namespace App\Repositories\Interfaces;
use App\Tag;

interface TagRepositoryInterface {

    public function all();

    public function get($tag_id);

    public function update($request, $tag_id);

    public function delete($tag_id);
}