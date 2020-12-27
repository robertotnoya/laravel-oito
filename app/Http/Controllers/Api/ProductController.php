<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {   
        $this->product = $product;
    }

    public function index(Request $request)
    {
        $products = $this->product->getResults($request);
        return response()->json($products, 200);
    }

    public function store(Request $request)
    {
           
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
