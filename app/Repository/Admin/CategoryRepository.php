<?php

namespace App\Repository\Admin;

use App\Models\Category;

class CategoryRepository
{
    public function store($data)
    {
        $this->validate($data);
        Category::create([
            'name' => $data['name']
        ]);
    }

    public function update($data, $category)
    {
        $this->validate($data);
        $category->name = $data['name'];
        $category->save();
    }

    public function getAllCategories()
    {
        return Category::get();
    }

    public function validate($data)
    {
        validator($data, [
            'name' => 'bail|required',
        ],)->validated();
    }
}
