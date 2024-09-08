<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repository\Admin\CategoryRepository;
use App\Repository\Admin\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Throwable;

class ProductController extends Controller
{
    protected $product_repo;
    protected $category_repo;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->product_repo = $productRepository;
        $this->category_repo = $categoryRepository;
    }

    public function index()
    {
        return Inertia::render('Admin/Product/Index', [
            'products' => $this->product_repo->getAllProducts()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Product/Form', [
            'categories' => $this->category_repo->getAllCategories()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $this->product_repo->store($request->all());
        } catch (Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        return redirect(route('admin:products.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return Inertia::render('Admin/Product/Form', [
            'for_edit' => true,
            'product' => $product->load('category'),
            'categories' => $this->category_repo->getAllCategories()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        DB::beginTransaction();
        try {
            $this->product_repo->update($request->all(), $product);
        } catch (Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        return redirect(route('admin:products.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        Storage::disk('public')->delete('ProductsImage/'.$product->image_path);
        return redirect(route('admin:products.index'));
    }
}
