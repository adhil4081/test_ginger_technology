<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repository\Admin\ProductRepository;
use Exception;
use Illuminate\Http\Request;
use Inertia\Inertia;
use PhpParser\Node\Stmt\TryCatch;
use Throwable;

use function PHPUnit\Framework\throwException;

class ListingController extends Controller
{
    protected $product_repo;
    public function __construct(ProductRepository $productRepository)
    {
        $this->product_repo = $productRepository;
    }
    public function index()
    {
        return Inertia::render('User/Listings/Index', [
            'products' => $this->product_repo->getAllProducts()
        ]);
    }

    public function addToCart(Request $request)
    {
        try {
            $cart = session()->get('cart', []);
            $cart[] = $request['id'];
            session()->put('cart', $cart);
            return response()->json('Added to cart succesfully');
        } catch (Throwable $th) {
            throw $th;
        }
    }

    public function sendCartDetails()
    {
        $carts = session()->get('cart');
        $products = Product::whereIn('id', $carts)->get();
        session()->forget('carts');

        return $products;
    }
}
