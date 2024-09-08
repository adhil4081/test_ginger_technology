<?php

namespace App\Repository\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductRepository
{
    public function store($data)
    {
        $this->validate($data);

        $image_path = Storage::disk('public')->put('ProductsImage', $data['image']);
        Product::create([
            'category_id' => $data['category'],
            'name' => $data['name'],
            'description' => $data['description'],
            'image_path' => $image_path,
        ]);
    }

    public function update($data, $product)
    {
        $this->validate($data);
        if($product->image_path){
            Storage::delete(public_path('ProductsImage/'.$product->image_path));
        }
        $image_path = Storage::disk('public')->put('ProductsImage', $data['image']);

        $product->category_id = $data['category'];
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->image_path = $image_path;
        $product->save();
    }

    public function getAllProducts()
    {
        return Product::with('category')->get();
    }

    public function validate($data)
    {
        validator($data, [
            'category' => 'bail|required',
            'name' => 'bail|required',
            'description' => 'bail|required',
            'image' => 'bail|required',
        ],)->validated();
    }
}
