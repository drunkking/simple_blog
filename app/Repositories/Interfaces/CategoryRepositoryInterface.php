<?php

namespace App\Repositories\Interfaces;
use App\Category;

interface CategoryRepositoryInterface {


    public function all();

    public function get($category_id);

    public function update($request, $category_id);

    public function delete($category_id);

}