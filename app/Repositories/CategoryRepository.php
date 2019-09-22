<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Category;


class CategoryRepository implements CategoryRepositoryInterface {

    public function all(){
        return Category::orderBy('name','desc')->get();
    }

    public function get($category_id){
        return Category::findOrFail($category_id);
    }

    public function update($request, $category_id){

        $category = $this->get($category_id);

        $category->update([
            'name' => $request->input('name')
        ]);

    }

    public function delete($category_id){

        $category = $this->get($category_id);
        $category->delete();
    }


}