<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getCategories()
    {
        $categories = Category::get();
        return response()->json($categories);
    }

    public function getProductByCategory(String $id)
    {
        $products = Product::where('category_id', $id)->get();

        return response()->json($products);
    }
}
