<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repository\Admin\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Throwable;

class CategoryController extends Controller
{
    protected $category_repo;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->category_repo = $categoryRepository;
    }

    public function index()
    {
        return Inertia::render('Admin/Category/Index', [
            'categories' => $this->category_repo->getAllCategories()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Category/Form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $this->category_repo->store($request->all());
        } catch (Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        return redirect(route('admin:categories.index'));
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
    public function edit(Category $category)
    {
        return Inertia::render('Admin/Category/Form', [
            'for_edit' => true,
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        DB::beginTransaction();
        try {
            $this->category_repo->update($request->all(),$category);
        } catch (Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        return redirect(route('admin:categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('admin:categories.index'));
    }
}
